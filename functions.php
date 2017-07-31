<?php
	require_once( 'external/starkers-utilities.php' );
	add_theme_support('post-thumbnails');	
	function starkers_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ($comment->comment_approved == '1'): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	show_admin_bar(false);

	function disable_wp_emojicons() {
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
	add_action( 'init', 'disable_wp_emojicons' );

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	
	add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
	function remove_jquery_migrate( &$scripts)
	{
	    if(!is_admin())
	    {
	        $scripts->remove( 'jquery');
	        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	    }
	}
	remove_action('wp_head','rest_output_link_wp_head');
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);


	add_action( 'admin_init', 'hide_editor' );
	function hide_editor() {
	  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	  if( !isset( $post_id ) ) return;
	  
	  $page = get_the_title($post_id);
	  if(!in_array($page, array('all'), true )){ 
	    remove_post_type_support('page', 'editor');
	  }

	  $template_file = get_post_meta($post_id, '_wp_page_template', true);
	  if($template_file == 'my-page-template.php'){
	    remove_post_type_support('page', 'editor');
	  }
	}
?>