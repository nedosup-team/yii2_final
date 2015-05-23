#!/bin/bash

export DEBIAN_FRONTEND=noninteractive

sudo usermod -a -G www-data vagrant

sudo apt-get update

sudo apt-get -y install git

sudo apt-get -y install nginx

sudo apt-get -y install php5 php5-fpm php-apc php5-cli php5-curl php5-dev php5-gd php5-imagick php5-mcrypt php5-memcache php5-mysqlnd php5-pspell php5-sqlite php5-tidy php5-xdebug php5-xmlrpc php5-json php5-xsl

echo "mysql-server-5.6 mysql-server/root_password password root" | sudo debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password root" | sudo debconf-set-selections

apt-get -y install mysql-server-5.6

sed -i s/\;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/ /etc/php5/fpm/php.ini
sed -i s/display_errors\ =\ Off/display_errors\ =\ On/ /etc/php5/fpm/php.ini
sed -i s/max_execution_time\ =\ 30/max_execution_time\ =\ 300/ /etc/php5/fpm/php.ini
sed -i s/listen\ =\ 127.0.0.1:9000/listen\ =\ \\/var\\/run\\/php5-fpm.sock/ /etc/php5/fpm/pool.d/www.conf

sudo echo ';xdebug extension
zend_extension=xdebug.so
xdebug.default_enable=1
xdebug.idekey="ide.xdebug"
xdebug.remote_enable=1
xdebug.remote_autostart=0
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.remote_log="/var/log/xdebug/xdebug.log"
xdebug.remote_host="10.0.2.2"
' > /etc/php5/mods-available/xdebug.ini

sudo echo 'server {
   charset      utf-8;
   client_max_body_size  200M;

   listen       80; ## listen for ipv4
   #listen       [::]:80 default_server ipv6only=on; ## listen for ipv6

   server_name  advanced.loc;
   root         /var/www;

   index index.html index.htm index.php;

   location / {
       root  /var/www/frontend/web;

       try_files  $uri /frontend/web/index.php?$args;

       # avoiding processing of calls to non-existing static files by Yii
       location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
           access_log  off;
           expires  360d;

           try_files  $uri =404;
       }
   }

   location /admin {
       alias  /var/www/backend/web;

       rewrite  ^(/admin)/$ $1 permanent;
       try_files  $uri /backend/web/index.php?$args;
   }

   # avoiding processing of calls to non-existing static files by Yii
   location ~ ^/admin/(.+\.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar))$ {
       access_log  off;
       expires  360d;

       rewrite  ^/admin/(.+)$ /backend/web/$1 break;
       rewrite  ^/admin/(.+)/(.+)$ /backend/web/$1/$2 break;
       try_files  $uri =404;
   }

   location ~ \.php$ {
       include  fastcgi_params;
       # check your /etc/php5/fpm/pool.d/www.conf to see if PHP-FPM is listening on a socket or port
       fastcgi_pass  unix:/var/run/php5-fpm.sock; ## listen for socket
       #fastcgi_pass  127.0.0.1:9000; ## listen for port
       fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
       try_files  $uri =404;
   }
   #error_page  404 /404.html;

   location = /requirements.php {
       deny all;
   }

   location ~ \.(ht|svn|git) {
       deny all;
   }
}' > /etc/nginx/sites-available/default

sudo sed -i 's/127\.0\.0\.1/0\.0\.0\.0/g' /etc/mysql/my.cnf
mysql -uroot -proot -e 'USE mysql; UPDATE `user` SET `Host`="%" WHERE `User`="root" AND `Host`="localhost"; DELETE FROM `user` WHERE `Host` != "%" AND `User`="root"; FLUSH PRIVILEGES; CREATE DATABASE yii_db;'

sudo php5enmod mcrypt

sudo service nginx restart
sudo service php5-fpm restart
sudo service mysql restart

php /var/www/init --env=Production
php /var/www/yii migrate --interactive=0
echo '
----------------------------------------
DONE!
----------------------------------------
';
