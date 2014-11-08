<?php ter_template_comment(__FILE__) ?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
	<header class="page-header">
		<h1 class="page-title"><?php the_title() ?></h1>
	</header><!-- .page-header -->
	<div class="entry-content">
		<?php the_content() ?>
		<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:','terra') . '</span>','after' => '</div>')) ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta hidden">
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID() ?> -->