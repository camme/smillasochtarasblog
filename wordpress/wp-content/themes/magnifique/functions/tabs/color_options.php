<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_color_options', 30);
	if( !function_exists('ci_add_tab_color_options') ):
		function ci_add_tab_color_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Color Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;
	
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	load_panel_snippet('color_scheme');
	load_panel_snippet('custom_background');

	$ci_defaults['text_color']				= '';
	$ci_defaults['headers_color']			= '';
	$ci_defaults['a_color']					= '';
	$ci_defaults['ah_color']				= '';
	$ci_defaults['bg_line_color']			= '';
	$ci_defaults['bg_nav_bg_color']			= '';
	$ci_defaults['bg_nav_color']			= '';
	$ci_defaults['bg_nav_bg_hover_color']	= '';
	$ci_defaults['bg_nav_hover_color']		= '';
	$ci_defaults['bg_nav_bg_active_color']	= '';
	$ci_defaults['bg_nav_active_color']		= '';

	add_action('wp_head', 'ci_custom_theme_colors', 110);
	// We want these settings to be able to work without being dependent on whether a custom background is set
	// so we need to hook on 'wp_head' instead of 'ci_custom_background'
	if( !function_exists('ci_custom_theme_colors')):
	function ci_custom_theme_colors()
	{
		echo '<style type="text/css">';

		if(ci_setting('text_color'))
			echo 'body { color: #'.ci_setting('text_color').'; }';

		if(ci_setting('headers_color'))
			echo 'h1,h2,h3,h4,h5,h6 { color: #'.ci_setting('headers_color').' !important; }';

		if(ci_setting('a_color'))
			echo 'a { color: #'.ci_setting('a_color').'; }';

		if(ci_setting('ah_color'))
			echo 'a:hover { color: #'.ci_setting('ah_color').'; }';

		if(ci_setting('bg_line_color'))
			echo '* { border-color: #'.ci_setting('bg_line_color').' !important; }';

		if(ci_setting('bg_nav_bg_color') or ci_setting('bg_nav_color'))
		{
			echo '.sf-menu a { ';
			if(ci_setting('bg_nav_bg_color'))
				echo 'background: #'.ci_setting('bg_nav_bg_color').'; ';
			if(ci_setting('bg_nav_color'))
				echo 'color: #'.ci_setting('bg_nav_color').'; ';
			echo ' }';
		}

		if(ci_setting('bg_nav_bg_hover_color') or ci_setting('bg_nav_hover_color'))
		{
			echo '.sf-menu a:hover { ';
			if(ci_setting('bg_nav_bg_hover_color'))
				echo 'background: #'.ci_setting('bg_nav_bg_hover_color').'; ';
			if(ci_setting('bg_nav_hover_color'))
				echo 'color: #'.ci_setting('bg_nav_hover_color').'; ';
			echo ' }';
		}

		if(ci_setting('bg_nav_bg_active_color') or ci_setting('bg_nav_active_color'))
		{
			echo '.sf-menu .active a, .current-menu-item a, .current_page_item a { ';
			if(ci_setting('bg_nav_bg_active_color'))
				echo 'background: #'.ci_setting('bg_nav_bg_active_color').'; ';
			if(ci_setting('bg_nav_active_color'))
				echo 'color: #'.ci_setting('bg_nav_active_color').'; ';
			echo ' }';
		}

		echo '</style>';
	}
	endif;

?>
<?php else: ?>

	<?php load_panel_snippet('color_scheme'); ?>

	<?php load_panel_snippet('custom_background'); ?>

	<fieldset class="set">
		<p class="guide"><?php _e('You can set the headers (h1 to h6) color here. You may select a color using the color picker (pops up when you click on the input box), or enter its hex number in the input box (without a #).', 'ci_theme'); ?></p>
		<?php ci_panel_input('headers_color', __('Headers Color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('You can set the color of text, links and lines (borders) of the page here. You may select a color using the color picker (pops up when you click on the input box), or enter its hex number in the input box (without a #).', 'ci_theme'); ?></p>
		<?php ci_panel_input('text_color', __('Text Color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('a_color', __('Links Color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('ah_color', __('Links Hover Color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_line_color', __('Lines Color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Here, you can set the colors of the main menu items. You may select a color using the color picker (pops up when you click on the input box), or enter its hex number in the input box (without a #).', 'ci_theme'); ?></p>
		<?php ci_panel_input('bg_nav_color', __('Menu text color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_nav_bg_color', __('Menu background color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_nav_hover_color', __('Menu hover text color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_nav_bg_hover_color', __('Menu hover background color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_nav_active_color', __('Menu active item text color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
		<?php ci_panel_input('bg_nav_bg_active_color', __('Menu active item background color', 'ci_theme'), array('input_class'=>'colorpckr'));  ?>
	</fieldset>		
	
<?php endif; ?>