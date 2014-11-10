<?php /* Parent Theme */

/* Define Constants Function - DO NOT MODIFY >~~~~~~~> */
if(!function_exists('ter_define_constants')): function ter_define_constants($constants){ foreach($constants as $key => $value) if(!defined($key)) define($key,$value); } endif;
$ter_dir = get_bloginfo('template_directory');//Parent theme is always 'template_directory'
/* <~~~~~~~< END of DO NOT MODIFY */

/* Parent Theme Directories ~~> */
ter_define_constants(array(
	'TERRA' => 			$ter_dir . '/',
	'TER_BOOTSTRAP' => 	$ter_dir . '/bootstrap/',
	'TER_CSS' => 		$ter_dir . '/css/',
	'TER_GRAPHICS' => 	$ter_dir . '/graphics/',
	'TER_INCLUDES' => 	dirname(__FILE__) . '/includes/',
	'TER_JS' => 		$ter_dir . '/js/',
	'TER_SLIDER' => 	$ter_dir . '/owl/'
));

/* Theme Options - Change theme settings here >~~~~~~~> */

ter_define_constants(array(
	/* System */
	'TER_ERROR_DISPLAY_ON' => 		false,
	'TER_CDN_URL' => 				'//cdnjs.cloudflare.com/ajax/libs/',
	'TER_JQUERY_VERSION' => 		'1.9.1',
	'TER_BOOTSTRAP_VERSION' => 		'3.3.0',	
	'TER_GOOGLE_FONT' => 			'Open+Sans:400,400italic,600,600italic',	
	/* Layout */
	'TER_LOGO' => 					$ter_dir . '/graphics/logo.png',
	'TER_HEADER_HOME_LINK' => 		'title',
	'TER_FULL_WIDTH_CLASS' => 		'col-sm-12',
	'TER_PRIMARY_CLASS' => 			'col-sm-8',
	'TER_SECONDARY_CLASS' => 		'col-sm-4',
	'TER_SECONDARY' => 				'right',
	'TER_SIDEBARS' => 				'Blog Sidebar,Page Sidebar',	
	/* Wordpress */
	'TER_ADMIN_BAR' => 				'editor',
	'TER_ADMIN_BAR_LOGIN' => 		false,
	'TER_EXCERPT' => 				false,
	'TER_EXCERPT_LEN' => 			40,
	'TER_TITLE_FORMAT_DEFAULT' => 	false,
	'TER_MAX_IMAGE_SIZE_KB' => 		1024,	
	/* Features */
	'TER_ACTIVATE_BACK_TO_TOP' => 	false,
	'TER_ACTIVATE_BRANDING' => 		false,
	'TER_ACTIVATE_FAVICONS' => 		false,
	'TER_ACTIVATE_SITE_MOVED' => 	false,
	'TER_ACTIVATE_SSL' => 			false,
	'TER_ACTIVATE_SLIDER' => 		false,
	'TER_ACTIVATE_WAYPOINTS' => 	false,	
	/* Experimental */
	'TER_ACTIVATE_SKROLLR' => 		false
));

/* END <~~~~~~~< Theme Options */

/* Includes ~~> */
require(TER_INCLUDES . 'template-tags.php');
require(TER_INCLUDES . 'walkers.php');
require(TER_INCLUDES . 'admin.php');
require(TER_INCLUDES . 'shortcode.php');
require(TER_INCLUDES . 'cookie.php');
if(TER_ACTIVATE_BRANDING) require(TER_INCLUDES . 'branding.php');
if(TER_ACTIVATE_SLIDER) require(TER_INCLUDES . 'slider.php');
if(TER_ACTIVATE_SSL) require(TER_INCLUDES . 'ssl.php');
//if(TER_ACTIVATE_SKROLLR) require(TER_INCLUDES . 'skrollr.php'); //Experimental

/* Action & Filter Callbacks >~~~~~~~> */

