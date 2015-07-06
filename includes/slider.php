<?php /* ~~~~~~~~~~~ Owl Slider ~~~~~~~~~~~ */

//http://www.owlgraphic.com/owlcarousel/
//https://github.com/OwlFonk/OwlCarousel

//Owl Slider
function owl_slider($shortcode = false,$options = false){
	if($shortcode) ob_start();
	$terra_owl_slider = new TerraOwlSlider($options);
	if($shortcode){
		$main_function_output = ob_get_contents();
		ob_end_clean();
		return $main_function_output;
	}
}

//Run Shortcode - [owl_slider]
function run_owl_slider_shortcode($atts){
	$options = shortcode_atts(array('tag' => false), $atts);
    return owl_slider(true,$options);
}
add_shortcode('owl_slider','run_owl_slider_shortcode');

/* ~~~~~~~~~~~ TerraOwlSlider ~~~~~~~~~~~ */

class TerraOwlSlider{
	private $_options,$_slides;
	private static $instance_id;
	public function __construct($options){
		self::$instance_id += 1;
		$options['tag'] = str_replace(' ','-',$options['tag']);
		$this->_options = $options;
		$this->get_slides();
	}
	
	private function get_slides(){
		if($this->_options['tag']) $tax_query = array(array('taxonomy' => 'slide_tags','field' => 'slug','terms' => $this->_options['tag']));
		$args = array('post_type' => 'terra_slides','showposts' => -1,'order' => 'DESC','tax_query' => $tax_query);
		$this->_slides = get_posts($args);
		
		if(!$this->_slides && $this->_options['tag']) echo '<div class="alert alert-warning">No slides found under ' . $this->_options['tag'] . '</div>';
		elseif(!$this->_slides) echo '<div class="alert alert-warning">No slides found</div>';
		$this->add_meta();
	}
	
	private function add_meta(){
		foreach($this->_slides as $slide){
			$slide->_terra_slide_url = get_post_meta($slide->ID,'_terra_slide_url',1);
			$slide->_terra_slide_img_url = wp_get_attachment_url(get_post_thumbnail_id($slide->ID));
			if(!$slide->_terra_slide_img_url) $slide->_terra_slide_img_url = get_post_meta($slide->ID,'_terra_slide_src', true);
		}
		$this->print_slider();
	}
	
	private function print_slider(){
		if($this->_options['tag']) $slider_div_id = 'owl-slider-' . self::$instance_id . '-' . $this->_options['tag'];
		else $slider_div_id = 'owl-slider-' . self::$instance_id;
		echo '<div id="' . $slider_div_id . '">';
		foreach($this->_slides as $slide){
			if($slide->_terra_slide_url) $this->wrap_slide($slide);
			else $this->print_slide($slide);			
		}
		echo '</div><!-- /#owl-slider -->';
		$this->print_slider_js($slider_div_id);
	}
	
	private function wrap_slide($slide){
		echo '<div><a href="' . $slide->_terra_slide_url . '"><img src="' . $slide->_terra_slide_img_url . '" alt="' . $slide->post_title . '"></a>' . $this->print_slide_html($slide) . '</div>';
	}
	
	private function print_slide($slide){
		echo '<div><img src="' . $slide->_terra_slide_img_url . '" alt="' . $slide->post_title . '">' . $this->print_slide_html($slide) . '</div>';
	}

	private function print_slide_html($slide){ if($slide->post_content) return '<div class="owl-html">' . $slide->post_content . '</div>'; }
	
	private function print_slider_js($slider_div_id){?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("#<?php echo $slider_div_id ?>").owlCarousel({
				navigation : true,
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem:true,
				autoPlay:true
			});
		});
		</script>
		<?php
	}
}

/* ~~~~~~~~~~~ owl_slider_widget ~~~~~~~~~~~ */

class owl_slider_widget extends WP_Widget{
    public function owl_slider_widget(){ parent::WP_Widget(false, $name = 'Owl Slider Widget'); }

    public function widget($args, $instance){
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);		
		$tag = $instance['tag'];
		?>
		<?php echo $before_widget; ?>
        <?php if($title) echo $before_title . $title . $after_title ?>
		
		<?php $terra_owl_slider = new TerraOwlSlider(array('tag' => $tag)) ?>
		
        <?php echo $after_widget; ?>
        <?php
    }

    public function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['tag'] = strip_tags($new_instance['tag']);
        return $instance;
    }

    public function form($instance){
        $title = esc_attr($instance['title']);
		$tag = esc_attr($instance['tag']);
        ?>
		<p>
        	<label for="<?php echo $this->get_field_id('title') ?>">Title:</label>
        	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo $title ?>" />
        </p>
		<p>
        	<label for="<?php echo $this->get_field_id('tag') ?>">Tag Name:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('tag') ?>" name="<?php echo $this->get_field_name('tag') ?>" type="text" value="<?php echo $tag ?>" />
        	
        </p>
        <?php
    }
}//END owl_slider_widget
add_action('widgets_init', create_function('', 'return register_widget("owl_slider_widget");'));

