<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php while(have_posts()) : the_post() ?>
				<?php get_template_part('content',get_post_format()) ?>
				<?php ter_nav_single() //Pass true for continuous, 'aphabetical' for alpha sort ?>
				<?php comments_template('',true) ?>
				<?php endwhile ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>
