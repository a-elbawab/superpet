(function($){
    "use strict";
    jQuery('.tab-content .tab-pane:first-child').addClass('show active');
	jQuery('.customtabs li:first-child a').addClass('active');
    jQuery('#accordion .card:first-child a').removeClass('collapsed');
    jQuery('#accordion .card:first-child .collapse').addClass('show');
    jQuery(window).scroll(function() { if (jQuery(this).scrollTop() > 400) { jQuery('.scroll-to-top').fadeIn(); } else { jQuery('.scroll-to-top').fadeOut(); } });
    jQuery('body').append('<a href="#" class="scroll-to-top"><i class="fa fa-arrow-up"></i></a>');
    jQuery('.scroll-to-top').on('click', function(e) { e.preventDefault(); jQuery('html, body').animate({scrollTop : 0}, 1000); });
})(jQuery);