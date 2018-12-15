<?php do_action('terx_redirect') ?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<?php terx_gtm_head() ?>
<title><?php terx_title() ?></title>
<meta charset="<?php bloginfo('charset') ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head() ?>
<?php do_action('terx_head') ?>
<?php terx_global_site_tag() ?>
</head>
<body <?php body_class() ?>>
<?php terx_gtm_body() ?>
<div id="page-wrap"><!-- Closes in footer -->
	<div id="page">
		<?php //See 'terra/includes/template-tags.php' for nav options
		terx_nav('slide','header','navbar-expand-md navbar-light bg-light header-navbar');
		get_template_part('template-parts/header/site','branding');
		terx_nav('standard','primary','navbar-expand-md navbar-light bg-light',1);		
		?>