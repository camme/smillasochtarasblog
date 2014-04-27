<?php get_header(); ?>

<?php while (have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID();?>" class="twelve columns entry">

		<div class="row">
			<div class="eight columns centered entry-head">
				<time pubdate="<?php get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
				<p class="entry-cats"><?php the_category(', '); ?></p>
				<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to: %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></h2>
			</div>
		</div>

		<?php get_template_part('inc_featured'); ?>
		
		<div class="row">
			<div class="eight columns centered entry-main">
				<?php ci_e_content(); ?>
			</div>
		</div>

	</article><!-- /entry -->
<?php endwhile; ?>

<div class="twelve columns paging">
	<?php ci_pagination(array(
		'container_class' => 'row eight columns centered',
		'prev_link_class' => 'six columns prev',
		'next_link_class' => 'six columns next'
	)); ?>
</div>

<?php get_footer(); ?>