		<?php terx_branding() ?>
		<?php terx_cta_sidebar(2000,500) ?>
		<footer id="colophon">
			<?php get_template_part('template-parts/footer/colophon','top') ?>
			<?php get_template_part('template-parts/footer/colophon','nav') ?>
			<?php get_template_part('template-parts/footer/site','info') ?>
		</footer>
		<?php //terx_nav('standard','footer','navbar-default navbar-static-bottom') //Uncomment to add footer nav ?>	
		<?php terx_back_to_top(1000,500) ?>	
	</div><!-- /#page -->
</div><!-- /#page-wrap - Opens in header -->
<?php do_action('terx_footer') ?>
<?php wp_footer() ?>
</body>
</html>