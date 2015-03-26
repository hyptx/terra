<?php /* ~~~~~~~~~~~ Admin Page ~~~~~~~~~~~ */
function ter_help_page_html(){?>
	<style type="text/css">
	pre {
	 white-space: pre-wrap;       /* css-3 */
	 white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
	 white-space: -pre-wrap;      /* Opera 4-6 */
	 white-space: -o-pre-wrap;    /* Opera 7 */
	 word-wrap: break-word;       /* Internet Explorer 5.5+ */
	}
	</style>
	<div class="wrap">
    	<h2>Theme Help</h2>

		<?php global $ter_child_help ?>
		<?php if($ter_child_help): ?>
			<?php foreach($ter_child_help as $key=>$value): ?>
			<br><h3><?php echo $key ?></h3><hr>
			<?php echo $value ?>
			<?php endforeach ?>
		<?php endif ?>

		<br>  	
<h3>Custom Shortcodes</h3><hr>
<p>These shortcodes are created by your child theme. Simply wrap your html in the tags: <code>[shortcode-tag]your html is here[/shortcode-tag]</code><br>Make sure to paste it into the HTML editor, not the Visual editor when editing your content.</p>
		<?php global $ter_child_shortcodes ?>
		<?php if($ter_child_shortcodes): ?>
		<ul>
			<?php foreach($ter_child_shortcodes as $key=>$value): ?>
			<li><code><?php echo $key ?><?php echo str_replace('[','[/',$key) ?></code> - <?php echo $value ?></li>
			<?php endforeach ?>
		</ul>
		<?php else: ?>
		<p style="color:#C94E29">No custom shortcodes have been set</p>
		<?php endif ?>

		<br>
<h3>Button Shortcodes</h3><hr>
<p>Use this shortcode to create a styled button:</p>
		<ul>
            <li><code>[button href="http://google.com"]Google[/button]</code> - Enter the url of the target page for a basic button</li>
           	<li><code>[button href="http://google.com" target="_blank"]Google[/button]</code> - Add a target to force the page to open in a new tab</li>
			<li><code>[button href="http://google.com" target="_blank" class="btn-default"]Google[/button]</code> - Enter a button class to style your button</li>
        </ul>
		<p>Use this shortcode to create a styled button with a triangle graphic:</p>
		<ul>
            <li><code>[button-cta href="http://google.com"]Google[/button-cta]</code></li>
        </ul>
<p><strong>Available button styling classes:</strong></p>
		<ul>
            <li><code style="background:#fff; width:10px">&nbsp;</code> <code>btn-default</code> - Standard Button</li>
			<li><code style="background:#d9534f; width:10px">&nbsp;</code> <code>btn-danger</code> - Red Button</li>
			<li><code style="background:#5bc0de; width:10px">&nbsp;</code> <code>btn-info</code> - Light Blue Button</li>
			<li><code style="background:none; width:10px">&nbsp;</code> <code>btn-link</code> - Plain Link</li>
			<li><code style="background:#428bca; width:10px">&nbsp;</code> <code>btn-primary</code> - Blue Button</li>
			<li><code style="background:#5cb85c; width:10px">&nbsp;</code> <code>btn-success</code> - Green Button</li>
			<li><code style="background:#f0ad4e; width:10px">&nbsp;</code> <code>btn-warning</code> - Orange button</li>          	
        </ul>
<p><strong>Available button extra classes:</strong></p>
<p><em>You can stack up classes in the class attribute by separating them with a space. When using extra classes you need to specify a styling class from above.</em></p>
		<ul>
			<li><code>btn-block</code> - Block element button</li>
			<li><code>btn-lg</code> - Large button</li>
			<li><code>btn-sm</code> - Small button</li>
			<li><code>btn-xs</code> - Extra small button</li>          	
        </ul>
		
<br>
<h3>Modal Shortcodes</h3><hr>
<p>Use these shortcodes to create a bootstrap modal box. Each box must have a corresponding trigger. Choose a unique id name to use to tie the box to its trigger. Remove the title or close_btn attributes if you want to hide those elements.</p>
<ul>
	<li><code>[modal id="testmodal" title="Test Modal" close_btn="true"]Modal HTML Content Here[/modal]</code> - This creates the modal box itself. </li>
	<li><code>[modal-trigger id="testmodal" class="btn btn-ter"]Open Test Modal[/modal-trigger]</code> - Remove class attribute to use a plain link. </li>
</ul>
<br>
<h3>PDF Embed Shortcode</h3><hr>
<p>Shorcode specifically meant for embedding a .pdf file. Height defaults to 500 and must be set to a pixel height.</p>
<ul>
	<li><code>[embed-pdf url="http://terra.hyptx.com/wp-content/uploads/2014/11/pdf-sample.pdf" height="500"]</code> - Enter the url of your .pdf document. </li>
</ul>
<br>
<h3>Layout Shortcodes</h3><hr>
<p>Use these shortcodes within your posts and pages to aid in laying out your html. Simply copy and paste one of the examples below into the Wordpress editor. Make sure to paste it into the HTML editor, not the Visual editor.</p>
<p>The layout shortcodes add a div element with the class of &quot;tsc&quot; within said element. If you need to pad or margin the elements target .tsc to do so. Padding or margining the parent div created by the shortcode will break the layout.</p>
        <ul>
            <li><code>[row]</code> - Start a row. Simply wrap around a set of elements to prevent uncleared floats from interfering</li>
            <li><code>[one-third][/one-third]</code> - One third width element</li>
            <li><code>[two-thirds][/two-thirds]</code> - Two thirds width element</li>
            <li><code>[one-half][/one-half]</code> - Half width element</li>
			<li><code>[grid col="#"][/grid]</code> - Enter a value from 1-12 for col, make sure items in a row add up to 12</li>
			<li><code>[/row]</code> - End a row.</li>
        </ul>
<br>		
        <h4>Example 1 - Three one-third elements</h4>
<pre style="border:1px solid #888; padding:1em; background:#eee">
[row]
[one-third]
&lt;h4&gt;one-third&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-third]
[one-third]
&lt;h4&gt;one-third&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-third]
[one-third]
&lt;h4&gt;one-third&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-third]
[/row]
</pre>
<br>
<h4>Example 2 - Two one-half elements</h4>
<pre style="border:1px solid #888; padding:1em; background:#eee">
[row]
[one-half]
&lt;h4&gt;one-half&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-half]
[one-half]
&lt;h4&gt;one-half&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-half]
[/row]
</pre>
<br>
<h4>Example 3 - A one-third element next to a two-thirds element</h4>
<pre style="border:1px solid #888; padding:1em; background:#eee">
[row]
[one-third]
&lt;h4&gt;one-third&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/one-third]
[two-thirds]
&lt;h4&gt;two-thirds&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/two-thirds]
[/row]
</pre>
<br>
<h4>Example 4 - A one-third element next to a two-thirds element using a dynamic grid</h4>
<pre style="border:1px solid #888; padding:1em; background:#eee">
[row]
[grid col="4"]
&lt;h4&gt;grid col="4"&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/grid]
[grid col="8"]
&lt;h4&gt;grid col="8"&lt;/h4&gt;
&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eget nibh. Suspendisse ut ligula ultricies odio rhoncus vestibulum.&lt;/p&gt;
[/grid]
[/row]
</pre>
<br>
<h3>Sitemap</h3>
    	<hr>
        <p>Creating your sitemap:</p>
        <ol>
        <li>Create a new page in Wordpress.</li>
        <li>Name it Sitemap</li>
        <li>Navigate to the new page, the template <code>page-sitemap.php</code> will be used automatically.</li>
        </ol>
        
