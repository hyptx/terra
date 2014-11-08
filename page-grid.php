<?php $ter_add_stylesheet = array('example-grid') ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
			
				<div class="alert alert-success">Example Grid Page - <a href="http://getbootstrap.com/getting-started/#examples" target="_blank" class="alert-link">More Examples</a></div>
				
				<table class="table table-bordered" style="background:#fff">
				<thead>
				  <tr>
					<th>Element</th>
					<th>Description</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>Panels</td>
					<td><code>.panel .panel-default</code> <code>.panel-body</code> <code>.panel-title</code> <code>.panel-heading</code> <code>.panel-footer</code> <code>.panel-collapse</code></td>
				  </tr>
				  <tr>
					<td>List groups</td>
					<td><code>.list-group</code> <code>.list-group-item</code> <code>.list-group-item-text</code> <code>.list-group-item-heading</code></td>
				  </tr>
				  <tr>
					<td>Glyphicons</td>
					<td><code>.glyphicon</code></td>
				  </tr>
				  <tr>
					<td>Jumbotron</td>
					<td><code>.jumbotron</code></td>
				  </tr>
				  <tr>
					<td>Tiny grid (&lt;768 px)</td>
					<td><code>.col-xs-*</code></td>
				  </tr>
				  <tr>
					<td>Small grid (&gt;768 px)</td>
					<td><code>.col-sm-*</code></td>
				  </tr>
				  <tr>
					<td>Medium grid (&gt;992 px)</td>
					<td><code>.col-md-*</code></td>
				  </tr>
				  <tr>
					<td>Large grid (&gt;1200 px)</td>
					<td><code>.col-lg-*</code></td>
				  </tr>
				  <tr>
					<td>Offsets</td>
					<td><code>.col-sm-offset-*</code> <code>.col-md-offset-*</code> <code>.col-lg-offset-*</code></td>
				  </tr>
				  <tr>
					<td>Push</td>
					<td><code>.col-sm-push-*</code> <code>.col-md-push-*</code> <code>.col-lg-push-*</code></td>
				  </tr>
				  <tr>
					<td>Pull</td>
					<td><code>.col-sm-pull-*</code> <code>.col-md-pull-*</code> <code>.col-lg-pull-*</code></td>
				  </tr>
				  <tr>
					<td>Input groups</td>
					<td><code>.input-group</code> <code>.input-group-addon</code> <code>.input-group-btn</code></td>
				  </tr>
				  <tr>
					<td>Form controls</td>
					<td><code>.form-control</code> <code>.form-group</code></td>
				  </tr>
				  <tr>
					<td>Button group sizes</td>
					<td><code>.btn-group-xs</code> <code>.btn-group-sm</code> <code>.btn-group-lg</code></td>
				  </tr>
				  <tr>
					<td>Navbar text</td>
					<td><code>.navbar-text</code></td>
				  </tr>
				  <tr>
					<td>Navbar header</td>
					<td><code>.navbar-header</code></td>
				  </tr>
				  <tr>
					<td>Justified tabs / pills</td>
					<td><code>.nav-justified</code></td>
				  </tr>
				  <tr>
					<td>Responsive images</td>
					<td><code>.img-responsive</code></td>
				  </tr>
				  <tr>
					<td>Contextual table rows</td>
					<td><code>.success</code> <code>.danger</code> <code>.warning</code> <code>.active</code></td>
				  </tr>
				  <tr>
					<td>Contextual panels</td>
					<td><code>.panel-success</code> <code>.panel-danger</code> <code>.panel-warning</code> <code>.panel-info</code></td>
				  </tr>
				  <tr>
					<td>Modal</td>
					<td><code>.modal-dialog</code> <code>.modal-content</code></td>
				  </tr>
				  <tr>
					<td>Thumbnail image</td>
					<td><code>.img-thumbnail</code></td>
				  </tr>
				  <tr>
					<td>Well sizes</td>
					<td><code>.well-sm</code> <code>.well-lg</code></td>
				  </tr>
				  <tr>
					<td>Alert links</td>
					<td><code>.alert-link</code></td>
				  </tr>
				</tbody>
			  </table>
				
				<div class="page-header">
					<h1>Bootstrap grid examples</h1>
					<p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>
				</div>
				<h3>Three equal columns</h3>
				<p>Get three equal-width columns <strong>starting at desktops and scaling to large desktops</strong>. On mobile devices, tablets and below, the columns will automatically stack.</p>
				<div class="row">
					<div class="col-md-4">.col-md-4</div>
					<div class="col-md-4">.col-md-4</div>
					<div class="col-md-4">.col-md-4</div>
				</div>
				<h3>Three unequal columns</h3>
				<p>Get three columns <strong>starting at desktops and scaling to large desktops</strong> of various widths. Remember, grid columns should add up to twelve for a single horizontal block. More than that, and columns start stacking no matter the viewport.</p>
				<div class="row">
					<div class="col-md-3">.col-md-3</div>
					<div class="col-md-6">.col-md-6</div>
					<div class="col-md-3">.col-md-3</div>
				</div>
				<h3>Two columns</h3>
				<p>Get two columns <strong>starting at desktops and scaling to large desktops</strong>.</p>
				<div class="row">
					<div class="col-md-8">.col-md-8</div>
					<div class="col-md-4">.col-md-4</div>
				</div>
				<h3>Full width, single column</h3>
				<p class="text-warning">No grid classes are necessary for full-width elements.</p>
				<hr>
				<h3>Two columns with two nested columns</h3>
				<p>Per the documentation, nesting is easy—just put a row of columns within an existing row. This gives you two columns <strong>starting at desktops and scaling to large desktops</strong>, with another two (equal widths) within the larger column.</p>
				<p>At mobile device sizes, tablets and down, these columns and their nested columns will stack.</p>
				<div class="row">
					<div class="col-md-8"> .col-md-8
						<div class="row">
							<div class="col-md-6">.col-md-6</div>
							<div class="col-md-6">.col-md-6</div>
						</div>
					</div>
					<div class="col-md-4">.col-md-4</div>
				</div>
				<hr>
				<h3>Mixed: mobile and desktop</h3>
				<p>The Bootstrap 3 grid system has four tiers of classes: xs (phones), sm (tablets), md (desktops), and lg (larger desktops). You can use nearly any combination of these classes to create more dynamic and flexible layouts.</p>
				<p>Each tier of classes scales up, meaning if you plan on setting the same widths for xs and sm, you only need to specify xs.</p>
				<div class="row">
					<div class="col-xs-12 col-md-8">.col-xs-12 .col-md-8</div>
					<div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
					<div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
					<div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6">.col-xs-6 .col-md-6</div>
					<div class="col-xs-6 col-md-6">.col-xs-6 .col-md-6</div>
				</div>
				<hr>
				<h3>Mixed: mobile, tablet, and desktop</h3>
				<p></p>
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-lg-8">.col-xs-12 .col-lg-8</div>
					<div class="col-xs-6 col-sm-4 col-lg-4">.col-xs-6 .col-lg-4</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-4 col-lg-4">.col-xs-6 .col-sm-4 .col-lg-4</div>
					<div class="col-xs-6 col-sm-4 col-lg-4">.col-xs-6 .col-sm-4 .col-lg-4</div>
					<div class="col-xs-6 col-sm-4 col-lg-4">.col-xs-6 .col-sm-4 .col-lg-4</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-lg-6">.col-xs-6 .col-sm-6 .col-lg-6</div>
					<div class="col-xs-6 col-sm-6 col-lg-6">.col-xs-6 .col-sm-6 .col-lg-6</div>
				</div>
				
			</div><!-- /#content --> 
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>