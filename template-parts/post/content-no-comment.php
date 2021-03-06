<?php terx_template_comment(__FILE__) ?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__('Permalink to %s','terra'),the_title_attribute('echo=0')) ?>" rel="bookmark"><?php the_title() ?></a></h1>
        <?php if('post' == get_post_type()): ?>
        <div class="entry-meta">
            <em>Posted on <?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></em> <?php edit_post_link(__('Edit', 'terra'),' - <span class="edit-link">','</span>') ?>
        </div>
        <?php endif ?>
    </header><!-- .entry-header -->
    <?php if(!is_single() && TERX_EXCERPT): ?>
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
		<?php terx_tags() ?>
    </footer><!-- #entry-meta --> 
</article><!-- #post-<?php the_ID() ?> -->