<?php do_action('ter_redirect') ?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<title><?php ter_title() ?></title>
<meta charset="<?php bloginfo('charset') ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
<?php if(is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply') ?>
<?php wp_head() ?>
<?php do_action('ter_head') ?>
</head>
<body <?php body_class() ?>>
<div id="page-wrap"><!-- Closes in footer -->
	<div id="page">
		<?php //See 'terra/includes/template-tags.php' for nav options
		ter_nav('slide','header','navbar-default navbar-static-top header-navbar');
		get_template_part('template-parts/header/site','branding');
		ter_nav('standard','primary','navbar-default navbar-static-top',1);		
		?>