<br>
<h3>Bootstrap3</h3><hr>
<p>The theme uses the <a href="http://getbootstrap.com/getting-started/" target="_blank">Twitter Bootstrap</a> library. Feel free to use all the great features!</p>
<p>The layout shortcodes above generate Bootstrap3 containers automatically. An alternative would be to create your own containers from scratch. See: <a href="http://getbootstrap.com/css/" target="_blank">http://getbootstrap.com/css/</a></p>

<pre style="border:1px solid #888; padding:1em; background:#eee">
&lt;div class="row"&gt;
  &lt;div class="col-sm-6">Half width container&lt;/div&gt;
  &lt;div class="col-sm-6">Half width container&lt;/div&gt;
&lt;/div&gt;
</pre>
<br>
<h3>Bootstrap3 Testing Templates</h3>
    	<hr>
        <p>There are a few pre-fabricated pages to help you get started using Twitter Bootstrap, and for general use on the site. Below are instructions to set up your example pages:</p>
        <ol>
        <li>Create a new page in Wordpress.</li>
        <li>Name it to match the pre-fabricated page's file name. EX page-grid.php will be used on a page named Grid with a slug of grid.</li>
        <li>Navigate to the new page, the template should be used automatically.</li>
        </ol>
        <strong>Pre-fabricated template names</strong>
        <ul>
            <li><code>page-grid.php</code></li>
			<li><code>page-html.php</code></li>
            <li><code>page-theme.php</code></li>            
        </ul>
</div>
	<?php
}
?>