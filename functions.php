<?php
	require_once( 'external/starkers-utilities.php' );
	//add_theme_support('post-thumbnails');	
	
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

	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Quick Links',
			'menu_title'	=> 'Quick Links',
			'menu_slug' 	=> 'quick-links',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
	}

	function disable_wp_emojicons() {
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
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

	function remove_menus(){
	  global $menu;
	  global $submenu;
	  remove_menu_page( 'index.php' );                 
	  // remove_menu_page( 'jetpack' ); 
	  //remove_menu_page( 'edit.php' ); 
	  remove_menu_page( 'upload.php' );              
	  // remove_menu_page( 'edit.php?post_type=page' );    
	  remove_menu_page( 'edit-comments.php' );          
	  //remove_menu_page( 'themes.php' );                
	  //remove_menu_page( 'plugins.php' );         
	  //remove_menu_page( 'users.php' );                
	  remove_menu_page( 'tools.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );

	function admin_default_page() {
	  return 'wp-admin/edit.php?post_type=story';
	}

	function renderButton($link, $title, $style = 'anchor', $class=''){
		$svg = '<svg class="o-circle" viewBox="0 0 24 24"><circle class="o-circle__inner" cx="12.1" cy="12.1" r="11.1"/><circle class="o-circle__outer" cx="12.1" cy="12.1" r="11.1"/><g><line x1="5.1" y1="11.8" x2="17.6" y2="11.8"/><polyline points="14.8,8.4 18.2,11.8 14.8,15.2 "/></g></svg>';
		if($style != 'div'){
			return '<a href="'.$link.'" class="o-button '.$class.'">'.$svg .'<span>'.$title.'</span></a>';
		}
		else{
			return '<div class="o-button '.$class.'">'.$svg.'<span>'.$title.'</span></div>';
		}
	}
	function renderCircularButton($link, $title, $image){
		$button = renderButton('',$title, 'div');
		return '<a href="'.$link.'" class="o-button s--circular"><section><figure style="background-image:url('.$image.')"></figure></section>'.$button.'</a>';
	}
	function renderRhombusButton($link, $title, $image){
		$button = renderButton('',$title, 'div');
		if($title){
			return '<a href="'.$link.'" class="o-rhombus-button"><div class="o-rhombus s--medium"><figure class="o-rhombus__image" style="background-image:url('.$image.')"></figure></div>'.$button.'</a>';
		}
		else {
			return '<a href="'.$link.'" class="o-rhombus-button"><div class="o-rhombus s--medium"><figure class="o-rhombus__image" style="background-image:url('.$image.')"></figure></div></a>';
		}
	}

	function submitContact(){
		if(isset($_POST['form_nonce']) || wp_verify_nonce($_POST['form_nonce'], 'form_nonce_key')){
			if(isset($_POST['userName'])){
				$userName = trim($_POST['userName']);
			}
			if(isset($_POST['userTelephone'])){
				$userTelephone = trim($_POST['userTelephone']);
			}			
			if(isset($_POST['userEmail'])){
				$userEmail = verifyEmail('userEmail');
			}

			$messageHeader[] = 'From: '.$userName.' <'.$userEmail.'>';
			$messageHeader[] = 'Reply-To: '.$userName.' <'.$userEmail.'>';

			if(isset($_POST['userMessage'])){
				$userMessage = trim($_POST['userMessage']);
				if(!strstr($userMessage, 'http://')){
					$messageBody = 'Email: '.$userEmail."\n".'Name: '.$userName."\n".'Phone Number: '.$userTelephone."\n".'Message: '.$userMessage;
					wp_mail('info@reachahand.org', 'RAHU Website Inquiry', $messageBody, $messageHeader);	
				}
				else {exit;}
			}
		}
		else {exit;}	
	}

	function getPostTime(){
		return human_time_diff(get_the_time('U'),current_time('timestamp')).' ago';
	}

	function getPostThumbnail(){
		return get_field('cover_image');
	}

	function getPostExcerpt($charlength) {
		$postExcerpt = get_field('excerpt');
		return substr(get_field('excerpt'), 0, $charlength).'...';
	}

	function getStories(){
	    $offset = $_POST['offset'];
	    $storyCategory = $_POST['category'];
	    $postsPerPage = $_POST['postsPerPage'];
	    $postIndex = intval($_POST['tailIndex']) + 1;
	    $html = '';
	    $bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
	    $args = array();

	    if($storyCategory){
	    	$args = array('post_type'=>'story', 'post_per_page'=>$postsPerPage, 'offset'=>intval($offset), 'category_name' => $storyCategory);
	    } 
	    else{
	    	$args = array('post_type'=>'story', 'post_per_page'=>$postsPerPage, 'offset'=>intval($offset));
	    }

	    $stories = new WP_Query($args);
	    $storyClass = '';

	    if ($stories->have_posts()){
	    	while ($stories->have_posts()){
	    		$stories->the_post();

	    		if ($postIndex > 2) {
	    			$postIndex = 0;
	    		}

	    		if($postIndex == 2){
	    			$postClass = 'u-full';
	    		} else {
	    			$postClass = 'u-half';
	    		}

	    		$storyTitle = get_the_title();
	    		$storyLink = get_permalink();
	    		$storyTime = getPostTime();
	    		$storyThumb = getPostThumbnail();
	    		$storyExcerpt = getPostExcerpt(136);

	    		$html .= '<li id="'.$postIndex.'" class="o-article '.$postClass.'" data-aos="fade-up"><a class="u-wrap o-article__link" href="'.$storyLink.'"><section class="o-article__figure"><figure style="background-image:url('.$storyThumb.')"><div class="u-center"><i class="o-icon s--pen"></i></div><span class="o-article__time o-subtitle">'.$storyTime.'</span></figure></section><span class="o-bubble '.$bubbleSizes[array_rand($bubbleSizes)].'"></span><section class="o-article__brief"><span class="o-subheading">'.$storyTitle.'</span><section>'.$storyExcerpt.'<span class="o-link"><i class="o-icon s--arrow-ltr"></i></span></section></section></a></li>';

	    		$postIndex ++;
	    	}
	    	wp_reset_postdata();
	    	echo json_encode($html);
	    } else {
	    	echo 0;
	    }
	    die();
	}
	add_action('wp_ajax_getStories', 'getStories');
	add_action('wp_ajax_nopriv_getStories', 'getStories');

	remove_filter('the_content', 'wpautop');
	//add_filter('login_redirect', 'admin_default_page');
?>