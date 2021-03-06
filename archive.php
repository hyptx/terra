<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php terx_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TERX_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php
				/* 
				//Uncomment for Alphabetical nav, add 'alphabetical' argument to terx_nav_single() in single.php
				global $query_string; query_posts($query_string . '&orderby=post_title&order=ASC');
				*/
				?>
				<?php if (have_posts()): ?>
				<header class="page-header">
					<h1 class="page-title">
					<?php
					if(is_day()) printf(__('Daily Archives: %s','terra'),'<span>' . get_the_date() . '</span>');
					elseif(is_month()) printf(__('Monthly Archives: %s','terra'),'<span>' . get_the_date('F Y') . '</span>');
					elseif(is_year()) printf(__('Yearly Archives: %s','terra'),'<span>' . get_the_date('Y') . '</span>');
					else single_cat_title();
					?>
					</h1>
				</header><!-- /.page-header -->
				<?php while(have_posts()) : the_post() ?>
				<?php get_template_part('template-parts/post/content',get_post_format()) ?>
				<?php endwhile ?>
				<?php terx_nav_archive() ?>
				<?php else: ?>
				<?php get_template_part('template-parts/post/content','not-found') ?>
				<?php endif ?>
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php terx_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>