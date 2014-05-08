jQuery(document).ready(function(){
	jQuery("#scroll-up").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1000) {
				jQuery('#scroll-up').fadeIn();
			} else {
				jQuery('#scroll-up').fadeOut();
			}
		});
		jQuery('a#scroll-up').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	[].forEach.call(document.querySelectorAll(".menu-homepage-container a[href^='#']"), function (link) {
		link.onclick = function (e) {
			jQuery('body,html').animate({
				scrollTop: jQuery(this.getAttribute('href')).offset().top
			}, 800);
			return false;
		};
	});
});
