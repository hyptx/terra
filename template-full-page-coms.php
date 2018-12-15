<?php /* Template Name: Full Page with Comments */ ?>
<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TERX_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
				<?php comments_template('',true) ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>