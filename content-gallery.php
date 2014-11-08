<?php ter_template_comment(__FILE__) ?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__('Permalink to %s','terra'),the_title_attribute('echo=0')) ?>" rel="bookmark"><?php the_title() ?></a></h1>
        <?php if('post' == get_post_type()): ?>
        <div class="entry-meta">
            <em>Posted on <?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?> <?php edit_post_link(__('Edit', 'terra'),' - <span class="edit-link">','</span>') ?></em>
        </div>
        <?php endif ?>
    </header><!-- .entry-header -->
    
    <p class="alert alert-info"><strong>Gallery Post Format:</strong><br />This post format template is just a copy of the <em>content.php</em> file.<br />Please edit the <em>content-gallery.php</em> file to customize this template.</p>
    
    <?php if(is_search() || TER_EXCERPT): ?>
    <div class="entry-summary">
        <?php the_excerpt() ?>
    </div><!-- .entry-summary -->
    <?php else: ?>
    <div class="entry-content">
        <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>','terra')) ?>
        <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:','terra') . '</span>', 'after' => '</div>')) ?>
    </div><!-- .entry-content -->
    <?php endif ?>
    <footer class="entry-meta">
        <?php if(comments_open() && !is_single()): ?>
        <span class="comments-link"><?php comments_popup_link('<span class="leave-reply">' . __('Post a Comment', 'terra') . '</span>',__('<b>1</b> Comment','terra'),__('<b>%</b> Comments','terra')) ?>&nbsp;&nbsp;</span>
        <?php endif ?>
		<?php ter_tags() ?>
    </footer><!-- #entry-meta --> 
</article><!-- #post-<?php the_ID() ?> -->