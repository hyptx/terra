<?php /* ~~~~~~~~~~~ Template Tags ~~~~~~~~~~~ */

/* Back to Top */
if(!function_exists('ter_back_to_top')):
function ter_back_to_top($offset = 1000, $duration = 500){
	if(!TER_ACTIVATE_BACK_TO_TOP) return;
	?>
	<a href="#" class="back-to-top rounded-6 text-center"><b class="back-to-top-caret"></b><br>TOP</a>
	<script type="text/javascript">
	jQuery(document).ready(function(){	
		var offset = <?php echo $offset ?>;
		var duration = <?php echo $duration ?>;
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() > offset) jQuery('.back-to-top').fadeIn(duration);
			else jQuery('.back-to-top').fadeOut(duration);
		});				
		jQuery('.back-to-top').click(function(event){
			event.preventDefault();
			jQuery('html,body').animate({scrollTop: 0},duration);
			return false;
		})
	});
	</script>
	<?php
}
endif;

/* Branding */
if(!function_exists('ter_branding')):
function ter_branding(){
	if(!TER_ACTIVATE_BRANDING) return;
	$ter_branding = new TerBranding();
	?>
	<div id="ter-branding-quotes" class="text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12"><?php $ter_branding->print_logo_quotes_with_message() ?></div>
			</div>
		</div>
	</div>        
    <div id="ter-branding-logos" class="text-center ov-hidden">
		<?php $ter_branding->print_logos() ?>		
	</div>	
	<?php
}
endif;

/* Breadcrumbs */
if(!function_exists('ter_breadcrumbs')):
function ter_breadcrumbs($separator = '>',$before = false,$after = false,$hide_if_no_parent = true){
    global $post;
	if($hide_if_no_parent && !$post->post_parent) return;
	$ancestors = get_post_ancestors($post->ID);
	echo '<ul class="ter-breadcrumbs">';
	if($before) echo '<li class="breadcrumb-before">' . $before . '</li><li class="breadcrumb-separator">' . $separator . '</li>';
	foreach(array_reverse($ancestors) as $ancestor){
		echo '<li class="breadcrumb-parent"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
		echo '<li class="breadcrumb-separator">' . $separator . '</li>';
	}		
	echo '<li class="breadcrumb-current"><span>' . get_the_title() . '</span></li>';   
	if($after) echo '<li class="breadcrumb-after">' . $after . '</li>';
    echo '</ul>';
}
endif;

/* Comment Callback
*  For use as the comment temlate/callback for comments.php */
if(!function_exists('ter_com_callback')): 
function ter_com_callback($comment,$args,$depth){
	$GLOBALS['comment'] = $comment; 
    $comment_id = get_comment_ID() ?>
	<?php if($depth == 1) echo '<hr/>' ?>
    <li <?php comment_class() ?> id="li-comment-<?php comment_ID() ?>">
    	<div id="comment-<?php comment_ID() ?>" class="comment">
        	<div class="comment-heading">
            	<?php if($comment->comment_approved == '0') : ?>
            	<em><?php _e('Your comment is awaiting moderation.') ?></em><br />
            	<?php endif ?>
            	<span class="comment-meta commentmetadata"><em><?php echo get_avatar($comment,$size='16',$default='<path_to_url>') ?><?php comment_author_link() ?> - <?php comment_date('F jS, Y') ?> at <?php comment_time() ?></em><span class="comment-links">- <?php edit_comment_link(__('Edit'),'  ','') ?><?php if(current_user_can('edit_pages', $comment->comment_post_ID)): $url = clean_url(wp_nonce_url("/wp-admin/comment.php?action=deletecomment&p=$comment->comment_post_ID&c=$comment->comment_ID","delete-comment_$comment->comment_ID")) ?> | <a href="<?php echo $url ?>" class="delete:the-comment-list:comment-$comment->comment_ID delete" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</a> | <?php endif ?><?php comment_reply_link(array_merge($args, array('depth' => $depth))) ?></span></span>
        	</div>
        	<div class="comment-content"><?php comment_text() ?></div>
    	</div>
	</li>
	<?php
}
endif;

