<?php ter_template_comment(__FILE__) ?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
	<header class="page-header">
		<?php the_title('<h1 class="page-title">','</h1>') ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content() ?>
		<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:','terra') . '</span>','after' => '</div>')) ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID() ?> -->