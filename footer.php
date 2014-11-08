		<?php ter_branding() ?>
		<?php ter_cta_sidebar(2000,500) ?>
		<footer id="colophon" role="contentinfo" class="home-footer">
			<div id="footer-top" class="text-center ov-hidden">
				<p class="text-center pad">This template is set up with hardcoded footer links.<br>Please edit footer.php and modify the links, or uncomment the wp_nav_menu funtion to use the WP Menu System.<br>Name your footer menus Footer 1, Footer 2, etc.</p>
			</div><!-- /#footer-top -->
			<div class="container">	
				<div id="footer-nav-row-1" class="row footer-nav-row">
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 1</a><?php //wp_nav_menu(array('menu' => 'Footer 1')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 2</a><?php //wp_nav_menu(array('menu' => 'Footer 2')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 3</a><?php //wp_nav_menu(array('menu' => 'Footer 3')) ?></div>
				</div><!-- /.row -->
				<div id="footer-nav-row-2" class="row footer-nav-row">
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 4</a><?php //wp_nav_menu(array('menu' => 'Footer 4')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 5</a><?php //wp_nav_menu(array('menu' => 'Footer 5')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 6</a><?php //wp_nav_menu(array('menu' => 'Footer 6')) ?></div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12"><?php require('copyright.php') ?></div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer>
		<?php ter_nav('standard','footer','navbar-default navbar-static-bottom') ?>
		<?php ter_back_to_top(1000,500) ?>
	</div><!-- /#page -->
</div><!-- /#page-wrap - Opens in header -->
<?php wp_footer() ?>
</body>
</html>