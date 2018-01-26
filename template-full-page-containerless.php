<?php /* Template Name: Full Page Containerless */ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main">
	<div id="main-row">
		<div id="primary">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>