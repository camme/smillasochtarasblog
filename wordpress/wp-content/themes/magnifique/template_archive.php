<?php
/*
Template Name: Archive
*/
?>
<?php get_header(); ?>
<article class="twelve columns entry">
	<div class="row">
		<div class="eight columns centered entry-head">

			<h2><?php _e('Archive','ci_theme'); ?></h2>
			<h3><?php _e('Latest posts','ci_theme'); ?></h3>
			<ul class="archive">
				<?php 
					$arrParams = array( 'paged' => $paged, 'showposts' => ci_setting('archive_no'));
					query_posts($arrParams);
					while ( have_posts() ) : the_post();
				 ?>
					<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to: %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a> - <?php echo get_the_date(); ?></li>
				<?php endwhile; ?>
			</ul>
			
			<?php if (ci_setting('archive_week')=='enabled'): ?>
				<h3><?php _e('Weekly Archive','ci_theme'); ?></h3>
				<ul class="archive"><?php wp_get_archives('type=weekly&show_post_count=1') ?></ul>
			<?php endif; ?>
			
			<?php if (ci_setting('archive_month')=='enabled'): ?>
			    <h3><?php _e('Monthly Archive','ci_theme'); ?></h3>
				<ul class="archive"><?php wp_get_archives('type=monthly&show_post_count=1') ?></ul>
			<?php endif; ?>
			
			<?php if (ci_setting('archive_year')=='enabled'): ?>
			    <h3><?php _e('Yearly Archive','ci_theme'); ?></h3>
				<ul class="archive"><?php wp_get_archives('type=yearly&show_post_count=1') ?></ul>
			<?php endif; ?>
    
	    </div>
    </div>
</article>			
<?php get_footer(); ?>