if(!function_exists('terra_setup')): 
function terra_setup(){
	if(TER_ERROR_DISPLAY_ON){ error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors','1'); }
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	register_nav_menu('header',__('Header Menu','terra'));
	register_nav_menu('primary',__('Primary Menu','terra'));
	register_nav_menu('footer',__('Footer Menu','terra'));
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','feed_links',2);
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','wlwmanifest_link');
	remove_action('wp_head','feed_links_extra',3);
	remove_action('wp_head','start_post_rel_link',10,0);
	remove_action('wp_head','parent_post_rel_link',10,0);
	remove_action('wp_head','adjacent_posts_rel_link',10,0);
	remove_filter('the_content', 'wptexturize');
	remove_filter('comment_text', 'wptexturize');
	remove_filter('the_excerpt', 'wptexturize');
	//add_theme_support('post-formats',explode(',','gallery,image,video')); //Uncomment to create post formats
	//remove_filter('wp_list_pages','ter_add_home_link'); //Uncomment to remove home link from sitemap
}
endif;

if(!function_exists('ter_head')): 
function ter_head(){
	if(TER_ACTIVATE_FAVICONS) require('favicon.php');
	else echo '<link rel="shortcut icon" href="' . TER_GRAPHICS .'favicon-32x32.png">';
	//echo '<meta name="format-detection" content="telephone=no">';//This removes IPhone phone formatting - Future Constant?
}
endif;

if(!function_exists('ter_remove_dashboard_meta')):
function ter_remove_dashboard_meta(){
	remove_meta_box('dashboard_primary','dashboard','normal'); 
	remove_meta_box('dashboard_quick_press','dashboard','side');
}
endif;

if(!function_exists('ter_admin_favicon')):
function ter_admin_favicon(){
	echo '<link rel="shortcut icon" href="' . TER_GRAPHICS . 'favicon-32x32.png">';
}
endif;

if(!function_exists('ter_admin_footer')):
function ter_admin_footer(){
	echo 'Terra Theme by <a href="http://hyperspatial.com" target="_blank">Hyperspatial Design Ltd</a>';
}
endif;

if(!function_exists('ter_add_home_link')):
function ter_add_home_link($items){
	if(is_front_page()) $current = ' current_page_item';
    $link = '<li class="menu-item-home' . $current . '"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
    $items = $link . $items;
    return $items;
}
endif;

if(!function_exists('ter_admin_bar')):
function ter_admin_bar(){
	if(TER_ADMIN_BAR != 'all') add_action('admin_print_scripts-profile.php','ter_hide_admin_bar');
	if(!is_user_logged_in() && TER_ADMIN_BAR_LOGIN == true) return true;
	switch(TER_ADMIN_BAR){
		case 'all': $hide_bar = false; break;
		case 'admin': if(!current_user_can('edit_plugins')) $hide_bar = true; break;
		case 'editor': if(!current_user_can('edit_pages')) $hide_bar = true; break;
		case 'none': $hide_bar = true; break;
		default: $hide_bar = false;
	}
	if($hide_bar) return false;
	else return true;
}
function ter_hide_admin_bar(){
	echo '<style type="text/css">.show-admin-bar{display:none;}</style>';
}
endif;

if(!function_exists('ter_admin_bar_login')):
function ter_admin_bar_login($wp_admin_bar){
	if(!is_user_logged_in() && TER_ADMIN_BAR_LOGIN == true) $wp_admin_bar->add_menu(array('title' => __('Log In'),'href' => wp_login_url()));
}
endif;

if(!function_exists('ter_admin_bar_remove_wp')):
function ter_admin_bar_remove_wp(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
endif;

if(!function_exists('ter_auto_excerpt_more')):
function ter_auto_excerpt_more($more){
	return ' &hellip;' . ter_continue_reading_link();
}
endif;

if(!function_exists('ter_filter_next_post_sort')):
function ter_filter_next_post_sort($sort){
	$sort = "ORDER BY p.post_title ASC LIMIT 1";
	return $sort;
}
endif;

if(!function_exists('ter_filter_next_post_where')):
function ter_filter_next_post_where($where){
	global $post,$wpdb;
	return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '" . $post->post_type . "' AND p.post_status = 'publish'",$post->post_title);
}
endif;
 
if(!function_exists('ter_filter_previous_post_sort')):
function ter_filter_previous_post_sort($sort){
	$sort = "ORDER BY p.post_title DESC LIMIT 1";
	return $sort;
}
endif;

if(!function_exists('ter_filter_previous_post_where')):
function ter_filter_previous_post_where($where){
	global $post,$wpdb;
	return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '" . $post->post_type . "' AND p.post_status = 'publish'",$post->post_title);
}
endif;

if(!function_exists('ter_custom_excerpt_more')):
function ter_custom_excerpt_more($output){
	if(has_excerpt() && ! is_attachment()) $output .= ter_continue_reading_link();
	return $output;
}
endif;

if(!function_exists('ter_custom_login_styles')):
function ter_custom_login_styles(){
	echo '<style type="text/css">body.login div#login h1 a{background-image:url('. TER_GRAPHICS .'logo.png); width:154px; height:44px!important; background-size:auto}</style>';
}
endif;

if(!function_exists('ter_custom_login_logo_title')):
function ter_custom_login_logo_title(){
	return get_bloginfo('site');
}
endif;

if(!function_exists('ter_custom_login_logo_url')):
function ter_custom_login_logo_url(){
	return get_bloginfo('url');
}
endif;

if(!function_exists('ter_site_map_post_type')):
function ter_site_map_post_type($dont_show_array = array('')){	
	$post_types = get_post_types(array('public' => true,'_builtin' => false));
	foreach($post_types as $post_type){
		if(in_array($post_type,$dont_show_array)) continue;
		$post_type_object = get_post_type_object($post_type);
		echo '<h3>' . $post_type_object->label . '</h3>';
		echo '<ul>';
		wp_list_pages('post_type=' . $post_type . '&depth=0&title_li=');
		echo '</ul>';
	}
}
endif;

if(!function_exists('ter_excerpt_length')):
function ter_excerpt_length($length){
	return TER_EXCERPT_LEN;
}
endif;

if(!function_exists('ter_page_nav_filter')):
function ter_page_nav_filter($menu){
	$replace = array('<div class="menu">','</div>','<ul>','</ul>');
	$menu = str_replace($replace,'',$menu); 
	return $menu;
}
endif;

if(!function_exists('ter_register_sidebars')):
function ter_register_sidebars(){
	$sidebars = explode(',',TER_SIDEBARS);
	foreach($sidebars as $sidebar){
		register_sidebar(array('name'=> $sidebar,'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">','after_widget' => '</div></div>','before_title' => '<h3>','after_title' => '</h3>',));
	}
}
endif;

if(!function_exists('ter_site_moved_notice')):
function ter_site_moved_notice(){
    echo '<div class="error"><p><strong>Site Moved: ' . get_bloginfo('url') .' has moved to a new location, new IP address and or a new web server. Any edits made to posts here will not be reflected in the current/live website.</strong></p></div>';
}
endif;

if(!function_exists('ter_site_moved_redirect')):
function ter_site_moved_redirect(){
	global $post;
	if($post->ID == TER_ACTIVATE_SITE_MOVED) return;
	$redirect_url = get_permalink(TER_ACTIVATE_SITE_MOVED);
	wp_redirect($redirect_url,301);
	exit;
}
endif;

if(!function_exists('ter_ssl_content_filter')):
function ter_ssl_content_filter($content){
	if(isset($_SERVER['HTTPS'])) $content = str_replace('http://' . $_SERVER['SERVER_NAME'],'https://' . $_SERVER['SERVER_NAME'],$content);
	return $content;
}
endif;

if(!function_exists('ter_enqueue_styles')):
function ter_enqueue_styles(){
	if(is_admin()) return;
	if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])) $ie8 = true;
	if(TER_GOOGLE_FONT && preg_match('/Open\+Sans/',TER_GOOGLE_FONT)){
		wp_deregister_style('open-sans');
		wp_register_style('open-sans','//fonts.googleapis.com/css?family=' . TER_GOOGLE_FONT);
		wp_enqueue_style('open-sans');
	}
	elseif(TER_GOOGLE_FONT){ wp_enqueue_style('terra_font','//fonts.googleapis.com/css?family=' . TER_GOOGLE_FONT);	}
	if($ie8) wp_enqueue_style('ter_bootstrap',TER_BOOTSTRAP . 'css/bootstrap.min.css');
	else wp_enqueue_style('ter_bootstrap',TER_CDN_URL . 'twitter-bootstrap/' . TER_BOOTSTRAP_VERSION . '/css/bootstrap.min.css');
	if(TER_ACTIVATE_SLIDER) wp_enqueue_style('ter_slider_css',TER_CDN_URL . 'owl-carousel/1.3.2/owl.carousel.css');
	if(TER_ACTIVATE_SLIDER) wp_enqueue_style('ter_slider_css_theme',TER_CDN_URL . 'owl-carousel/1.3.2/owl.theme.css');
}
endif;

