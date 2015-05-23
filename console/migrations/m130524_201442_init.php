<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => "admin",
            'auth_key' => "iM53eQsUrioK-kGF7-kfknzYHaynrzsa",
            'password_hash' => '$2y$13$ptJMksESBfxZFz7XE4gZCey/JREZlKK0HDxrDuTOPnkkh.jjX3fNO',
            'password_reset_token' => NULL,
            'email' => "helper@yii2.local",
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);


    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
