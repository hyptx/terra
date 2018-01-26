<?php /* ~~~~~~~~~~~ Static front page template. To activate simply rename the file to front-page.php ~~~~~~~~~~~*/ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
				<?php get_template_part('template-parts/page/content','home-static') ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>