if(!function_exists('ter_enqueue_parent_theme_styles')):
function ter_enqueue_parent_theme_styles(){
	if(is_admin()) return;	
	wp_enqueue_style('terra',TERRA . 'style.css',array('ter_bootstrap'));
}
endif;

if(!function_exists('ter_enqueue_js')):
function ter_enqueue_js(){
	if(is_admin()) return;
	if(TER_JQUERY_VERSION){
		wp_deregister_script('jquery');
		wp_register_script('jquery',TER_CDN_URL . 'jquery/' . TER_JQUERY_VERSION . '/jquery.min.js');
	}
	wp_enqueue_script('jquery');
	wp_enqueue_script('ter_bootstrap_js',TER_CDN_URL . 'twitter-bootstrap/' . TER_BOOTSTRAP_VERSION . '/js/bootstrap.min.js',array('jquery'));
	if(TER_ACTIVATE_SLIDER) wp_enqueue_script('ter_slider_js',TER_CDN_URL . 'owl-carousel/1.3.2/owl.carousel.min.js',array('jquery'));
	if(TER_ACTIVATE_SKROLLR) wp_enqueue_script('ter_skrollr_js',TER_CDN_URL . 'skrollr/0.6.27/skrollr.min.js',array('jquery'));
	if(TER_ACTIVATE_WAYPOINTS) wp_enqueue_script('ter_waypoints',TER_CDN_URL . 'waypoints/2.0.5/waypoints.min.js',array('jquery'));
	wp_enqueue_script('ter_js',TER_JS . 'scripts.js',array('jquery'));
}
endif;

