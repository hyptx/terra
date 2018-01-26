<?php /* Template Name: Sidebar Page */ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','page') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','page') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>