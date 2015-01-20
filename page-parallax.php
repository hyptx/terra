<!DOCTYPE html>
<html class="no-skrollr">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>Classic parallax page</title>

	<style type="text/css">
	* {
		padding:0;
		margin:0;
	}

	html, body {
		height:100%;
	}

	.skrollr-desktop body {
		height:100% !important;
	}

	body {
		font-family:sans-serif;
	}

	p {
		margin:1em 0;
	}

	.parallax-image-wrapper {
		position:fixed;
		left:0;
		width:100%;
		overflow:hidden;
	}

	.parallax-image-wrapper-50 {
		height:50%;
		top:-50%;
	}

	.parallax-image-wrapper-100 {
		height:100%;
		top:-100%;
	}

	.parallax-image {
		display:none;
		position:absolute;
		bottom:0;
		left:0;
		width:100%;
		background-repeat:no-repeat;
		background-position:center;
		background-size:cover;
	}

	.parallax-image-50 {
		height:200%;
		top:-50%;
	}

	.parallax-image-100 {
		height:100%;
		top:0;
	}

	.parallax-image.skrollable-between {
		display:block;
	}

	.no-skrollr .parallax-image-wrapper {
		display:none !important;
	}

	#skrollr-body {
		height:100%;
		overflow:visible;
		position:relative;
	}

	.gap {
		background:transparent center no-repeat;
		background-size:cover;
	}

	.skrollr .gap {
		background:transparent !important;
	}

	.gap-50 {
		height:50%;
	}

	.gap-100 {
		height:100%;
	}

	.header, .content {
		background:#fff;
		padding:1em;

		-webkit-box-sizing:border-box;
		-moz-box-sizing:border-box;
		box-sizing:border-box;
	}

	.content-full {
		height:100%;
	}

	#done {
		/*height:100%;*/
	}
	</style>
	<?php wp_head()?>
</head>

<body>
	<!--
		We position the images fixed and therefore need to place them outside of #skrollr-body.
		We will then use data-anchor-target to display the correct image matching the current section (.gap element).
	-->

	<div
		class="parallax-image-wrapper parallax-image-wrapper-100"
		data-anchor-target="#dragons + .gap"
		data-bottom-top="transform:translate3d(0px, 200%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-100"
			style="background-image:url(http://placehold.it/2000x800)"
			data-anchor-target="#dragons + .gap"
			data-bottom-top="transform: translate3d(0px, -80%, 0px);"
			data-top-bottom="transform: translate3d(0px, 80%, 0px);"
		></div>
		<!--the +/-80% translation can be adjusted to control the speed difference of the image-->
	</div>

	<div
		class="parallax-image-wrapper parallax-image-wrapper-100"
		data-anchor-target="#bacons + .gap"
		data-bottom-top="transform:translate3d(0px, 200%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-100"
			style="background-image:url(http://placehold.it/2000x800)"
			data-anchor-target="#bacons + .gap"
			data-bottom-top="transform: translate3d(0px, -80%, 0px);"
			data-top-bottom="transform: translate3d(0px, 80%, 0px);"
		></div>
	</div>

	<div
		class="parallax-image-wrapper parallax-image-wrapper-50"
		data-anchor-target="#kittens + .gap"
		data-bottom-top="transform:translate3d(0px, 300%, 0px)"
		data-top-bottom="transform:translate3d(0px, 0%, 0px)">

		<div
			class="parallax-image parallax-image-50"
			style="background-image:url(http://placehold.it/2000x800)"
			data-anchor-target="#kittens + .gap"
			data-bottom-top="transform: translate3d(0px, -60%, 0px);"
			data-top-bottom="transform: translate3d(0px, 60%, 0px);"
		></div>
	</div>

	<div id="skrollr-body">
		<div class="header" id="dragons">
			<h3>Text Area 1 - Header</h3>
		</div>
		<div class="gap gap-100" style="background-image:url(http://placehold.it/2000x800)"></div>
		<div class="content" id="bacons">
		<h3>Text Area 2</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum. Curabitur ut magna sed felis bibendum commodo. Vestibulum semper condimentum tortor. Vivamus tellus velit, dapibus at, tincidunt ac, vestibulum quis, lectus. Nunc tempus nisi a lectus. Donec diam libero, convallis sed, commodo eu, rutrum ut, mauris.
			
			<p>Ut vulputate, ligula eu vehicula nonummy, augue dolor commodo sem, at eleifend justo lectus vitae odio. Curabitur sollicitudin, elit in lobortis varius, mauris neque cursus nulla, eget faucibus elit massa quis est. Nam purus. Curabitur convallis pretium dui. Quisque leo arcu, lobortis vitae, luctus non, bibendum nec, dolor. Cras pede. Aliquam erat volutpat. Sed erat dui, mollis vitae, malesuada a, tincidunt a, leo. Suspendisse ultrices, diam vel interdum laoreet, nulla dolor hendrerit diam, ac consequat eros mi eget quam. Cras ligula pede, molestie vitae, lobortis et, iaculis eget, neque.</p>
		</div>
		<div class="gap gap-100" style="background-image:url(http://placehold.it/2000x800)"></div>
		<div class="content" id="kittens">
			<h3>Text Area 3</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum. Curabitur ut magna sed felis bibendum commodo. Vestibulum semper condimentum tortor. Vivamus tellus velit, dapibus at, tincidunt ac, vestibulum quis, lectus. Nunc tempus nisi a lectus. Donec diam libero, convallis sed, commodo eu, rutrum ut, mauris.
			
			
		</div>
		<div class="gap gap-50" style="background-image:url(http://placehold.it/2000x800)"></div>
		<div class="content" id="done">
			<h3>Text Area 4</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum. Curabitur ut magna sed felis bibendum commodo. Vestibulum semper condimentum tortor. Vivamus tellus velit, dapibus at, tincidunt ac, vestibulum quis, lectus. Nunc tempus nisi a lectus. Donec diam libero, convallis sed, commodo eu, rutrum ut, mauris.
			
			
		</div>
	</div>

	
	<script type="text/javascript">
	skrollr.init({
		smoothScrolling: false,
		mobileDeceleration: 0.004
	});
	</script>
</body>

</html>
