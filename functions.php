<?php /* Parent Theme */

/* Define Constants Function - DO NOT MODIFY >~~~~~~~~> */
if(!function_exists('terx_define_constants')): function terx_define_constants($constants){ foreach($constants as $key => $value) if(!defined($key)) define($key,$value); } endif;
$terx_dir = get_bloginfo('template_directory');//Parent theme is always 'template_directory'
/* <~~~~~~~< END of DO NOT MODIFY */

/* Parent Theme Directories ~~> */
terx_define_constants(array(
	'TERRA' => 	$terx_dir . '/',
	'TERX_CSS' => 		$terx_dir . '/css/',
	'TERX_GRAPHICS' => 	$terx_dir . '/graphics/',
	'TERX_INCLUDES' => 	dirname(__FILE__) . '/includes/',
	'TERX_JS' => 		$terx_dir . '/js/',
	'TERX_SLIDER' => 	$terx_dir . '/owl/'
));

/* Theme Options - See README.md for your release: https://github.com/hyptx/terra >~~~~~~~~> */
terx_define_constants(array(
	/* System */
	'TERX_ERROR_DISPLAY_ON' => 		true,
	'TERX_CDN_URL' => 				'//cdnjs.cloudflare.com/ajax/libs/',
	'TERX_JQUERY_VERSION' => 		'1.9.1',//GF Compatibility issue with 3.0
	'TERX_BOOTSTRAP_VERSION' => 		'4.1.3',
	'TERX_POPPER_VERSION' =>			'1.14.3',
	'TERX_BS_IMG_RESPONSIVE' => 		'article img,.widget img',
	'TERX_GOOGLE_FONT' => 			'Open+Sans:400,400italic,600,600italic',
	/* Layout */
	'TERX_LOGO' => 					$terx_dir . '/graphics/logo.png',
	'TERX_HEADER_HOME_LINK' => 		'title',
	'TERX_FULL_WIDTH_CLASS' => 		'col-12',
	'TERX_PRIMARY_CLASS' => 			'col-md-8 col-lg-9',
	'TERX_SECONDARY_CLASS' => 		'col-md-4 col-lg-3',
	'TERX_SECONDARY' => 				'right',
	'TERX_SIDEBARS' => 				'Blog Sidebar,Page Sidebar',
	/* Wordpress */
	'TERX_ADD_HOME_LINK' => 			false,
	'TERX_ADMIN_BAR' => 				'editor',
	'TERX_ADMIN_BAR_LOGIN' => 		false,
	'TERX_COMMENTS' => 				false,
	'TERX_DISABLE_VISUAL_EDITOR' =>  false,
	'TERX_EXCERPT' => 				false,
	'TERX_EXCERPT_LEN' => 			40,
	'TERX_TITLE_FORMAT_DEFAULT' => 	false,
	'TERX_MAX_IMAGE_SIZE_KB' => 		640,
	'TERX_WP_POST_FORMATS' => 		false,
	'TERX_GF_BUTTON_CLASS' =>		'btn btn-info',
	'TERX_COPYRIGHT' =>				'&copy; ' . date('Y ') . get_bloginfo('name') . ' - ' . 'Design by <a target="_blank" href="https://hyperspatial.com">Hyperspatial Design Ltd</a>',
	/* Google - Entering a value will create the google snippets dynamically */
	'TERX_GOOGLE_ANALYTICS_UA_NO' => '',
	'TERX_GOOGLE_ADWORDS_CONV_ID' => '',
	'TERX_GTM_CONTAINER_ID' => 		'',
	/* Features */
	'TERX_ACTIVATE_BACK_TO_TOP' => 	false,
	'TERX_ACTIVATE_BRANDING' => 		false,
	'TERX_ACTIVATE_BREADCRUMBS' => 	false,
	'TERX_ACTIVATE_CUSTOM_SIDEBAR' =>false,
	'TERX_ACTIVATE_FAVICONS' => 		false,
	'TERX_ACTIVATE_RETINA_JS' => 	false,
	'TERX_ACTIVATE_SITE_MOVED' => 	false,
	'TERX_ACTIVATE_SMTP' => 			false,
	'TERX_ACTIVATE_SLIDER' => 		false,
	'TERX_ACTIVATE_WAYPOINTS' => 	false,
	/* SMTP TERX_ACTIVATE_SMTP - Use Google API for Gmail - Test: terx_test_email('adam@hyperspatial.com') */
	'TERX_SMTP_HOST' => 				'smtp.gmail.com',
	'TERX_SMTP_PORT' => 				465,
	'TERX_SMTP_USERNAME' => 			'',
	'TERX_SMTP_PASSWORD' => 			'',
	'TERX_SMTP_ENCRYPTION' => 		'ssl',//ssl or tls
	'TERX_SMTP_FROM_NAME' => 		'',
	/* Experimental */
	'TERX_ACTIVATE_SKROLLR' => 		false
));
/* END <~~~~~~~~< Theme Options */