if(!function_exists('ter_add_stylesheet')):
function ter_add_stylesheet(){
	if(is_admin()) return;
	global $ter_add_stylesheet;
	if(!$ter_add_stylesheet) return;
    foreach($ter_add_stylesheet as $stylesheet)	wp_enqueue_style('ter_style_' . $stylesheet, TER_CSS . $stylesheet . '.css');
}
endif;

if(!function_exists('ter_add_script')):
function ter_add_script(){
	if(is_admin()) return;
	global $ter_add_script;
	if(!$ter_add_script) return;
    foreach($ter_add_script as $script)	wp_enqueue_script('ter_script_' . $script, TER_JS . $script . '.js');
}
endif;

if(!function_exists('ter_prepend_attachment')):
function ter_prepend_attachment($p){ return '<p class="attachment">' . wp_get_attachment_link(0,'full',false) . '</p>'; }
endif;

if(!function_exists('ter_limit_image_uploads')):
function ter_limit_image_uploads($file){
	$error_message = 'KB is to large. Please reduce the file size of your image to ' . TER_MAX_IMAGE_SIZE_KB . 'KB or less. Hosting space is limited and uploading large images will slow down your page loads. Use a tool such as http://toki-woki.net/p/Shrink-O-Matic/ to help you to resize your images. Target size: Width 1024px, file size 100KB-200KB';
	$size_in_kb = $file['size'] / 1024;
	if(preg_match('/image/',$file['type'])) if($size_in_kb > TER_MAX_IMAGE_SIZE_KB) $file['error'] = round($size_in_kb,2) . $error_message;
	return $file;	
}
endif;

/* Actions & Filters >~~~~~~~> */

add_action('after_setup_theme','terra_setup');//Theme Setup
add_action('ter_head','ter_head');//WP Head
add_action('admin_init','ter_remove_dashboard_meta');//Admin Widgets
add_action('login_head','ter_admin_favicon');//Admin Favicon
add_action('admin_head','ter_admin_favicon');//Admin Favicon
add_filter('admin_footer_text','ter_admin_footer');//Admin Footer
add_filter('wp_list_pages','ter_add_home_link');//Add Home Link
add_filter('show_admin_bar','ter_admin_bar');//Admin Bar
add_action('admin_bar_menu','ter_admin_bar_login');//Login Admin Bar
add_action('wp_before_admin_bar_render','ter_admin_bar_remove_wp');//Admin Bar no WP
add_filter('excerpt_more','ter_auto_excerpt_more');//Auto Excerpt More
add_filter('get_the_excerpt','ter_custom_excerpt_more');//Excerpt More
add_action('login_enqueue_scripts','ter_custom_login_styles');//Login Logo - Overwritten in child theme
add_filter('login_headertitle','ter_custom_login_logo_title');//Login Logo Title
add_filter('login_headerurl','ter_custom_login_logo_url');//Login Url
add_filter('excerpt_length','ter_excerpt_length');//Excerpt Length
add_filter('wp_page_menu','ter_page_nav_filter',10);//Page Nav Filter
add_action('widgets_init','ter_register_sidebars');//Sidebars
add_action('wp_print_styles','ter_enqueue_styles',100);//Enqueue Styles
add_action('wp_print_styles','ter_enqueue_parent_theme_styles',101);//Enqueue Parent Styles
add_action('wp_print_scripts','ter_enqueue_js',100);//Enqueue Js
add_action('wp_print_styles','ter_add_stylesheet',102);//Add Stylesheet - Add to top of page template-> $ter_add_stylesheet = array('test'); 
add_action('wp_print_scripts','ter_add_script',101);//Add Script - Add to top of page template-> $ter_add_script = array('test');
add_filter('prepend_attachment','ter_prepend_attachment');//Attachment Page - Set image size
add_filter('wp_handle_upload_prefilter','ter_limit_image_uploads');//Limit uploaded image size
if(TER_ACTIVATE_SITE_MOVED) add_action('admin_notices','ter_site_moved_notice');//Site moved notice and redirect admin notice
if(TER_ACTIVATE_SITE_MOVED) add_action('ter_redirect','ter_site_moved_redirect',10,1);//Site moved notice and redirect
add_filter('the_content','ter_ssl_content_filter');//SSL Feature
?>