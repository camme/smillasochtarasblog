<?php
//
// postmeta Post Type related functions.
//

add_action('admin_init', 'ci_add_cpt_postmeta_meta');
add_action('save_post', 'ci_update_cpt_postmeta_meta');

if( !function_exists('ci_add_cpt_postmeta_meta') ):
function ci_add_cpt_postmeta_meta(){
	add_meta_box("ci_cpt_postmeta_meta", __('Featured Video', 'ci_theme'), "ci_add_cpt_postmeta_meta_box", "post", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_postmeta_meta') ):
function ci_update_cpt_postmeta_meta($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if ( !isset( $_POST['post_nonce'] ) || !wp_verify_nonce( $_POST['post_nonce'], basename( __FILE__ ) ) ) return $post_id;

	update_post_meta($post_id, "ci_cpt_video_url", (isset($_POST["ci_cpt_video_url"]) ? $_POST["ci_cpt_video_url"] : '') );
	update_post_meta($post_id, "ci_cpt_show_gallery", (isset($_POST["ci_cpt_show_gallery"]) ? $_POST["ci_cpt_show_gallery"] : '') );
}
endif;

if( !function_exists('ci_add_cpt_postmeta_meta_box') ):
function ci_add_cpt_postmeta_meta_box($object, $box)
{
	wp_nonce_field( basename( __FILE__ ), 'post_nonce' );
	
	$url = get_post_meta( $object->ID, 'ci_cpt_video_url', true );
	$show_gallery = get_post_meta( $object->ID, 'ci_cpt_show_gallery', true );
	
	?>
	<h4><?php _e('Instead of displaying a featured image at the top of each post you can display a video. Please not that the video takes precedence over the featured image, so if you have set both, the video will prevail.', 'ci_theme'); ?></h4>
	<p><?php _e('In the following box, you can simply enter the URL of a supported website\'s video. It needs to start with <strong>http://</strong> or <strong>https://</strong> (E.g. <em>http://www.youtube.com/watch?v=4Z9WVZddH9w</em>). A list of supported websites can be <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">found here</a>.', 'ci_theme'); ?></p>
	<p><?php _e('If you want to embed a video from an unsupported website, copy the video\'s embed code and paste it into the same box below.', 'ci_theme'); ?></p>
	<p>
		<label for="ci_cpt_video_url"><?php _e( 'Video URL:', 'ci_theme' ); ?></label><br>
		<input type="text" id="ci_cpt_video_url" name="ci_cpt_video_url" class="code widefat" value="<?php echo esc_attr($url); ?>" />
	</p>
	
	<p><?php _e('You may also choose to display a gallery (slider) of all images attached to this post, instead of the the featured image or the video. Please not that the gallery takes precedence over the featured image and the video, so if you have set all of them, the gallery will prevail.', 'ci_theme'); ?></p>
	<p><input type="checkbox" id="ci_cpt_show_gallery" name="ci_cpt_show_gallery" value="enabled" <?php checked($show_gallery, 'enabled'); ?> /> <label for="ci_cpt_show_gallery"><?php _e('Show a gallery instead instead of a video or featured image.', 'ci_theme'); ?></label></p>

	<?php
}
endif;
?>