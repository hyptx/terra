#The Terra Theme

This theme was built by a developer, for developers. Built for my self to be precise. I will be adding documentation here, stay tuned.

**I do not recommend editing Terra directly.** The Wordpress child theme system is just to useful. If you want to use the Terra Theme system to its fullest, install and activate [Terra Jr](https://github.com/hyptx/terra-jr). Keep the parent theme pristine and do all your customizing in the child.

The Terra Jr Theme has and added bonus of a custom post type factory class, amongst other features. Try to keep the versions of Parent and Child the same. They are meant to act as a team!

##Versions

* [Latest Terra Release](https://github.com/hyptx/terra/releases/latest)
* [Latest Terra Jr Release](https://github.com/hyptx/terra-jr/releases/latest)

Version numbers mirror Twitter Bootstrap's MAJOR.MINOR.PATCH schema. Terra's versioning includes a fourth, representing theme patches: MAJOR.MINOR.PATCH.THEMEPATCH

####Theme Features

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
* Owl Slider
* Apple touch icon support
* Parallax script, skrollr.js
* jQuery Waypoints, waypoints.js
* respond.js (IE8 support)
* html5.js (IE8 support)
* Max image size script to prevent huge uploads

The Terra Theme does not use the Wordpress theme options system to save options. I decided that hardcoding the theme options would save on database queries and overhead. All of the theme settings are at the top of the *functions.php* file, in the form of easily understandable constants.

##Installation

1. Get a copy of [Terra](https://github.com/hyptx/terra/releases/latest) and upload it to your themes directory
2. Get a copy of [Terra Jr](https://github.com/hyptx/terra-jr/releases/latest) and upload it to your themes directory
3. Activate Terra Jr
4. Rock and Roll

####Browser Support

* Chrome
* Firefox
* Safari
* IE8+

Two javascript files are loaded to support IE8, respond.js and html5.js. Respond.js does not parse CDN loaded files, so bootstrap.min.css is loaded locally.

##CloudFlare

If you want to use the theme with CloudFlare's flexible SSL, it's easy, and free. You will need to secure your Wordpress admin area so that the wp admin bar stays secure on the front end. Add the following two lines toward the top of your *wp-config.php* file. 

```php
define('FORCE_SSL_ADMIN',true);
if($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') $_SERVER['HTTPS'] = 'on';
```

* [CloudFlare SSL Info](https://support.cloudflare.com/hc/en-us/articles/200170416-What-do-the-SSL-options-Off-Flexible-SSL-Full-SSL-Full-SSL-Strict-mean-)
* [CloudFlare SSL Redirects](https://support.cloudflare.com/hc/en-us/articles/200170536-How-do-I-redirect-HTTPS-traffic-with-Flexible-SSL-and-Apache-)
* [Wordpress Codex Source](http://codex.wordpress.org/Administration_Over_SSL)