/* Includes ~~~~> */
require(TERX_INCLUDES . 'template-tags.php');
require(TERX_INCLUDES . 'walkers.php');
require(TERX_INCLUDES . 'admin.php');
require(TERX_INCLUDES . 'shortcode.php');
require(TERX_INCLUDES . 'cookie.php');
if(TERX_ACTIVATE_BRANDING) require(TERX_INCLUDES . 'branding.php');
if(TERX_ACTIVATE_CUSTOM_SIDEBAR) require(TERX_INCLUDES . 'custom-sidebar.php');
if(TERX_ACTIVATE_SLIDER) require(TERX_INCLUDES . 'slider.php');
//if(TERX_ACTIVATE_SKROLLR) require(TERX_INCLUDES . 'skrollr.php'); //Experimental

/* Setup ~~> */
if(!function_exists('terx_setup')): 
function terx_setup(){
	if(TERX_ERROR_DISPLAY_ON){ error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors','1'); }
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	register_nav_menu('header',__('Header Menu','terra'));
	register_nav_menu('primary',__('Primary Menu','terra'));
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','feed_links',2);
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','wlwmanifest_link');
	remove_action('wp_head','feed_links_extra',3);
	remove_action('wp_head','start_post_rel_link',10,0);
	remove_action('wp_head','parent_post_rel_link',10,0);
	remove_action('wp_head','adjacent_posts_rel_link',10,0);
	remove_filter('the_content','wptexturize');
	remove_filter('the_title','wptexturize');
	remove_filter('comment_text','wptexturize');
	remove_filter('the_excerpt','wptexturize');
	if(TERX_WP_POST_FORMATS) add_theme_support('post-formats',explode(',',TERX_WP_POST_FORMATS));
}
endif;
add_action('after_setup_theme','terx_setup');

/* Add Home Link to wp_list_pages ~~> */
if(!function_exists('terx_add_home_link')):
function terx_add_home_link($items){
	if(is_front_page()) $current = ' current_page_item';
    $link = '<li class="menu-item-home' . $current . '"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
    $items = $link . $items;
    return $items;
}
endif;
if(TERX_ADD_HOME_LINK) add_filter('wp_list_pages','terx_add_home_link');

/* Add Script
*  Add to top of any page template-> $terx_add_script = array('test'); ~~> */
if(!function_exists('terx_add_script')):
function terx_add_script(){
	if(is_admin() && !is_404()) return;
	global $terx_add_script;
	if(!$terx_add_script) return;
    foreach($terx_add_script as $script)	wp_enqueue_script('terx_script_' . $script, TERX_JS . $script . '.js');
}
endif;
add_action('wp_print_scripts','terx_add_script',105);

/* Add Stylesheet
*  Add to top of any page template-> $terx_add_stylesheet = array('test'); ~~> */
if(!function_exists('terx_add_stylesheet')):
function terx_add_stylesheet(){
	if(is_admin() && !is_404()) return;
	global $terx_add_stylesheet;
	if(!$terx_add_stylesheet) return;
    foreach($terx_add_stylesheet as $stylesheet)	wp_enqueue_style('terx_style_' . $stylesheet, TERX_CSS . $stylesheet . '.css');
}
endif;
add_action('wp_print_styles','terx_add_stylesheet',105);//Add Stylesheet - Add to top of page template-> $terx_add_stylesheet = array('test'); 

/* Admin Bar System ~~> */
if(!function_exists('terx_admin_bar')):
function terx_admin_bar(){
	$hide_bar = '';
	if(TERX_ADMIN_BAR != 'all') add_action('admin_print_scripts-profile.php','terx_admin_bar_hide');
	if(!is_user_logged_in() && TERX_ADMIN_BAR_LOGIN == true) return true;
	switch(TERX_ADMIN_BAR){
		case 'all': $hide_bar = false; break;
		case 'admin': if(!current_user_can('edit_plugins')) $hide_bar = true; break;
		case 'editor': if(!current_user_can('edit_pages')) $hide_bar = true; break;
		case 'none': $hide_bar = true; break;
		default: $hide_bar = false;
	}
	if($hide_bar) return false;
	else return true;
}
add_filter('show_admin_bar','terx_admin_bar');

/* Admin Bar Hide ~~> */
function terx_admin_bar_hide(){
	echo '<style type="text/css">.show-admin-bar{display:none;}</style>';
}
endif;
//Action call in terx_admin_bar()

/* Admin Bar Login Link ~~> */
if(!function_exists('terx_admin_bar_login_link')):
function terx_admin_bar_login_link($wp_admin_bar){
	if(!is_user_logged_in() && TERX_ADMIN_BAR_LOGIN == true) $wp_admin_bar->add_menu(array('title' => __('Log In'),'href' => wp_login_url()));
}
endif;
add_action('admin_bar_menu','terx_admin_bar_login_link');

/* Admin Bar Remove WP Logo ~~> */
if(!function_exists('terx_admin_bar_remove_wp')):
function terx_admin_bar_remove_wp(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
endif;
add_action('wp_before_admin_bar_render','terx_admin_bar_remove_wp');

/* Admin Favicon ~~> */
if(!function_exists('terx_admin_favicon')):
function terx_admin_favicon(){
	echo '<link rel="shortcut icon" href="' . TERX_GRAPHICS . 'favicon-32x32.png">';
}
endif;
add_action('login_head','terx_admin_favicon');
add_action('admin_head','terx_admin_favicon');

/* Admin Footer ~~> */
if(!function_exists('terx_admin_footer')):
function terx_admin_footer(){
	echo '<strong>Terra Theme by <a href="https://hyperspatial.com" target="_blank"><img src="' . TERX_GRAPHICS . 'favicon-16x16.png" alt="Terra" style="vertical-align:text-bottom; margin:0 6px">Hyperspatial Design Ltd</a></strong>';
}
endif;
add_filter('admin_footer_text','terx_admin_footer');

/* Admin Help Page Menu ~~> */
if(!function_exists('terx_admin_help_page_menu')):
function terx_admin_help_page_menu(){ add_menu_page('Terra Help','Terra Help','edit_pages','terx_help','terx_help_page_html', TERX_GRAPHICS . 'favicon-16x16.png'); }
endif;
add_action('admin_menu','terx_admin_help_page_menu');

/* Admin Remove Dashboard Meta ~~> */
if(!function_exists('terx_admin_remove_dashboard_meta')):
function terx_admin_remove_dashboard_meta(){
	remove_meta_box('dashboard_primary','dashboard','normal'); 
	remove_meta_box('dashboard_quick_press','dashboard','side');
}
endif;
add_action('admin_init','terx_admin_remove_dashboard_meta');

/* Delete Transients - WP will cache file includes in a transient, use this ONCE if you get file_get_contents errors ~~> */
function terx_delete_transients(){ 
    global $wpdb; 
    $sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE "_transient_%"';
    $wpdb->query($sql); 
}

/* Disable Visual Editor >~~~~~~~~> */
function terx_disable_visual_editor(){
	add_action('add_meta_boxes','terx_disable_visual_editor_add_meta_box',10,2);
	add_action('save_post','terx_save_page');
    if(is_admin() && isset($_GET['post'])){
		if(get_post_meta($_GET['post'],'_terx_disable_visual_editor',true)) add_filter('user_can_richedit','__return_false',50);
	}
}
if(TERX_DISABLE_VISUAL_EDITOR) terx_disable_visual_editor();

function terx_disable_visual_editor_add_meta_box( $post_type, $post ) {
    add_meta_box('terx-disable-ve',__('Disable Visual Editor'),'terx_show_disable_visual_editor_meta_box','page','normal','default');
}

function terx_show_disable_visual_editor_meta_box($post){
	$disable_visual_editor = get_post_meta($post->ID,'_terx_disable_visual_editor', true);
	if($disable_visual_editor) $checked = 'checked="checked"';
	else $checked = '';
	wp_nonce_field(plugin_basename(__FILE__),'terx_noncename');
	echo '<p><label><input type="checkbox" name="_terx_disable_visual_editor" value="1" ' . $checked . '>Disable the visual editor on this page</label></p><p><em>Check this box if this page has complex HTML. Customized pages require advanced HTML and should NOT be edited using the visual editor.</em></p>';
}

function terx_save_page($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if($_POST['post_type'] != 'page') return $post_id;
	if(!wp_verify_nonce($_POST['terx_noncename'],plugin_basename(__FILE__))) return $post_id;
	if(!current_user_can('edit_post',$post_id)) return $post_id;
	update_post_meta($post_id,'_terx_disable_visual_editor',$_POST['_terx_disable_visual_editor']);
} 
/* <~~~~~~~< END Disable Visual Editor */

/* Experimental, include JS file for use in modifying Gutenberg Blocks ~~> */
if(!function_exists('terx_filter_previous_post_where')):
function terx_enqueue_blocks(){
	wp_enqueue_script('terx-blocks',TERX_JS . 'blocks.js',array('wp-blocks', 'wp-element'));
}
//add_action('enqueue_block_editor_assets','terx_enqueue_blocks'); //Uncomment to load JS file
endif;

/* Enqueue Core Styles ~~> */
if(!function_exists('terx_enqueue_core_styles')):
function terx_enqueue_core_styles(){
	if(is_admin() && !is_404()) return;
	if(TERX_GOOGLE_FONT && preg_match('/Open\+Sans/',TERX_GOOGLE_FONT)){
		wp_deregister_style('open-sans');
		wp_register_style('open-sans','//fonts.googleapis.com/css?family=' . TERX_GOOGLE_FONT);
		wp_enqueue_style('open-sans');
	}
	elseif(TERX_GOOGLE_FONT){ wp_enqueue_style('terx_font','//fonts.googleapis.com/css?family=' . TERX_GOOGLE_FONT);	}
	wp_enqueue_style('terx_bootstrap',TERX_CDN_URL . 'twitter-bootstrap/' . TERX_BOOTSTRAP_VERSION . '/css/bootstrap.min.css');
	if(TERX_ACTIVATE_SLIDER) wp_enqueue_style('terx_slider_css',TERX_CDN_URL . 'owl-carousel/1.3.2/owl.carousel.css');
	if(TERX_ACTIVATE_SLIDER) wp_enqueue_style('terx_slider_css_theme',TERX_CDN_URL . 'owl-carousel/1.3.2/owl.theme.css');
}
endif;
add_action('wp_print_styles','terx_enqueue_core_styles',100);

/* Enqueue Javascript ~~> */
if(!function_exists('terx_enqueue_scripts')):
function terx_enqueue_scripts(){
	if(is_admin() && !is_404()) return;
	if(is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
	if(TERX_JQUERY_VERSION){
		wp_deregister_script('jquery');
		wp_register_script('jquery',TERX_CDN_URL . 'jquery/' . TERX_JQUERY_VERSION . '/jquery.min.js');
	}
	wp_enqueue_script('jquery');
	wp_enqueue_script('terx_popper_js',TERX_CDN_URL . 'popper.js/' . TERX_POPPER_VERSION . '/umd/popper.min.js',array('jquery'),false,true);
	wp_enqueue_script('terx_bootstrap_js',TERX_CDN_URL . 'twitter-bootstrap/' . TERX_BOOTSTRAP_VERSION . '/js/bootstrap.min.js',array('jquery'),false,true);
	if(TERX_ACTIVATE_RETINA_JS) wp_enqueue_script('terx_retina_js',TERX_CDN_URL . 'retina.js/2.1.3/retina.min.js',array(),false,true);
	if(TERX_ACTIVATE_SLIDER) wp_enqueue_script('terx_slider_js',TERX_CDN_URL . 'owl-carousel/1.3.2/owl.carousel.min.js',array('jquery'),false,true);
	if(TERX_ACTIVATE_SKROLLR) wp_enqueue_script('terx_skrollr_js',TERX_CDN_URL . 'skrollr/0.6.29/skrollr.min.js',array('jquery'),false,true);
	if(TERX_ACTIVATE_WAYPOINTS){
		wp_enqueue_script('terx_waypoints',TERX_CDN_URL . 'waypoints/4.0.1/jquery.waypoints.js',array('jquery'),false,true);
		wp_enqueue_script('terx_waypoints_sticky',TERX_CDN_URL . 'waypoints/4.0.1/shortcuts/sticky.min.js',array('jquery'),false,true);
	}
	wp_enqueue_script('terx_scripts',TERX_JS . 'scripts.js',array('jquery'),false,true);
}
endif;
add_action('wp_print_scripts','terx_enqueue_scripts',100);


/* Enqueue Styles ~~> */
if(!function_exists('terx_enqueue_styles')):
function terx_enqueue_styles(){
	if(is_admin() && !is_404()) return;	
	wp_enqueue_style('terx_styles',TERRA . 'style.css',array('terx_bootstrap'));
}
endif;
add_action('wp_print_styles','terx_enqueue_styles',101);

/* Excerpt Length ~~> */
if(!function_exists('terx_excerpt_length')):
function terx_excerpt_length($length){
	return TERX_EXCERPT_LEN;
}
endif;
add_filter('excerpt_length','terx_excerpt_length');

/* Excerpt More ~~> */
if(!function_exists('terx_excerpt_more')):
function terx_excerpt_more($output){
	if(has_excerpt() && ! is_attachment()) $output .= terx_continue_reading_link();
	return $output;
}
endif;
add_filter('get_the_excerpt','terx_excerpt_more');

/* Excerpt More Auto ~~> */
if(!function_exists('terx_excerpt_more_auto')):
function terx_excerpt_more_auto($more){
	return ' &hellip;' . terx_continue_reading_link();
}
endif;
add_filter('excerpt_more','terx_excerpt_more_auto');

/* Favicons ~~> */
if(!function_exists('terx_favicons')): 
function terx_favicons(){
	if(TERX_ACTIVATE_FAVICONS) require('favicon.php');
	else echo '<link rel="shortcut icon" href="' . TERX_GRAPHICS . 'favicon-32x32.png">';
}
endif;
add_action('terx_head','terx_favicons');

/* Global Site Tag/Analytics ~~> */
if(!function_exists('terx_global_site_tag')): 
function terx_global_site_tag(){
	if(!TERX_GOOGLE_ANALYTICS_UA_NO) return;
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo TERX_GOOGLE_ANALYTICS_UA_NO ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo TERX_GOOGLE_ANALYTICS_UA_NO ?>');
	  <?php if(TERX_GOOGLE_ADWORDS_CONV_ID) echo "gtag('config','" . TERX_GOOGLE_ADWORDS_CONV_ID . "');"; ?>
	</script>
	<?php
}
endif;

/* Google Tag Manager Head ~~> */
if(!function_exists('terx_gtm_head')): 
function terx_gtm_head(){
	if(!TERX_GTM_CONTAINER_ID) return;
	?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','<?php echo TERX_GTM_CONTAINER_ID ?>');</script>
	<!-- End Google Tag Manager -->
	<?php
}
endif;

/* Google Tag Manager Head ~~> */
if(!function_exists('terx_gtm_body')): 
function terx_gtm_body(){
	if(!TERX_GTM_CONTAINER_ID) return;
	?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo TERX_GTM_CONTAINER_ID ?>"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
}
endif;

/* Gravity Forms Button Class ~~> */
if(!function_exists('terx_gravity_forms_button_class')):
function terx_gravity_forms_button_class(){
	if(!TERX_GF_BUTTON_CLASS) return;
	echo '<script>jQuery(".gform_wrapper .button").addClass("' . TERX_GF_BUTTON_CLASS . '");</script>';
}
endif;
add_action('terx_footer','terx_gravity_forms_button_class');

/* Img Responsive Class ~~> */
if(!function_exists('terx_img_responsive')): 
function terx_img_responsive(){
	if(!TERX_BS_IMG_RESPONSIVE) return;
	echo '<script>jQuery("' . TERX_BS_IMG_RESPONSIVE . '").addClass("img-fluid");</script>';
}
endif;
add_action('terx_footer','terx_img_responsive');

/* Limit Image Uploads ~~> */
if(!function_exists('terx_limit_image_uploads')):
function terx_limit_image_uploads($file){
	$error_message = 'KB is to large. Please reduce the file size of your image to ' . TERX_MAX_IMAGE_SIZE_KB . 'KB or less. Hosting space is limited and uploading large images will slow down your page loads. Use a tool such as https://www.photoresizer.com/ to help you to resize your images. Target size: Width 1024px, file size 100KB-200KB';
	$size_in_kb = $file['size'] / 1024;
	if(preg_match('/image/',$file['type'])) if($size_in_kb > TERX_MAX_IMAGE_SIZE_KB) $file['error'] = round($size_in_kb,2) . $error_message;
	return $file;	
}
endif;
add_filter('wp_handle_upload_prefilter','terx_limit_image_uploads');

/* Login Logo Title ~~> */
if(!function_exists('terx_login_logo_title')):
function terx_login_logo_title(){
	return get_bloginfo('site');
}
endif;
add_filter('login_headertitle','terx_login_logo_title');

/* Login Logo URL ~~> */
if(!function_exists('terx_login_logo_url')):
function terx_login_logo_url(){
	return get_bloginfo('url');
}
endif;
add_filter('login_headerurl','terx_login_logo_url');

/* Login Styles ~~> */
if(!function_exists('terx_login_styles')):
function terx_login_styles(){
	wp_enqueue_style('terx_login_css',TERX_CSS . 'login.css');
	//Inline Option to save a CSS file load:
	//echo '<style type="text/css">body.login div#login h1 a{background-image:url('. TERX_GRAPHICS .'logo.png); width:154px; height:44px!important; background-size:auto}</style>';
}
endif;
add_action('login_enqueue_scripts','terx_login_styles');

/* Modals Render ~~> */  
if(!function_exists('terx_modals_render')):
function terx_modals_render(){
	global $terx_modals;
	if(!$terx_modals) return;
	foreach($terx_modals as $modal) echo $modal;
}
endif;
add_action('terx_footer','terx_modals_render');

/* Page Nav Filter ~~> */
if(!function_exists('terx_page_nav_filter')):
function terx_page_nav_filter($menu){
	$replace = array('<div class="menu">','</div>','<ul>','</ul>');
	$menu = str_replace($replace,'',$menu); 
	return $menu;
}
endif;
add_filter('wp_page_menu','terx_page_nav_filter',10);

/* Fix password protect page when using security firewall ~~> */
if(!function_exists('terx_password_form')):
function terx_password_form(){
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$login_url = basename(wp_login_url());
	$form = '<form action="' . esc_url(site_url($login_url . '?action=postpass','login_post')) . '" method="post">
	<p>To view this protected post, enter the password below:</p>
	<label for="' . $label . '">Password:</label>&nbsp;<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />&nbsp;<input type="submit" name="Submit" value="Enter">
	</form>
	';
	return $form;
}
endif;
add_filter('the_password_form','terx_password_form');

/* Prepend Attachment ~~> */
if(!function_exists('terx_prepend_attachment')):
function terx_prepend_attachment($p){ return '<p class="attachment">' . wp_get_attachment_link(0,'full',false) . '</p>'; }
endif;
add_filter('prepend_attachment','terx_prepend_attachment');

/* Register Sidebars ~~> */
if(!function_exists('terx_register_sidebars')):
function terx_register_sidebars(){
	$sidebars = explode(',',TERX_SIDEBARS);
	$i = 1;
	foreach($sidebars as $sidebar){
		register_sidebar(array('name'=> $sidebar,'id' => 'sidebar-' . $i,'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">','after_widget' => '</div></div>','before_title' => '<h3>','after_title' => '</h3>'));
		$i++;
	}
}
endif;
add_action('widgets_init','terx_register_sidebars');

/* Remove script tag ~~> */
function terx_remove_script_tag($input){
    $input = str_replace("type='text/javascript'",'',$input);
    $input = str_replace('type="text/javascript"','',$input);
    return $input;
}
add_filter('script_loader_tag','terx_remove_script_tag');

/* Site Map Add Post Types ~~> */
if(!function_exists('terx_site_map_add_post_types')):
function terx_site_map_add_post_types(){	
	$post_types = get_post_types(array('public' => true,'_builtin' => false));
	foreach($post_types as $post_type){
		$post_type_object = get_post_type_object($post_type);
		echo '<h3>' . $post_type_object->label . '</h3>';
		echo '<ul>';
		wp_list_pages('post_type=' . $post_type . '&depth=0&title_li=');
		echo '</ul>';
	}
}
endif;
add_action('terx_site_map_extra_post_types','terx_site_map_add_post_types');

/* Site Moved Notice ~~> */
if(!function_exists('terx_site_moved_notice')):
function terx_site_moved_notice(){
    echo '<div class="error"><p><strong>Site Moved: ' . get_bloginfo('url') .' has moved to a new location, new IP address and or a new web server. Any edits made to posts here will not be reflected in the current/live website.</strong></p></div>';
}
endif;
if(TERX_ACTIVATE_SITE_MOVED) add_action('admin_notices','terx_site_moved_notice');

/* Site Moved Redirect ~~> */
if(!function_exists('terx_site_moved_redirect')):
function terx_site_moved_redirect(){
	global $post;
	if($post->ID == TERX_ACTIVATE_SITE_MOVED) return;
	$redirect_url = get_permalink(TERX_ACTIVATE_SITE_MOVED);
	wp_redirect($redirect_url,301);
	exit;
}
endif;
if(TERX_ACTIVATE_SITE_MOVED) add_action('terx_redirect','terx_site_moved_redirect',10,1);

/* SMTP Mailer ~~> */
if(!function_exists('terx_smtp_phpmailer_init')):
function terx_smtp_phpmailer_init($phpmailer){
	$phpmailer->isSMTP();
	$phpmailer->Host = TERX_SMTP_HOST;
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = TERX_SMTP_PORT;
	$phpmailer->Username = TERX_SMTP_USERNAME;
	$phpmailer->Password = TERX_SMTP_PASSWORD;
	$phpmailer->SMTPSecure = TERX_SMTP_ENCRYPTION; // Choose SSL or TLS, if necessary for your server
	$phpmailer->From = TERX_SMTP_USERNAME;
	$phpmailer->Sender = TERX_SMTP_USERNAME;
	$phpmailer->FromName = TERX_SMTP_FROM_NAME;
}
endif;
if(TERX_ACTIVATE_SMTP) add_action('phpmailer_init','terx_smtp_phpmailer_init');

/* SMTP Test ~~> */
function terx_test_email($to = 'adam@hyperspatial.com'){
	global $phpmailer;
	if(!is_object($phpmailer) || !is_a($phpmailer,'PHPMailer')){
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer(true);
	}
	$subject = 'Terra SMTP Test - ' . $to;
	$message = 'This is a test email from Terra, Yehaaa';
	$phpmailer->SMTPDebug = true;
	ob_start();
	$result = wp_mail($to,$subject,$message,array('Content-Type: text/html; charset=UTF-8'));
	$smtp_debug = ob_get_clean();
	?>
	<div class="alert alert-warning">
		<h4>SMTP Test</h4>
		<p><?php echo 'Result:' ?></p>
		<pre><?php var_dump($result) ?></pre>
		<p><?php echo 'PHPMailer Debug:' ?></p>
		<pre><?php var_dump($phpmailer) ?></pre>
		<p><?php echo 'SMTP Debug:' ?></p>
		<pre><?php echo $smtp_debug ?></pre>
	</div>
	<?php
	unset($phpmailer);
}

/* Filters for continuous nav system, all action calls in template-tags.php >~~~~~~~~> */

/* Filter Next Post Sort ~~> */
if(!function_exists('terx_filter_next_post_sort')):
function terx_filter_next_post_sort($sort){
	$sort = "ORDER BY p.post_title ASC LIMIT 1";
	return $sort;
}
endif;

/* Filter Next Post Where ~~> */
if(!function_exists('terx_filter_next_post_where')):
function terx_filter_next_post_where($where){
	global $post,$wpdb;
	return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '" . $post->post_type . "' AND p.post_status = 'publish'",$post->post_title);
}
endif;

/* Filter Previous Post Sort ~~> */
if(!function_exists('terx_filter_previous_post_sort')):
function terx_filter_previous_post_sort($sort){
	$sort = "ORDER BY p.post_title DESC LIMIT 1";
	return $sort;
}
endif;

/* Filter Previous Post Where ~~> */
if(!function_exists('terx_filter_previous_post_where')):
function terx_filter_previous_post_where($where){
	global $post,$wpdb;
	return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '" . $post->post_type . "' AND p.post_status = 'publish'",$post->post_title);
}
endif;
/* <~~~~~~~~< END Filters for continuous nav system */
?>