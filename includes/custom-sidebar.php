<?php /* ~~~~~~~~~~~ Custom Sidebar ~~~~~~~~~~~ */

//Use this snippet in sidebar-page or a custom post type sidebar
/* 
<?php terx_template_comment(__FILE__) ?>
<?php $custom_sidebar_html = get_post_meta($post->ID,'terx_custom_sidebar_html',true) ?>
<aside id="secondary" class="<?php echo TERX_SECONDARY_CLASS ?> widget-area" role="complementary">
    <?php if($custom_sidebar_html): ?>
    <div class="widget">
        <?php echo apply_filters('the_content',$custom_sidebar_html) ?>
    </div>
    <?php dynamic_sidebar('sidebar-2') ?>
	<?php else: ?>
	<?php dynamic_sidebar('sidebar-2') ?>
    <?php endif ?>
</aside><!-- #secondary -->
*/

function terx_create_custom_sidebar_meta_box(){ new EXLCustomSidebarMetaBox(); }

if(is_admin()){
    add_action('load-post.php','terx_create_custom_sidebar_meta_box');
    add_action('load-post-new.php','terx_create_custom_sidebar_meta_box');
}

class EXLCustomSidebarMetaBox{
	private $_enabled_post_types = array('page');//Add more CPT's here
	public function __construct(){
		add_action('add_meta_boxes',array($this,'add_meta_box'));
		add_action('save_post',array($this,'save'));
	}

	public function add_meta_box($post_type){
       if(in_array($post_type,$this->_enabled_post_types)) add_meta_box('terx_page_meta_box',__('Custom Sidebar HTML','terra'),array($this,'render_meta_box_content'),$post_type,'advanced','high');
    }

	public function save($post_id){
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if(!in_array($_POST['post_type'],$this->_enabled_post_types)) return $post_id;
		if(!wp_verify_nonce($_POST['terx_custom_sidebar'],plugin_basename(__FILE__))) return $post_id;
		if(!current_user_can('edit_post',$post_id)) return $post_id;
		update_post_meta($post_id,'terx_custom_sidebar_html',$_POST['terx_custom_sidebar_html']);
	}

	public function render_meta_box_content($post){
		wp_nonce_field(plugin_basename(__FILE__),'terx_custom_sidebar');
		echo '<label>Sidebar HTML:</label><br>';
		echo '<textarea style="width:90%" name="terx_custom_sidebar_html">' . esc_attr(get_post_meta($post->ID,'terx_custom_sidebar_html',1)) . '</textarea>';
	}
}
?>