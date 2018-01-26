<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php if(have_posts()): ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_tag_title() ?></h1>
				</header><!-- /.page-header -->
				<?php while(have_posts()): the_post() ?>
				<?php get_template_part('template-parts/post/content',get_post_format()) ?>
				<?php endwhile ?>
				<?php ter_nav_archive() ?>
				<?php else : ?>
				<?php get_template_part('template-parts/post/content','not-found') ?>
				<?php endif ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>