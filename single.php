<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php terx_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TERX_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php while(have_posts()) : the_post() ?>
				<?php get_template_part('template-parts/post/content',get_post_format()) ?>
				<?php terx_nav_single() //Pass true for continuous, 'alphabetical' for alpha sort ?>
				<?php if(TERX_COMMENTS) comments_template('',true) ?>
				<?php endwhile ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php terx_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>
