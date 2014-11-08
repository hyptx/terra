<?php /* ~~~~~~~~~~~ Shortcodes ~~~~~~~~~~~ */

function ter_row($atts,$content = null){ return '<div class="row">' . do_shortcode($content) . '</div>'; }
function ter_one_third($atts,$content = null){ return '<div class="col-sm-4"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_one_half($atts,$content = null){ return '<div class="col-sm-6"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_two_thirds($atts,$content = null){ return '<div class="col-sm-8"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_tsc_grid($atts,$content = null){ return '<div class="col-sm-' . $atts['col'] . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_button($atts,$content = null){ return print_ter_button($atts,$content); }
function ter_button_cta($atts,$content = null){ return print_ter_button($atts,$content,true); }
function print_ter_button($atts,$content = null,$cta = false){
	if($cta){
		$class = 'cta btn';
		$caret = '<b class="cta-caret"></b>';
	}
	else $class = 'btn';
	if($atts['target']) $target = ' target="' . $atts['target'] . '"';
	if($atts['class']) $class .= ' ' . $atts['class'];
	else $class .= ' btn-ter';
	return '<a href="' . $atts['href'] . '"' . $target . ' class="' . $class . '">' . do_shortcode($content) . $caret . '</a>';
}

//Shortcodes
add_shortcode('row','ter_row');
add_shortcode('one-third','ter_one_third');
add_shortcode('one-half','ter_one_half');
add_shortcode('two-thirds','ter_two_thirds');
add_shortcode('grid','ter_tsc_grid');
add_shortcode('button','ter_button');
add_shortcode('button-cta','ter_button_cta');

function ter_shortcode_content_filter($content){
    global $ter_child_shortcodes_for_filter;	
	$shortcode_array = array('row','one-third','one-half','two-thirds','grid');
	if($ter_child_shortcodes_for_filter) $shortcode_array = array_merge($shortcode_array,$ter_child_shortcodes_for_filter);
    $block = join('|',$shortcode_array);
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
}
add_filter('the_content','ter_shortcode_content_filter');
?>