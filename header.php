<?php do_action('ter_redirect') ?><!DOCTYPE html>
<!--[if IE 6]><html id="ie6" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html id="ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes() ?>><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes() ?>>
<!--<![endif]-->
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
<!--[if lt IE 9]>
	<script src="<?php echo TER_JS ?>html5.js" type="text/javascript"></script>
    <script src="<?php echo TER_JS ?>respond.min.js" type="text/javascript"></script>
<![endif]-->
</head>
<body <?php body_class() ?>>
<div id="page-wrap"><!-- Closes in footer -->
	<div id="page">
		<?php ter_nav('slide','header','navbar-default navbar-static-top header-navbar') //See 'terra/includes/template-tags.php' for nav options ?>
		<header id="branding" role="banner" class="relative">
			<div class="container">
				<div class="row">
					<div id="branding-left" class="col-sm-7"><?php ter_header_home_link() ?></div>
					<div id="branding-right" class="col-sm-5 text-right"><?php get_search_form() ?></div>
				</div>
			</div>
		</header>
		<?php ter_nav('standard','primary','navbar-default navbar-static-top',1) ?>