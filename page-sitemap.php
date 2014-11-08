<?php /* Template Name: Sitemap */ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('content','page') ?>
				<h3><?php _e('Pages','terra') ?></h3>
				<ul><?php wp_list_pages('depth=0&title_li=') ?></ul>
				<h3><?php _e('Posts','terra') ?></h3>
				<ul><?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?></ul>
				<!-- Add a custom post type to your sitemap
				<h3><?php //_e('CUSTOMPOSTNAME','terra') ?></h3>
				<ul><?php //wp_list_pages('post_type=CUSTOMPOSTTYPE&depth=0&title_li=') ?></ul>
				-->
				<h3><?php _e('Archives','terra') ?></h3>
				<ul><?php wp_get_archives('type=monthly&limit=12') ?></ul>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>