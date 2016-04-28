<?php /* ~~~~~~~~~~~ Shortcodes ~~~~~~~~~~~ */
/* Layout ~~> */
function ter_row($atts,$content = null){ return '<div class="row">' . do_shortcode($content) . '</div>'; }
function ter_one_third($atts,$content = null){ return '<div class="col-sm-4"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_one_half($atts,$content = null){ return '<div class="col-sm-6"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_two_thirds($atts,$content = null){ return '<div class="col-sm-8"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
function ter_tsc_grid($atts,$content = null){ return '<div class="col-sm-' . $atts['col'] . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }

/* Buttons ~~> */
function ter_button($atts,$content = null){ return ter_print_button($atts,$content); }
function ter_button_cta($atts,$content = null){ return ter_print_button($atts,$content,true); }
function ter_print_button($atts,$content = null,$cta = false){
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

/* Modal ~~> */
function ter_modal($atts,$content = null){ ter_modal_save($atts,$content,true); }
function ter_modal_trigger($atts,$content = null){ return ter_modal_render_trigger($atts,$content); }

/* Embed PDF ~~> */
function ter_embed_pdf($atts,$content = null){
	if(!$atts['height']) $atts['height'] = '500'; 
	return '
	<div class="ter-embed margin-bottom">
		<object data="' . $atts['url'] . '" type="application/pdf" width="100%" height="' . $atts['height'] . '">
			<p>It appears your Web browser is not configured to display PDF files. <a href="' . $atts['url'] . '">Download the PDF file instead</a></p>
		</object>
	</div>
	';
}

/* Collapse ~~> */
function ter_btn_collapse($atts,$content = null){
	$class = 'btn';
	if($atts['class']) $class .= ' ' . $atts['class'];
	else $class .= ' btn-ter';
	return '<a href="#' . $atts['id'] . '" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="' . $atts['id'] . '" class="' . $class . '">' . do_shortcode($content) . '</a>';
}

function ter_content_collapse($atts,$content = null){
	return '<div id="' . $atts['id'] . '" class="collapse">' . do_shortcode($content) . '</div>';
}

/* Accordion ~~> */
function ter_accordion($atts,$content = null){
	global $accordion_id;
	$accordion_id = sanitize_title_with_dashes($atts['id']);
	return '<div class="panel-group margin-top margin-bottom accordion" id="' . $accordion_id . '" role="tablist" aria-multiselectable="true">' . do_shortcode($content) . '</div>';
}
function ter_accordion_item($atts,$content = null){
	global $accordion_id;
	if($atts['state'] == 'open'){
		$panel_class = 'panel-collapse collapse in';
		$aria = 'true';
	} 
	else{
		$panel_class = 'panel-collapse collapse';
		$aria = 'false';
	}
	$id = sanitize_title_with_dashes($atts['id']);
	return '<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="' . $id . '-heading">
	    	<h4 class="panel-title"><a class="block" role="button" data-toggle="collapse" data-parent="#' . $accordion_id . '" href="#' . $id . '" aria-expanded="' . $aria . '" aria-controls="' . $id . '">
	          ' . $atts['title'] . '</a></h4>
	    </div>
	    <div id="' . $id . '" class="' . $panel_class . '" role="tabpanel" aria-labelledby="' . $id . '-heading">
	      <div class="panel-body">' . do_shortcode($content) . '</div>
	    </div>
	</div>';
}


/* Shortcodes ~~> */
add_shortcode('row','ter_row');
add_shortcode('one-third','ter_one_third');
add_shortcode('one-half','ter_one_half');
add_shortcode('two-thirds','ter_two_thirds');
add_shortcode('grid','ter_tsc_grid');
add_shortcode('button','ter_button');
add_shortcode('button-cta','ter_button_cta');
add_shortcode('modal','ter_modal');
add_shortcode('modal-trigger','ter_modal_trigger');
add_shortcode('embed-pdf','ter_embed_pdf');
add_shortcode('button-collapse','ter_btn_collapse');
add_shortcode('content-collapse','ter_content_collapse');
add_shortcode('accordion','ter_accordion');
add_shortcode('accordion-item','ter_accordion_item');

/* Shortcode Content Filter ~~> */
function ter_shortcode_content_filter($content){
    global $ter_child_shortcodes_for_filter;	
	$shortcode_array = array('row','one-third','one-half','two-thirds','grid','modal','modal-trigger','button-collapse','content-collapse','accordion','accordion-item');
	if($ter_child_shortcodes_for_filter) $shortcode_array = array_merge($shortcode_array,$ter_child_shortcodes_for_filter);
    $block = join('|',$shortcode_array);
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
}
add_filter('the_content','ter_shortcode_content_filter');
?>