/* CTA Sidebar */
if(!function_exists('ter_cta_sidebar')):
function ter_cta_sidebar($delay = 2000,$animation_speed = 500){
	global $wp_registered_sidebars,$ter_cookie;
	foreach($wp_registered_sidebars as $sidebar) if($sidebar['name'] == 'CTA Sidebar') $render_sidebar = true;
	if(!$render_sidebar) return;
	$cookie = $ter_cookie->get_cookie('cta');
	if($cookie[0]) return;
	?>
	<div id="cta-sidebar" class="none text-center pad sticky"><span class="glyphicon glyphicon-remove-circle" onclick="terHideCTASidebar();"></span><?php dynamic_sidebar('CTA Sidebar') ?></div>	
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#cta-sidebar').delay(<?php echo $delay?>).show(<?php echo $animation_speed ?>);
		jQuery('#colophon').waypoint(function(direction){
			jQuery('#cta-sidebar').toggleClass('sticky');},{offset:function(){ return jQuery.waypoints('viewportHeight') - jQuery(this).outerHeight(); }
		});		
	});
	function terHideCTASidebar(){
		jQuery('#cta-sidebar').hide(<?php echo $animation_speed ?>);
		terSetCookie('ter_cookie_cta','hide,0',90);
	}
	</script>
	<?php
}
endif;

/* Continue Reading Link */
if(!function_exists('ter_continue_reading_link')):
function ter_continue_reading_link(){
	return ' <a href="'. esc_url(get_permalink()) . '">' . __( '<span class="meta-nav">Read More</span>','terra') . '</a>';
}
endif;

/* Get Sidebar
*  Sidebar Switching Routine
*  Arg 1 = Left or Right
*  Arg 2 = Sidebar template to load, ex: 'blog' will load sidebar-blog.php
 */
if(!function_exists('ter_get_sidebar')): 
function ter_get_sidebar($side = false, $template = false){
	if(TER_SECONDARY == 'none') return;
	if($side == TER_SECONDARY && $template){ get_sidebar($template); return; }
	if($side == TER_SECONDARY) get_sidebar();
}
endif;

/* Header Home Link
*  For use as the home link in the header */
if(!function_exists('ter_header_home_link')): 
function ter_header_home_link(){?>
	<?php if(TER_HEADER_HOME_LINK == 'logo'): ?>
	<div id="site-logo"><a id="logo" href="<?php echo home_url() ?>/"><img class="img-responsive inline-block" src="<?php echo TER_LOGO ?>" alt="<?php bloginfo('name') ?>" title="Return to Home Page"></a></div>
    <?php elseif(TER_HEADER_HOME_LINK == 'title'): ?>
    <h2 id="site-title"><a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo esc_attr(get_bloginfo('name','display')) ?>" rel="home"><?php bloginfo('name') ?></a></h2>
	<?php elseif(TER_HEADER_HOME_LINK == 'title-desc'): ?>
    <h2 id="site-title"><a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo esc_attr(get_bloginfo('name','display')) ?>" rel="home"><?php bloginfo('name') ?></a></h2>
    <h3 id="site-description"><?php bloginfo('description') ?></h3>
	<?php else: return ?>
    <?php endif;
}
endif;

/* Modal Save
*  Bootstrap Modal System */
if(!function_exists('ter_modal_save')):
function ter_modal_save($atts,$content = null){
	global $ter_modals;
	if(!$atts['id']){
		$ter_modals[] = '<div class="alert alert-warning">Please provide an id for this modal.</div>';
		return;
	}
	if($atts['title']) $modal_title = '<h4 class="modal-title" id="' . $atts['id'] . '-label' . '">' . $atts['title'] . '</h4>';
	if($atts['close_btn']) $close_btn = '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>';
	ob_start();
	?>	 
	<div class="modal fade" id="<?php echo $atts['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $atts['id'] . '-label' ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<?php echo $modal_title ?>
				</div>
				<div class="modal-body"><?php echo do_shortcode($content)?></div>
				<?php echo $close_btn ?>
			</div>
		</div>
	</div>
	<?php
	$ter_modals[] = ob_get_contents();
	ob_end_clean();
}
endif;

/* Modal Render Trigger
*  Bootstrap Modal System */
if(!function_exists('ter_modal_render_trigger')):
function ter_modal_render_trigger($atts,$content = null){
	if(!$atts['id']) return '<div class="alert alert-warning">Please provide an id for this modal trigger. It should match the id for modal itself.</div>';
	return '<a href="#" data-toggle="modal" data-target="#' . $atts['id'] . '" class="' . $atts['class'] . '">' . do_shortcode($content) . '</a>';
}
endif;