/* ~~~~~~~~~~~ TerraSlides ~~~~~~~~~~~ */

$terra_slides = new TerraSlides();

class TerraSlides{
	public function __construct(){
		add_action('init',array(&$this,'init'));
		add_filter('post_updated_messages',array(&$this,'updated_messages'));
		add_action('add_meta_boxes',array(&$this,'add_meta_boxes'));
		add_action('save_post',array(&$this,'save_post'));
	}
	public function init(){
		$labels = array(
			'name' => _x('Slides','post type general name','terra'),
			'singular_name' => _x('Slide','post type singular name','terra'),
			'add_new' => _x('Add New','slide','terra'),
			'add_new_item' => __('Add New Slide','terra'),
			'edit_item' => __('Edit Slide','terra'),
			'new_item' => __('New Slide','terra'),
			'all_items' => __('All Slides','terra'),
			'view_item' => __('View Slide','terra'),
			'search_items' => __('Search Slides','terra'),
			'not_found' =>  __('No slides found','terra'),
			'not_found_in_trash' => __('No slides found in Trash','terra'),
			'parent_item_colon' => '',
			'menu_name' => __('Slides','terra')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => null,
			'menu_icon' => TER_GRAPHICS . 'icon-slider.png',
			'supports' => array('title','editor','thumbnail'/*,'author','excerpt','custom-fields'*/)
		);
		register_post_type('terra_slides',$args);
		
		//Taxonomy
		$labels = array(
			'name'              => _x( 'Slide Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'Slide Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Slide Tags' ),
			'all_items'         => __( 'All Slide Tags' ),
			'parent_item'       => __( 'Parent Slide Tag' ),
			'parent_item_colon' => __( 'Parent Slide Tag:' ),
			'edit_item'         => __( 'Edit Slide Tag' ),
			'update_item'       => __( 'Update Slide Tag' ),
			'add_new_item'      => __( 'Add New Slide Tag' ),
			'new_item_name'     => __( 'New Slide Tag Name' ),
			'menu_name'         => __( 'Slide Tags' ),
		);
		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true
		);
		register_taxonomy('slide_tags','terra_slides',$args);
	}
	
	/* Updated Messages */
	public function updated_messages($messages){
		global $post, $post_ID;
		$messages['slides'] = array(
			0 => '',
			1 => sprintf( __('Slide updated. <a href="%s">View slide</a>'), esc_url( get_permalink($post_ID) ) ),
			2 => __('Custom field updated.'),
			3 => __('Custom field deleted.'),
			4 => __('Slide updated.'),
			5 => isset($_GET['revision']) ? sprintf( __('Slide restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Slide published. <a href="%s">View slide</a>'), esc_url( get_permalink($post_ID) ) ),
			7 => __('Slide saved.'),
			8 => sprintf( __('Slide submitted. <a target="_blank" href="%s">Preview slide</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( __('Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'),
			  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Slide draft updated. <a target="_blank" href="%s">Preview post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		return $messages;
	}
	 
	public function add_meta_boxes(){
		add_meta_box(
			'terra_slide_extras',
			'Slide Extras',
			array(&$this,'meta_box_1'),
			'terra_slides',
			'advanced',
			'high'
		);
    }

	/* Meta box content */
    public function meta_box_1($post){
		wp_nonce_field(plugin_basename(__FILE__),'terra_noncename');
		$value = get_post_meta($post->ID,'_terra_slide_url', true);
		$slide_src_value = get_post_meta($post->ID,'_terra_slide_src', true);
		echo '<p><label for="slide_url"><strong>Hyperlink for slide:</strong></label><br>';
		echo '<input type="text" id="slide_url" name="terra_slide_url" value="' . esc_attr( $value ) . '" style="width:60%" /><br>';
		echo '&nbsp;<em>Format: http://website.com</em></p>';
		
		echo '<p><label for="slide_url"><strong>Slide source url:</strong></label><br>';
		echo '<input type="text" id="slide_src_url" name="_terra_slide_src" value="' . esc_attr( $slide_src_value ) . '" style="width:60%" /><br>';
		echo '&nbsp;<em>Use if your image is not hosted on the site. Format: http://website.com/myimage.jpg</em></p>';
    }

	/* Save Postdata */
	public function save_post($post_id){
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if($_POST['post_type'] != 'terra_slides') return $post_id;
		if(!wp_verify_nonce($_POST['terra_noncename'],plugin_basename(__FILE__))) return $post_id;
		if(!current_user_can('edit_post',$post_id)) return $post_id;
		update_post_meta($post_id,'_terra_slide_url',$_POST['terra_slide_url']);
		update_post_meta($post_id,'_terra_slide_src',$_POST['_terra_slide_src']);
	}
}//END TerraSlides
?>