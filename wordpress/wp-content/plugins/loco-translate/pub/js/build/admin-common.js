!function(k,l,a){function f(c,g){function e(){d();b=setTimeout(function(){a(c).fadeOut(1E3,g)},f)}function d(){b&&clearTimeout(b);b=null}var b,f=5E3;e();a(c).mouseenter(d).mouseleave(e)}function h(c,g){function e(d){a(c).remove();a(window).triggerHandler("resize");var b;if(b=d)d.stopPropagation(),d.preventDefault(),b=!1;return b}a('<a class="dismiss" href="#">&times;</a>').appendTo(c).click(e);g||f(c,e)}a("#wpbody-content").find("div.loco-message").each(function(c,a){h(a,!0)})}(window,document,window.jQuery);