<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php terx_get_sidebar('left','page') ?>
		<div id="primary" class="<?php echo TERX_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php terx_breadcrumbs() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php terx_get_sidebar('right','page') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>