<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php if(have_posts()): the_post() ?>
				<header class="page-header">
					<h1 class="page-title author"><?php printf(__('Author Archives: %s','terra'),'<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>') ?></h1>
				</header><!-- /.page-header -->
				<?php rewind_posts() ?>
				<?php if(get_the_author_meta('description')): ?>
				<div id="author-info">
					<div id="author-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),48) ?></div>
					<div id="author-description">
						<h2><?php printf(__('About %s','terra'),get_the_author()) ?></h2>
						<p><?php the_author_meta('description') ?></p>
					</div><!-- /#author-description --> 
				</div><!-- /#entry-author-info -->
				<?php endif ?>
				<?php while(have_posts()): the_post() ?>
				<?php get_template_part('content',get_post_format()) ?>
				<?php endwhile ?>
				<?php ter_nav_archive() ?>
				<?php else: ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e('Nothing Found','terra') ?></h1>
					</header><!-- /.entry-header -->
					<div class="entry-content">
						<p><?php _e('Sorry, no results were found in the requested archive. Searching may help you find a related post.','terra') ?></p>
						<?php get_search_form() ?>
					</div><!-- /.entry-content --> 
				</article><!-- /#post-0 -->
				<?php endif ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>