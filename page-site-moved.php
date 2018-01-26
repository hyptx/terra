<?php /* Template Name: Site Moved Page */ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('template-parts/page/content','page') ?>
				<div class="alert alert-warning">
					<p class="text-large"><strong><?php bloginfo('url')?> has moved to a new location, new IP address and or a new web server.</strong></p>
					<p class="margin-top">If you can see this page you will need to clear your <a href="http://www.wikihow.com/Clear-Your-Browser%27s-Cache" target="_blank">browser cache</a> and or <a href="local DNS cache" target="_blank">local DNS cache</a>. This page is being displayed because your browser is pointing the domain to the wrong IP address.</p>
					<hr>
					<p class="margin-top">If all else fails and you are still seeing this page, the DNS may be cached at the local network level or at the ISP level. Please contact the network administrator or your ISP.</p>
				</div>
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>