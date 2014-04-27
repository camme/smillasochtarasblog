jQuery(window).load(function() {
	jQuery('.flexslider').flexslider({
		smoothHeight: true,
		animation: ThemeOption.slider_effect,
		slideDirection: ThemeOption.slider_direction,
		slideshow: Boolean(ThemeOption.slider_autoslide),
		slideshowSpeed: Number(ThemeOption.slider_speed),
		animationDuration: Number(ThemeOption.slider_duration)
	});
});

jQuery(document).ready(function($) {  

	// Main navigation
	$('#navigation').superfish({
		delay:       1000,
		animation:   {opacity:'show'},
		speed:       'fast',
		dropShadows: false
	});

	// Responsive Menu
	// Create the dropdown base
	$("<select class='alt-nav' />").appendTo("#nav");

	// Create default option "Go to..."
	$("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
	}).appendTo("#nav select");

	// Populate dropdown with menu items
	$("#navigation a").each(function() {
		var selected = "";
		var el = $(this);
		var cl = $(this).parents('li').hasClass('current-menu-item');
		if (cl) {
			$("<option />", { "value": el.attr("href"), "text" : el.text(), "selected": selected }).appendTo("#nav select");
		}
		else {
			$("<option />", { "value": el.attr("href"), "text" : el.text() }).appendTo("#nav select");
		}
	});

	$(".alt-nav").change(function() {
		window.location = $(this).find("option:selected").val();
	});
	
	// Responsive videos
	$(".entry").fitVids(); 

});