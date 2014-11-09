<?php /* ~~~~~~~~~~~ SSL ~~~~~~~~~~~ */

function ter_ssl_meta_box(){
    global $post;
	$disabled_post_types = array('attachment','revision','nav_menu_item'/*,'post'*/);
	if(in_array(get_post_type($post),$disabled_post_types )) return;	
	if(TER_ACTIVATE_SSL == 'https') $checkbox_text = 'Not Secured';
	else $checkbox_text = 'Secured';	
	echo '<div class="misc-pub-section misc-pub-section-last">';
	wp_nonce_field(plugin_basename(__FILE__),'ter_ssl_nonce');
	$ter_ssl_meta = get_post_meta($post->ID,'_ter_ssl_meta',true);
	if($ter_ssl_meta) $checked = ' checked="checked"';
	echo '<label><input type="checkbox" name="ter_ssl_meta" id="ter-ssl-meta" value="checked"' . $checked . '> ' . $checkbox_text;
	echo '</label> | <a href="/wp-admin/admin.php?page=ter_help">Remove Security Help</a>';
	echo '</div>';
}
if(TER_ACTIVATE_SSL) add_action('post_submitbox_misc_actions','ter_ssl_meta_box');

function ter_ssl_save_meta_box($post_id){
    if(!isset($_POST['post_type'])) return $post_id;
	$disabled_post_types = array('attachment','revision','nav_menu_item');
	if(in_array($_POST['post_type'],$disabled_post_types)) return $post_id;
    if(!wp_verify_nonce($_POST['ter_ssl_nonce'],plugin_basename(__FILE__))) return $post_id;
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if(!current_user_can('edit_post',$post_id)) return $post_id;
	if($_POST['ter_ssl_meta'] == 'checked') update_post_meta( $post_id, '_ter_ssl_meta', $_POST['ter_ssl_meta'] );
	else delete_post_meta( $post_id, '_ter_ssl_meta');
}
if(TER_ACTIVATE_SSL) add_action('save_post','ter_ssl_save_meta_box');

function ter_ssl_redirect($secure_front_page){
	if($secure_front_page) ter_ssl_secure_front_page();
	global $post;
	$ter_ssl_meta = get_post_meta($post->ID,'_ter_ssl_meta',true);
	if(!$ter_ssl_meta) return;
	if(TER_ACTIVATE_SSL == 'https' && $_SERVER['HTTPS'] == 'on'){ wp_redirect('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],301);	exit; }
	elseif(TER_ACTIVATE_SSL == 'http' && $_SERVER['HTTPS'] != 'on'){ wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],301); exit; }
}
if(TER_ACTIVATE_SSL) add_action('ter_redirect','ter_ssl_redirect',1,1);

function ter_ssl_secure_front_page(){
	if(is_front_page() && $_SERVER['HTTPS'] != 'on'){ wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],301); exit; }
}
?>