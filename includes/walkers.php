<?php /* ~~~~~~~~~~~ Walkers ~~~~~~~~~~~ */

/* EXLWalkerNavMenu
*  Use with wp_nav_menu */
class EXLWalkerNavMenu extends Walker_Nav_Menu{
	public function start_lvl(&$output,$depth){
		$indent = str_repeat("\t",$depth);
		if($depth < 1) $dropdown_menu = ' dropdown-menu';
		$output .= "\n$indent<ul class=\"sub-menu$dropdown_menu level-" . ($depth + 1) . "\">\n";
	}
	public function start_el(&$output,$item,$depth,$args){
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t",$depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'level-' . $depth . ' menu-item-' . $item->ID;
		if(in_array('current-menu-item',$classes)) $classes[] = 'active';
		if($args->has_children && (integer)$depth < 1) $classes[] = 'dropdown';
		$class_names = join(' ',apply_filters('nav_menu_css_class',array_filter($classes),$item,$args));
		$class_names = ' class="nav-item ' . esc_attr($class_names) . '"';
		$id = apply_filters('nav_menu_item_id','menu-item-' . $item->ID,$item,$args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$attributes  = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
		$attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) .'"' : '';
		$attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) .'"' : '';
		$attributes .= ($args->has_children && (integer)$depth < 1) ? ' class="nav-link dropdown-toggle"' : ' class="nav-link"';
		$item_output = $args->before;
		$dropdown_data = ($args->has_children && (integer)$depth < 1) ? ' data-toggle="dropdown" ' : ''; //Remove for caret dropdown
		$item_output .= '<a'. $attributes . $dropdown_data . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		//$item_output .= ($args->has_children && (integer)$depth < 1) ? '<b class="caret"></b>' : '';
		$item_output .= '</a>';
		//$item_output .= ($args->has_children && (integer)$depth < 1) ? '<b data-toggle="dropdown" class="caret" title="Open Menu"></b>' : ''; //Uncomment for caret dropdown
		$item_output .= $args->after;
		$output .= apply_filters('walker_nav_menu_start_el',$item_output,$item,$depth,$args);
	}
	function display_element($element,&$children_elements,$max_depth,$depth = 0,$args,&$output){
		if(!$element) return;
		$id_field = $this->db_fields['id'];
		if(is_array($args[0])) $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
		elseif(is_object($args[0]))	$args[0]->has_children = !empty($children_elements[$element->$id_field]); //** Add has_children value, only mod in method **
		$cb_args = array_merge(array(&$output,$element,$depth),$args);
		call_user_func_array(array(&$this,'start_el'),$cb_args);
		$id = $element->$id_field;
		if(($max_depth == 0 || $max_depth > $depth+1) && isset($children_elements[$id])){
			foreach($children_elements[$id] as $child){
				if(!isset($newlevel)){
					$newlevel = true;
					$cb_args = array_merge(array(&$output,$depth),$args);
					call_user_func_array(array(&$this,'start_lvl'),$cb_args);
				}
				$this->display_element($child,$children_elements,$max_depth,$depth + 1,$args,$output);
			}
			unset($children_elements[$id]);
		}
		if(isset($newlevel) && $newlevel){
			$cb_args = array_merge(array(&$output,$depth),$args);
			call_user_func_array(array(&$this,'end_lvl'),$cb_args);
		}
   		$cb_args = array_merge(array(&$output,$element,$depth),$args);
    	call_user_func_array(array(&$this,'end_el'),$cb_args);
	}
}

/* EXLWalkerPage
*  Fallback, use with wp_list_pages */
class EXLWalkerPage extends Walker_Page{
	function start_lvl(&$output,$depth){
		$indent = str_repeat("\t",$depth);
		if($depth < 1) $dropdown_menu = ' dropdown-menu';
		$output .= "\n$indent<ul class=\"sub-menu$dropdown_menu\">\n";
	}
	function start_el(&$output,$page,$depth,$args,$current_page){
		if($depth) $indent = str_repeat("\t", $depth);
		else $indent = '';
		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if(!empty($current_page)){
			$_current_page = get_page($current_page);
			_get_post_ancestors($_current_page);
			if(isset($_current_page->ancestors) && in_array($page->ID,(array)$_current_page->ancestors)) $css_class[] = 'current_page_ancestor';
			if($page->ID == $current_page) $css_class[] = 'current_page_item active';
			elseif($_current_page && $page->ID == $_current_page->post_parent) $css_class[] = 'current_page_parent';
		}
		elseif($page->ID == get_option('page_for_posts')) $css_class[] = 'current_page_parent';
		if($args['has_children'] && (integer)$depth < 1) $css_class[] = 'dropdown';
		$css_class = implode(' ',apply_filters('page_css_class',$css_class,$page,$depth,$args,$current_page));
		if($args['has_children'] && (integer)$depth < 1){
			$dropdown_data = ' data-toggle="dropdown" '; //Remove for caret dropdown
			$caret = '<b class="caret"></b>';
		}
		$output .= $indent . '<li class="nav-item ' . $css_class . '"><a href="' . get_permalink($page->ID) . '"' . $dropdown_data . ' class="nav-link">' . $link_before . apply_filters('the_title',$page->post_title,$page->ID ) . $link_after . $caret . '</a>';
		if(!empty($show_date)){
			if('modified' == $show_date) $time = $page->post_modified;
			else $time = $page->post_date;
			$output .= " " . mysql2date($date_format,$time);
		}
		//if($args['has_children'] && (integer)$depth < 1) $output .= $indent . '<b data-toggle="dropdown" class="caret" title="Open Menu"></b>'; //Uncomment for caret dropdown
	}
}
?>