/* Nav Bar
*  The theme nav system, uses wp menus with fallback to wp_list_pages
*  Argument1 = Type, use 'slide' for slide out navbar, 'slide-dual' for dual nav
*  Argument2 = Menu slug, use csl for dual
*  Argument3 = Bootstrap nav class
*  Argument4 = Pass true to display all standard pages */
if(!function_exists('ter_nav')):
function ter_nav($type = 'standard',$location = 'primary',$nav_class = 'navbar-default',$fallback = false){
	if($type == 'slide') ter_navbar_slide($location,$nav_class,$fallback);
	elseif($type == 'slide-dual') ter_navbar_slide_dual($location,$nav_class,$fallback);
	else ter_navbar($location,$nav_class,$fallback);
}
endif;

/* Standard Nav Bar */
if(!function_exists('ter_navbar')):
function ter_navbar($location,$nav_class,$fallback){
	if(!has_nav_menu($location) && $fallback == false) return;
	?>
	<nav id="<?php echo $location ?>-nav" class="ter-navbar navbar <?php echo $nav_class ?>">
			<div class="container">
            	<div class="navbar-header">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#<?php echo $location ?>-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
				<div id="<?php echo $location ?>-collapse" class="navbar-collapse collapse" role="navigation">
					<ul id="<?php echo $location ?>-nav-ul" class="nav navbar-nav">
						<?php wp_nav_menu(array('fallback_cb' => 'ter_navbar_fallback','theme_location' => $location,'container' => false,'items_wrap' => '%3$s','walker' => new TerWalkerNavMenu())) ?>
					</ul>
				</div>
		</div>
	</nav>
    <?php
}
endif;

/* Slide Nav Bar */
if(!function_exists('ter_navbar_slide')):
function ter_navbar_slide($location,$nav_class,$fallback){
	if(!has_nav_menu($location) && $fallback == false) return;
	?>	
	<nav id="<?php echo $location ?>-nav" class="ter-navbar navbar slide-collapse-nav <?php echo $nav_class ?>">
		<div class="container">		
			<div id="<?php echo $location ?>-slide-collapse" class="slide-collapse" role="navigation">
				<ul id="<?php echo $location ?>-nav-ul" class="nav navbar-nav slide-collapse-ul">
				    <li class="hidden-xs"><a href="/" id="desktop-logo" class="inline-block"><img src="<?php echo TER_LOGO ?>" class="logo" alt="Home"></a></li>
					<?php wp_nav_menu(array('fallback_cb' => 'ter_navbar_fallback','theme_location' => $location,'container' => false,'items_wrap' => '%3$s','walker' => new TerWalkerNavMenu())) ?>
				</ul>
			</div>			
			<div class="navbar-header text-center relative visible-xs">
				<button type="button" class="navbar-toggle absolute" onclick="terNavAnimate('#<?php echo $location ?>-slide-collapse','<?php echo $location ?>'); return false;"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<!-- For Image Button, comment out button above -->
				<!--<a href="#" class="navbar-toggle-image absolute" onclick="terNavAnimate('#<?php echo $location ?>-slide-collapse','<?php echo $location ?>'); return false;"><img src="<?php echo TER_GRAPHICS ?>btn-menu.png" class="menu-button" alt="Open Menu"></a>-->
				<a href="/" id="mobile-logo" class="inline-block"><img src="<?php echo TER_LOGO ?>" class="logo" alt="Home"></a>            
			</div>					
		</div>
	</nav>
    <?php
}
endif;

/* Nav Bar Fallback */
if(!function_exists('ter_navbar_fallback')): function ter_navbar_fallback(){	wp_list_pages(array('title_li' => '','walker' => new TerWalkerPage())); } endif;

/* Page Nav
*  Prev and next page links */
if(!function_exists('ter_nav_archive')):
function ter_nav_archive(){
	global $wp_query;	
	if($wp_query->max_num_pages > 1): ?>
        <nav id="nav-archive" class="page-nav">
			<span class="ter-nav page-previous alignleft"><?php previous_posts_link(__('<img src="' . TER_GRAPHICS . 'arrow-previous.png" alt="Previous Page">Previous Page','terra')) ?></span>
            <span class="ter-nav page-next alignright"><?php next_posts_link(__('Next Page<img src="' . TER_GRAPHICS . 'arrow-next.png" alt="Next Page">','terra')) ?></span>
        </nav>
    <?php endif;
}
endif;

/* Post Nav
*  Prev and next posts links
*  Argument 1: Pass 'alphabetical' for alpha sort, pass true for continuous chronological nav
*  Argument 2: Pass a message to be displayed above the link
 */
