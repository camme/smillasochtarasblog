<?php get_header(); ?>

<article class="twelve columns entry error404 not-found">

	<div class="row">
		<div class="eight columns centered entry-head">
			<p class="entry-cats"><?php _e( 'Uh oh', 'ci_theme' ); ?></p>
			<h2><?php _e( 'Not Found', 'ci_theme' ); ?></h2>
		</div>
	</div>
	
	<div class="row">
		<div class="eight columns centered entry-main">
			<p><?php _e( 'Oh, no! The page you requested could not be found. Perhaps searching will help...', 'ci_theme' ); ?></p>
			<?php get_search_form(); ?>
			<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>				
		</div>
	</div>
	
</article><!-- /entry -->

<?php get_footer(); ?>