<?php /* Template Name: Home */ ?>
<?php get_header() ?>
<?php DDDtemplate_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo EXL_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','home') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>