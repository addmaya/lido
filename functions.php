<?php
	require_once( 'external/starkers-utilities.php' );
	
	function getArticleClass($articleCount){
		
		$articleClass = '';

		switch ($articleCount) {
			case 1:
				$articleClass = 's--bottom-left';
				break;
			case 2:
				$articleClass = 's--bottom-right';
				break;
			case 3:
				$articleClass = 's--right';
				break;
			default:
				$articleClass = 's--left';
				break;
		}
		return $articleClass;
	}

	//add_theme_support('post-thumbnails');	
	function get_custom_feeds($feed_query) {
		if (isset($feed_query['feed']) && !isset($feed_query['post_type']))
			$feed_query['post_type'] = array('story', 'post', 'album', 'video');
		return $feed_query;
	}
	add_filter('request', 'get_custom_feeds');

	function rss_content( $content ) {
	    global $post;
	    $postSummary = get_field('summary', $post->ID);
	    $postPhoto = get_field('photo', $post->ID);

	    if ($postPhoto) {	
	    	$content = '<p><a href="'.get_permalink().'"><img src="' .$postPhoto.'" /></a>'. $postSummary . '</p>' . $content;
	    }
	    return $content;
	}
	add_filter( 'the_excerpt_rss', 'rss_content' );
	add_filter( 'the_content_feed', 'rss_content' );
	
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

	function getYoutubeID($url){
	    parse_str(parse_url($url, PHP_URL_QUERY ), $yt_id);
	    return $yt_id['v'];  
	}

	function getYoutubeMeta($yt_id){
		$yt_apikey = 'AIzaSyCuQTR5LVpmHgs2EPrhBVbAGjmHunxTmMk';
		$yt_query = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$yt_id.'&key='.$yt_apikey.'&fields=items(snippet(title,description,publishedAt,thumbnails(maxres,default)),statistics(viewCount))&part=snippet,statistics');
		$yt_response = json_decode($yt_query);
		$yt_meta['yt_date'] = $yt_response->items[0]->snippet->publishedAt;
        $yt_meta['yt_title'] = $yt_response->items[0]->snippet->title;
		$yt_meta['yt_desc'] = $yt_response->items[0]->snippet->description;
		$yt_meta['yt_thumb'] = $yt_response->items[0]->snippet->thumbnails->maxres->url;
		$yt_meta['yt_count'] = $yt_response->items[0]->statistics->viewCount;
        $yt_meta['yt_thumb_std'] = $yt_response->items[0]->snippet->thumbnails->default->url;
		return $yt_meta;
	}

	add_action('admin_post_submitContact', 'submitContact');
	add_action('admin_post_nopriv_submitContact', 'submitContact');

	function verifyEmail($a){
		if(isset($_POST[$a])) {
			$userEmail = trim($_POST[$a]);
			if(($userEmail != 'Email') && (preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $userEmail))){
				return $userEmail;
			}
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

			if(isset($_POST['userSubject'])){
				$userSubject = ' :'.trim($_POST['userSubject']);
			}

			$messageHeader[] = 'From: '.$userName.' <'.$userEmail.'>';
			$messageHeader[] = 'Reply-To: '.$userName.' <'.$userEmail.'>';

			if(isset($_POST['userMessage'])){
				$userMessage = trim($_POST['userMessage']);
				if(!strstr($userMessage, 'http://')){
					$messageBody = 'Email: '.$userEmail."\n".'Name: '.$userName."\n".'Phone Number: '.$userTelephone."\n".'Message: '.$userMessage;
					wp_mail('ask@addmaya.com', 'SF Website Inquiry'.$userSubject, $messageBody, $messageHeader);
					echo $userSubject;
				}
				else {exit; echo 'error';}
			}
		}
		else {exit; echo 'fup';}	
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

	function renderArticle($articleClass, $articleCount, $aosDelay, $storyPhoto, $storyLink, $storyBeneficiary, $storyPrograms, $storyArea, $storyDate, $postBalance = 0){
		$html = '';

		$html .= '<article data-balance="'.$postBalance.'" class="o-article '.$articleClass.'" data-index="'.$articleCount.'" data-aos="fade-up" data-aos-delay="'.$aosDelay.'">';

		$html .= '<section class="u-clear">';
		$html .= '<figure><a href="'.$storyLink.'" class="js-bkg o-image" data-image-url="'.$storyPhoto.'"><span class="o-image__cover"></span></a></figure>';

		$html .= '<section class="o-article__summary">';
		$html .= '<h2><a href="'.$storyLink.'"><span>'.$storyBeneficiary.'</span></a></h2>';
		$html .= '<ul class="o-article__meta">';

		if ($storyPrograms) {
			$html .= '<li><a href="'.get_permalink($storyPrograms[0]).'">/'.get_the_title($storyPrograms[0]).'</a></li>';
		}

		if($storyArea){
			$html .= '<li><a href="#">/ '.$storyArea.'</a></li>';	
		}

		$html .= '<li><a href="#">/ '.get_the_date().'</a></li>';
		$html .= '</ul>';
		$html .= '<div class="t-dark">'.renderButton(get_permalink(), 'Read Story').'</div>';
		$html .= '</section></section></article>';
		
		return $html;		
	}

	function getPosts(){
		$offset = intval($_POST['offset']);
		$postType = $_POST['post_type'];
		$articleCount = intval($_POST['tailIndex']) + 1;
		$articleClass = '';
		$html = '';
		$aosDelay = 0;

		$stories = new WP_Query(array(
			'post_type'=>$postType,
			'posts_per_page'=>get_option('posts_per_page'),
			'offset'=>$offset
			)
		);
		
		$postCount = $stories->post_count;
		$postBalance = wp_count_posts($postType)->publish - $postCount;

		if($stories->have_posts()){
			while ($stories->have_posts()) {
				$stories->the_post();

				if($articleCount > 3){
					$articleCount = 0;
				}						
				
				$storyTitle = get_the_title();
				$storyLink = get_permalink();
				$storyBeneficiary = get_field('beneficiary');
				$storyPhoto = get_field('photo');
				$storyArea = get_field('area');
				$storyPrograms = get_field('program');
				$articleClass = getArticleClass($articleCount);
				
				$html .= renderArticle($articleClass, $articleCount, $aosDelay, $storyPhoto, $storyLink, $storyBeneficiary, $storyPrograms, $storyArea, $postBalance);
				
				$articleCount++;
				$aosDelay = $aosDelay + 50;	
			} 

			wp_reset_postdata();
			echo json_encode($html);	
		}
		else {
			echo 0;
		}
		die();   
	}

	add_action('wp_ajax_getPosts', 'getPosts');
	add_action('wp_ajax_nopriv_getPosts', 'getPosts');

	//remove_filter('the_content', 'wpautop');
	//add_filter('login_redirect', 'admin_default_page');
?>