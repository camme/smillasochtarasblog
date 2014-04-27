<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">

	<title><?php ci_e_title(); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php // JS files are loaded via /functions/scripts.php ?>
	
	<?php // CSS files are loaded via /functions/styles.php ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<div class="row header">

	<header class="twelve columns">
		
		<hgroup class="<?php logo_class(); ?>">
  			<?php ci_e_logo('<h1 class="logo">', '</h1>'); ?>
  			<?php ci_e_slogan('<h2 class="slogan">', '</h2>'); ?>
  		</hgroup>
		
		<nav id="nav">
			<?php 
				if(has_nav_menu('ci_main_menu'))
					wp_nav_menu( array(
						'theme_location' 	=> 'ci_main_menu',
						'fallback_cb' 		=> '',
						'container' 		=> '',
						'menu_id' 			=> 'navigation',
						'menu_class' 		=> ''
					));
				else
					wp_page_menu();
			?>
		</nav>
		
	</header>
	
</div><!-- /header -->

<div class="row main">