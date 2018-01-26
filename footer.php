		<?php ter_branding() ?>
		<?php ter_cta_sidebar(2000,500) ?>
		<footer id="colophon">
			<?php get_template_part('template-parts/footer/colophon','top') ?>
			<?php get_template_part('template-parts/footer/colophon','nav') ?>
			<?php get_template_part('template-parts/footer/site','info') ?>
		</footer>
		<?php //ter_nav('standard','footer','navbar-default navbar-static-bottom') //Uncomment to add footer nav ?>	
		<?php ter_back_to_top(1000,500) ?>	
	</div><!-- /#page -->
</div><!-- /#page-wrap - Opens in header -->
<?php do_action('ter_footer') ?>
<?php wp_footer() ?>
</body>
</html>