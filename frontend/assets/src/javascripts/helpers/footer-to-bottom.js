jQuery(function($){
  
    var timer;

    $window.on('load resize orientationchange', function () {
        var footer_height, window_height, min_height;

        if ($body.hasClass('page-template-template-coverage-php')) return false;
    
        footer_height = $footer.outerHeight();
        window_height = $window.height();

        min_height = window_height - footer_height + 'px';

        clearTimeout(timer);

        setTimeout(function () {
          $view_container.css('min-height', min_height);
        }, 10); 

    });

});