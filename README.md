# The Terra Theme

This theme was built by a developer, for developers. Built for my self to be precise. I will be adding documentation here, stay tuned. Make sure to get [The Terra Jr Theme](https://github.com/hyptx/terra-jr) as well.

**I do not recommend editing Terra directly.** The Wordpress child theme system is just to useful. If you want to use the Terra Theme system to its fullest, install and activate [Terra Jr](https://github.com/hyptx/terra-jr). Keep the parent theme pristine and do all your customizing in the child.

The Terra Jr Theme has and added bonus of a custom post type factory class, amongst other features. Try to keep the versions of Parent and Child the same. They are meant to act as a team!

## Versions

* [Latest Terra Release](https://github.com/hyptx/terra/releases/latest)
* [Latest Terra Jr Release](https://github.com/hyptx/terra-jr/releases/latest)

Version numbers mirror Twitter Bootstrap's MAJOR.MINOR.PATCH schema. Terra's versioning includes a fourth, representing theme patches: MAJOR.MINOR.PATCH.THEMEPATCH

#### Theme Features

* HTML5
* Responsive
* Validates W3C
* SSL ready
* Twitter Bootstrap 3.3.0
* Most CSS and Javascript assets loaded from cdnjs.cloudflare.com
* Open sans font loaded from google fonts API, to match Wordpress admin bar
* jQuery 1.9.1
* Shortcode based quick layout system
* Shortcode Bootstrap buttons
* Logo branding custom post type with hover effect
* Side slide out header menu
* SSL switch system to force pages on a secure site to be http, and vice versa
* PHP based cookie system
* Gravity Forms style upgrades
* Owl Slider
* Apple touch icon support
* Parallax script, skrollr.js
* jQuery Waypoints, waypoints.js
* respond.js (IE8 support)
* html5.js (IE8 support)
* Max image size script to prevent huge uploads

The Terra Theme does not use the Wordpress theme options system to save options. I decided that hardcoding the theme options would save on database queries and overhead. All of the theme settings are at the top of the *functions.php* file, in the form of easily understandable constants.

#### Browser Support

* Chrome
* Firefox
* Safari
* IE8+

Two javascript files are loaded to support IE8, respond.js and html5.js. Respond.js does not parse CDN loaded files, so bootstrap.min.css is loaded locally.

## Installation

1. Get a copy of [Terra](https://github.com/hyptx/terra/releases/latest) and upload it to your themes directory
2. Get a copy of [Terra Jr](https://github.com/hyptx/terra-jr/releases/latest) and upload it to your themes directory
3. Activate Terra Jr
4. Rock and Roll


## Hacks

Remove IPhone phone formatting: ```<meta name="format-detection" content="telephone=no">```

## CloudFlare

If you want to use the theme with CloudFlare's flexible SSL, it's easy, and free. You will need to secure your Wordpress admin area so that the wp admin bar stays secure on the front end. Add the following two lines toward the top of your *wp-config.php* file. 

```php
define('FORCE_SSL_ADMIN',true);
if($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') $_SERVER['HTTPS'] = 'on';
```

* [CloudFlare SSL Info](https://support.cloudflare.com/hc/en-us/articles/200170416-What-do-the-SSL-options-Off-Flexible-SSL-Full-SSL-Full-SSL-Strict-mean-)
* [CloudFlare SSL Redirects](https://support.cloudflare.com/hc/en-us/articles/200170536-How-do-I-redirect-HTTPS-traffic-with-Flexible-SSL-and-Apache-)
* [Wordpress Codex Source](http://codex.wordpress.org/Administration_Over_SSL)

## Theme Config

The theme is configurable by modifying this set of constants. It is located in *functions.php*

<table>
	<tr>
		<th>System Constants</th>
		<th>Default Value</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>TER_ERROR_DISPLAY_ON</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Turn PHP error display on. For debugging use only.</td>
	</tr>
	<tr>
		<td>TER_CDN_URL</td>
		<td>//cdnjs.cloudflare.com/ajax/libs/</td>
		<td>URL</td>
		<td>Location of the CDN library. If you change this, check that the new package location is the same as cdnjs.com</td>
	</tr>
	<tr>
		<td>TER_JQUERY_VERSION</td>
		<td>1.9.1</td>
		<td>Value</td>
		<td>Which version of jQuery to load from the CDN. Pass false to load the Wordpress default jQuery verison.</td>
	</tr>
	<tr>
		<td>TER_BOOTSTRAP_VERSION</td>
		<td>3.3.0</td>
		<td>Value</td>
		<td>Which version of Bootstrap to load from the CDN.</td>
	</tr>
	<tr>
		<td>TER_BS_IMG_RESPONSIVE</td>
		<td>article img,.widget img</td>
		<td>jQuery target</td>
		<td>Applies the CSS Class img-responsive to dom elements</td>
	</tr>
	
	<tr>
		<td>TER_GOOGLE_FONT</td>
		<td>Open+Sans: 400,400italic,600,600italic</td>
		<td>Value</td>
		<td>Google Font API Family - Value after &quot;?family=&quot; in the URL. Pass false for default browser fonts.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th>Layout Constants</th>
		<th>Default Value</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>TER_LOGO</td>
		<td>terra/graphics/logo.png</td>
		<td>URL</td>
		<td>Location of logo image used in header and for the login page.</td>
	</tr>
	<tr>
		<td>TER_HEADER_HOME_LINK</td>
		<td>title</td>
		<td>Option</td>
		<td> Header home link options: logo, title, title-desc</td>
	</tr>
	<tr>
		<td>TER_FULL_WIDTH_CLASS</td>
		<td>col-sm-12</td>
		<td>CSS</td>
		<td>Bootstrap grid - Full width container class.</td>
	</tr>
	<tr>
		<td>TER_PRIMARY_CLASS</td>
		<td>col-sm-8</td>
		<td>CSS</td>
		<td>Bootstrap grid - Primary container class.</td>
	</tr>
	<tr>
		<td>TER_SECONDARY_CLASS</td>
		<td>col-sm-4</td>
		<td>CSS</td>
		<td>Bootstrap grid - Secondary container class.</td>
	</tr>
	<tr>
		<td>TER_SECONDARY</td>
		<td>right</td>
		<td>Option</td>
		<td> Sidebar Layout options: left, right, none</td>
	</tr>
	<tr>
		<td>TER_SIDEBARS</td>
		<td>Blog Sidebar,Page Sidebar</td>
		<td>CSL</td>
		<td>Comma separated list of sidebars.  Add ',CTA Sidebar' to activate the CTA Sidebar feature.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th>WP Related Constants</th>
		<th>Default Value</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>TER_ADD_HOME_LINK</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Adds a link home to wp_list_pages. Useful if static home page and you want a link on sitemap</td>
	</tr>
	<tr>
		<td>TER_ADMIN_BAR</td>
		<td>editor</td>
		<td>Option</td>
		<td> Show adminbar when  user  is logged in: all, admin, editor, none</td>
	</tr>
	<tr>
		<td>TER_ADMIN_BAR_LOGIN</td>
		<td>false</td>
		<td>Boolean</td>
		<td> Show adminbar when logged out .</td>
	</tr>
	<tr>
		<td>TER_EXCERPT</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Show the Wordpress excerpt on archive pages not the content.</td>
	</tr>
	<tr>
		<td>TER_EXCERPT_LEN</td>
		<td>40</td>
		<td>Integer</td>
		<td>Number of words in the Wordpress excerpt</td>
	</tr>
	<tr>
		<td>TER_TITLE_FORMAT_DEFAULT</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Change pretty page title to wp_title(''). Set to true for Wordpress SEO plugin support</td>
	</tr>
	<tr>
		<td>TER_MAX_IMAGE_SIZE_KB</td>
		<td>1024</td>
		<td>Integer</td>
		<td>Wordpress media library max upload size in KB.</td>
	</tr>
	<tr>
		<td>TER_WP_POST_FORMATS</td>
		<td>false</td>
		<td>CSL</td>
		<td>Turn on support in theme, templates include: 'gallery,image,video'</td>
	</tr>
	<tr>
		<td>TER_GF_BUTTON_CLASS</td>
		<td>btn btn-info</td>
		<td>CSS Class</td>
		<td>CSS Class to be applied to Gravity Form buttons</td>
	</tr>
	<tr>
		<td>TER_COPYRIGHT</td>
		<td>'&copy; ' . date('Y ') . get_bloginfo('name')</td>
		<td>Value</td>
		<td>Copyright string for footer</td>
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th>Feature Constants</th>
		<th>Default Value</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>TER_ACTIVATE_BACK_TO_TOP</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Back to top button feature.</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_BRANDING</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Logo/Branding with hover text  feature</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_FAVICONS</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Favicon feature - Use markup and images from: http://realfavicongenerator.net/</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_SITE_MOVED</td>
		<td>false</td>
		<td>PostID</td>
		<td>Enter a page ID to act as the site moved warning page. Use for IP/DNS changes.</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_SSL</td>
		<td> false</td>
		<td>Value</td>
		<td> For mixed content: 'https' or 'http' - Value represents if the site will be mostly secure or non-secure</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_SLIDER</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Owl slider feature</td>
	</tr>
	<tr>
		<td>TER_ACTIVATE_WAYPOINTS</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Enqueue waypoints.js. Turn this on for the CTA Sidebar feature.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th>Experimental Constants</th>
		<th>Default Value</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>TER_ACTIVATE_SKROLLR</td>
		<td>false</td>
		<td>Boolean</td>
		<td>Enqueue skrollr.js</td>
	</tr>
</table>