<?php get_header(); ?>

<?php while (have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID();?>" class="twelve columns entry">

		<div class="row">
			<div class="eight columns centered entry-head">
				<p class="entry-cats"><?php the_category(', '); ?></p>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>

		<?php if ( has_post_thumbnail() ): ?>
			<div class="row">
				<div class="ten columns offset-by-one entry-featured">				
					<?php the_post_thumbnail('ci_featured'); ?>				
				</div>	
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="eight columns centered entry-main">
				<?php ci_e_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>

	</article><!-- /entry -->
<?php endwhile; ?>

<?php get_footer(); ?>