if(!function_exists('ter_nav_single')):
function ter_nav_single($continuous = false,$message = false){
	if($continuous == 'alphabetical'){ ter_nav_single_continuous($message,'alphabetical'); return; }
	elseif($continuous){ ter_nav_single_continuous($message); return; }
	?>
	<nav id="nav-single" class="page-nav">		
		<span class="ter-nav post-next alignright"><span class="meta-nav"><?php echo $message ?></span><?php previous_post_link('%link<img src="' . TER_GRAPHICS . 'arrow-next.png" alt="Next Post">') ?></span>
		<span class="ter-nav post-previous alignleft"><span class="meta-nav"><?php echo $message ?></span><?php next_post_link('<img src="' . TER_GRAPHICS . 'arrow-previous.png" alt="Previous Post">%link') ?></span>
	</nav>
    <?php
}
endif;

/* Post Nav - Continuous
*  Prev and next posts links */
if(!function_exists('ter_nav_single_continuous')):
function ter_nav_single_continuous($message = false,$aphabetical = false){
	global $post;
	if($message) $message .= '<br>';
	if($aphabetical){		
		$order_by = 'post_title';
		$first_order = 'ASC';
		$last_order = 'DESC';
		add_filter('get_next_post_sort','ter_filter_next_post_sort');
		add_filter('get_next_post_where','ter_filter_next_post_where');
		add_filter('get_previous_post_sort','ter_filter_previous_post_sort');
		add_filter('get_previous_post_where','ter_filter_previous_post_where');
		$next_post = get_next_post();
		$previous_post = get_previous_post();
	}
	else{
		$order_by = 'post_date';
		$first_order = 'DESC';
		$last_order = 'ASC';
		$next_post = get_previous_post();
		$previous_post = get_next_post();
	}
	?>
	<nav id="nav-single" class="page-nav">
		<?php if($next_post): ?>
		<span class="ter-nav post-next alignright text-right"><span class="meta-nav"><?php echo $message ?></span><span class="text-right block"><a href="<?php echo get_permalink($next_post->ID) ?>"><?php echo $next_post->post_title ?></a><img src="<?php echo TER_GRAPHICS ?>arrow-next.png" alt="Next Post"></span></span>
		<?php else: ?>
		<?php $first_post = get_posts(array('posts_per_page' => 1,'orderby' => $order_by,'order' => $first_order,'post_type' => $post->post_type,'post_status' => 'publish')) ?>
		<span class="ter-nav post-next alignright text-right"><span class="meta-nav"><?php echo $message ?></span><span class="text-right block"><a href="<?php echo get_permalink($first_post[0]->ID) ?>"><?php echo $first_post[0]->post_title ?></a><img src="<?php echo TER_GRAPHICS ?>arrow-next.png" alt="Next Post"></span></span>
		<?php endif ?>
		<?php if($previous_post): ?>
		<span class="ter-nav post-previous alignleft"><span class="meta-nav"><?php echo $message ?></span><img src="<?php echo TER_GRAPHICS ?>arrow-previous.png" alt="Previous Post"><a href="<?php echo get_permalink($previous_post->ID) ?>"><?php echo $previous_post->post_title ?></a></span>
		<?php else: ?>
		<?php $last_post = get_posts(array('posts_per_page' => 1,'orderby' => $order_by,'order' => $last_order,'post_type' => $post->post_type,'post_status' => 'publish')) ?>
		<span class="ter-nav post-previous alignleft"><span class="meta-nav"><?php echo $message ?></span><img src="<?php echo TER_GRAPHICS ?>arrow-previous.png" alt="Previous Post"><a href="<?php echo get_permalink($last_post[0]->ID) ?>"><?php echo $last_post[0]->post_title ?></a></span>
		<?php endif ?>
	</nav>
    <?php
}
endif;

/* Tags
*  Print tag links */
if(!function_exists('ter_tags')):
function ter_tags(){
	global $post;
	if(get_post_type() != 'post') return;
    $tags_list = get_the_tag_list('',__(', ','terra'));
	if(!$tags_list) return ?>
    <span class="tag-links"><?php printf(__('<span class="%1$s">Tags:</span> %2$s','terra'),'entry-utility-prep entry-utility-prep-tag-links',$tags_list) ?></span><br />
    <?php
}
endif;

/* Template Comment */
if(!function_exists('ter_template_comment')):
function ter_template_comment($file){
	if(!current_user_can('administrator')) return;
	$template_loc = explode('themes',$file);
	echo '<!-- Template: ' . $template_loc[1] . ' -->';
}
endif;

/* Title Format */
if(!function_exists('ter_title')):
function ter_title(){
	if(TER_TITLE_FORMAT_DEFAULT == true) wp_title('');
	else{ wp_title('|',true,'right'); bloginfo('name'); }
}
endif;
?>