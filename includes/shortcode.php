<?php /* ~~~~~~~~~~~ Shortcodes ~~~~~~~~~~~ */

/* Layout ~~> */
if(!function_exists('terx_row')):
	function terx_row($atts,$content = null){ return '<div class="row' . terx_sc_class($atts) . '">' . do_shortcode($content) . '</div>'; }
	add_shortcode('row','terx_row');
endif;

if(!function_exists('terx_one_third')):
	function terx_one_third($atts,$content = null){ return '<div class="col-sm-4' . terx_sc_class($atts) . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
	add_shortcode('one-third','terx_one_third');
endif;

if(!function_exists('terx_one_half')):
	function terx_one_half($atts,$content = null){ return '<div class="col-sm-6' . terx_sc_class($atts) . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
	add_shortcode('one-half','terx_one_half');
endif;

if(!function_exists('terx_two_thirds')):
	function terx_two_thirds($atts,$content = null){ return '<div class="col-sm-8' . terx_sc_class($atts) . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
	add_shortcode('two-thirds','terx_two_thirds');
endif;

if(!function_exists('terx_tsc_grid')):
	function terx_tsc_grid($atts,$content = null){ return '<div class="col-sm-' . $atts['col'] . terx_sc_class($atts) . '"><div class="tsc">' . do_shortcode($content) . '</div></div>'; }
	add_shortcode('grid','terx_tsc_grid');
endif;

/* Buttons ~~> */
if(!function_exists('terx_button')):
	function terx_button($atts,$content = null){ return terx_print_button($atts,$content); }
	add_shortcode('button','terx_button');
endif;

if(!function_exists('terx_button_cta')):
	function terx_button_cta($atts,$content = null){ return terx_print_button($atts,$content,true); }
	function terx_print_button($atts,$content = null,$cta = false){
		if($cta){
			$class = 'cta btn';
			$caret = '<b class="cta-caret"></b>';
		}
		else $class = 'btn';
		if($atts['target']) $target = ' target="' . $atts['target'] . '"';
		if($atts['class']) $class .= ' ' . $atts['class'];
		else $class .= ' btn-terx';
		return '<a href="' . $atts['href'] . '"' . $target . ' class="' . $class . '">' . do_shortcode($content) . $caret . '</a>';
	}
		add_shortcode('button-cta','terx_button_cta');
endif;

/* Modal ~~> */
function terx_modal($atts,$content = null){ terx_modal_save($atts,$content,true); }
function terx_modal_trigger($atts,$content = null){ return terx_modal_render_trigger($atts,$content); }
add_shortcode('modal-trigger','terx_modal_trigger');

/* Embed PDF ~~> */
if(!function_exists('terx_embed_pdf')):
	function terx_embed_pdf($atts,$content = null){
		if(!$atts['height']) $atts['height'] = '500'; 
		return '
		<div class="terx-embed margin-bottom">
			<object data="' . $atts['url'] . '" type="application/pdf" width="100%" height="' . $atts['height'] . '">
				<p>It appears your Web browser is not configured to display PDF files. <a href="' . $atts['url'] . '">Download the PDF file instead</a></p>
			</object>
		</div>
		';
	}
	add_shortcode('embed-pdf','terx_embed_pdf');
endif;

/* Collapse ~~> */
if(!function_exists('terx_btn_collapse')):
	function terx_btn_collapse($atts,$content = null){
		$class = 'btn';
		if($atts['class']) $class .= ' ' . $atts['class'];
		else $class .= ' btn-terx';
		return '<a href="#' . $atts['id'] . '" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="' . $atts['id'] . '" class="' . $class . '">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('button-collapse','terx_btn_collapse');
endif;

if(!function_exists('terx_content_collapse')):
	function terx_content_collapse($atts,$content = null){
		return '<div id="' . $atts['id'] . '" class="collapse">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('content-collapse','terx_content_collapse');
endif;

/* Accordion ~~> */
if(!function_exists('terx_accordion')):
	function terx_accordion($atts,$content = null){
		global $accordion_id;
		$accordion_id = sanitize_title_with_dashes($atts['id']);
		return '<div class="margin-top margin-bottom accordion' . terx_sc_class($atts) . '" id="' . $accordion_id . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('accordion','terx_accordion');
endif;

if(!function_exists('terx_accordion_item')):
	function terx_accordion_item($atts,$content = null){
		global $accordion_id;
		if($atts['state'] == 'open'){
			$panel_class = 'collapse show';
			$aria = 'true';
			$btn_class = 'btn btn-link';
		} 
		else{
			$panel_class = 'collapse';
			$aria = 'false';
			$btn_class = 'btn btn-link collapsed';
		}
		$id = sanitize_title_with_dashes($atts['id']);
		return '<div class="card">
			<div class="card-header" id="' . $id . '-header">
		    	<h5 class="mb-0"><button class="' . $btn_class . '" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="' . $aria . '" aria-controls="' . $id . '">
		          ' . $atts['title'] . '</button></h5>
		    </div>
		    <div id="' . $id . '" class="' . $panel_class . '" data-parent="#' . $accordion_id . '" aria-labelledby="' . $id . '-heading">
		      <div class="card-body">' . do_shortcode($content) . '</div>
		    </div>
		</div>';
	}
	add_shortcode('accordion-item','terx_accordion_item');
endif;

/* Icons ~~> */
if(!function_exists('terx_fa')):
	function terx_fa($atts,$content = null){
		return '<i class="fa' . (isset($atts['icon']) ? ' ' . $atts['icon'] : '') . '">' . do_shortcode($content) . '</i>';
	}
	add_shortcode('fa','terx_fa');
endif;

/* Shortcode Content Filter ~~> */
if(!function_exists('terx_shortcode_content_filter')):
	function terx_shortcode_content_filter($content){
	    global $terx_child_shortcodes_for_filter;	
		$shortcode_array = array('row','one-third','one-half','two-thirds','grid','modal','modal-trigger','button-collapse','content-collapse','accordion','accordion-item');
		if($terx_child_shortcodes_for_filter) $shortcode_array = array_merge($shortcode_array,$terx_child_shortcodes_for_filter);
	    $block = join('|',$shortcode_array);
	    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
		return $rep;
	}
	add_filter('the_content','terx_shortcode_content_filter');
endif;

//Extra Class Ternary Function
function terx_sc_class($atts){ return (isset($atts['class']) ? ' ' . $atts['class'] : ''); }
?>