		<?php
			$video_url = get_post_meta($post->ID, 'ci_cpt_video_url', true);
			$show_gallery = get_post_meta($post->ID, 'ci_cpt_show_gallery', true);

			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID',  
				'post_type'      => 'attachment',
				'post_parent'    => $post->ID,
				'post_mime_type' => 'image',
				'post_status'    => null,
				'posts_per_page' => -1
			);
			$attachments = get_posts($args);
		?>

		<?php if($show_gallery == 'enabled' and count($attachments) > 0): ?>
			<div class="row">
				<div class="ten columns offset-by-one entry-featured">				
					<div class="flexslider">
						<ul class="slides">
							<?php
								foreach( $attachments as $attachment )
								{
									$alt_text = trim(strip_tags( get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) ));
									$attr = array(
										'alt'   => $alt_text,
										'title' => trim(strip_tags( $attachment->post_title ))
									);
									$img_attrs = wp_get_attachment_image_src( $attachment->ID, 'large' );
									echo '<li><a href="'.$img_attrs[0].'" rel="fancybox['.get_the_ID().']" title="'.esc_attr($alt_text).'">'.wp_get_attachment_image( $attachment->ID, 'ci_featured', false, $attr ).'</a></li>';
								}
							?>
						</ul>
					</div>
				</div>	
			</div>
		<?php elseif($video_url != ''): ?>
			<div class="row">
				<?php ci_embed_video(920, 520, '', 'ten columns offset-by-one entry-featured'); ?>
			</div>		
		<?php elseif( has_post_thumbnail() ): ?>
			<div class="row">
				<div class="ten columns offset-by-one entry-featured">				
					<?php the_post_thumbnail('ci_featured'); ?>				
				</div>	
			</div>
		<?php endif; ?>
