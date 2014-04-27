<?php get_header(); ?>

<?php while (have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID();?>" class="twelve columns entry">

		<div class="row">
			<div class="eight columns centered entry-head">
				<time pubdate="<?php get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
				<p class="entry-cats"><?php the_category(', '); ?></p>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>

		<?php get_template_part('inc_featured'); ?>

		<div class="row">
			<div class="eight columns centered entry-main">
				<?php ci_e_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
		
		<?php comments_template(); ?>
		
	</article><!-- /entry -->
<?php endwhile; ?>

<?php get_footer(); ?>