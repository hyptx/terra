<?php /* Template Name: Sidebar Page with Comments */ ?>
<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php terx_get_sidebar('left','page') ?>
		<div id="primary" class="<?php echo TERX_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
				<?php comments_template('',true) ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php terx_get_sidebar('right','page') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>