<?php $terx_add_stylesheet = array('example-grid') ?>
<?php get_header() ?>
<?php terx_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TERX_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
			
				<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th></th>
      <th class="text-center">
        Extra small<br>
        <small>&lt;576px</small>
      </th>
      <th class="text-center">
        Small<br>
        <small>≥576px</small>
      </th>
      <th class="text-center">
        Medium<br>
        <small>≥768px</small>
      </th>
      <th class="text-center">
        Large<br>
        <small>≥992px</small>
      </th>
      <th class="text-center">
        Extra large<br>
        <small>≥1200px</small>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="text-nowrap" scope="row">Max container width</th>
      <td>None (auto)</td>
      <td>540px</td>
      <td>720px</td>
      <td>960px</td>
      <td>1140px</td>
    </tr>
    <tr>
      <th class="text-nowrap" scope="row">Class prefix</th>
      <td><code>.col-</code></td>
      <td><code>.col-sm-</code></td>
      <td><code>.col-md-</code></td>
      <td><code>.col-lg-</code></td>
      <td><code>.col-xl-</code></td>
    </tr>
    <tr>
      <th class="text-nowrap" scope="row"># of columns</th>
      <td colspan="5">12</td>
    </tr>
    <tr>
      <th class="text-nowrap" scope="row">Gutter width</th>
      <td colspan="5">30px (15px on each side of a column)</td>
    </tr>
    <tr>
      <th class="text-nowrap" scope="row">Nestable</th>
      <td colspan="5">Yes</td>
    </tr>
    <tr>
      <th class="text-nowrap" scope="row">Column ordering</th>
      <td colspan="5">Yes</td>
    </tr>
  </tbody>
</table>
				
				 <div class="container">

      <h1>Bootstrap grid examples</h1>
      <p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>

      <h2 class="mt-4">Five grid tiers</h2>
      <p>There are five tiers to the Bootstrap grid system, one for each range of devices we support. Each tier starts at a minimum viewport size and automatically applies to the larger devices unless overridden.</p>

      <div class="row">
        <div class="col-4">.col-4</div>
        <div class="col-4">.col-4</div>
        <div class="col-4">.col-4</div>
      </div>

      <div class="row">
        <div class="col-sm-4">.col-sm-4</div>
        <div class="col-sm-4">.col-sm-4</div>
        <div class="col-sm-4">.col-sm-4</div>
      </div>

      <div class="row">
        <div class="col-md-4">.col-md-4</div>
        <div class="col-md-4">.col-md-4</div>
        <div class="col-md-4">.col-md-4</div>
      </div>

      <div class="row">
        <div class="col-lg-4">.col-lg-4</div>
        <div class="col-lg-4">.col-lg-4</div>
        <div class="col-lg-4">.col-lg-4</div>
      </div>

      <div class="row">
        <div class="col-xl-4">.col-xl-4</div>
        <div class="col-xl-4">.col-xl-4</div>
        <div class="col-xl-4">.col-xl-4</div>
      </div>

      <h2 class="mt-4">Three equal columns</h2>
      <p>Get three equal-width columns <strong>starting at desktops and scaling to large desktops</strong>. On mobile devices, tablets and below, the columns will automatically stack.</p>
      <div class="row">
        <div class="col-md-4">.col-md-4</div>
        <div class="col-md-4">.col-md-4</div>
        <div class="col-md-4">.col-md-4</div>
      </div>

      <h2 class="mt-4">Three unequal columns</h2>
      <p>Get three columns <strong>starting at desktops and scaling to large desktops</strong> of various widths. Remember, grid columns should add up to twelve for a single horizontal block. More than that, and columns start stacking no matter the viewport.</p>
      <div class="row">
        <div class="col-md-3">.col-md-3</div>
        <div class="col-md-6">.col-md-6</div>
        <div class="col-md-3">.col-md-3</div>
      </div>

      <h2 class="mt-4">Two columns</h2>
      <p>Get two columns <strong>starting at desktops and scaling to large desktops</strong>.</p>
      <div class="row">
        <div class="col-md-8">.col-md-8</div>
        <div class="col-md-4">.col-md-4</div>
      </div>

      <h2 class="mt-4">Full width, single column</h2>
      <p class="text-warning">No grid classes are necessary for full-width elements.</p>

      <hr>

      <h2 class="mt-4">Two columns with two nested columns</h2>
      <p>Per the documentation, nesting is easy—just put a row of columns within an existing column. This gives you two columns <strong>starting at desktops and scaling to large desktops</strong>, with another two (equal widths) within the larger column.</p>
      <p>At mobile device sizes, tablets and down, these columns and their nested columns will stack.</p>
      <div class="row">
        <div class="col-md-8">
          .col-md-8
          <div class="row">
            <div class="col-md-6">.col-md-6</div>
            <div class="col-md-6">.col-md-6</div>
          </div>
        </div>
        <div class="col-md-4">.col-md-4</div>
      </div>

      <hr>

      <h2 class="mt-4">Mixed: mobile and desktop</h2>
      <p>The Bootstrap v4 grid system has five tiers of classes: xs (extra small), sm (small), md (medium), lg (large), and xl (extra large). You can use nearly any combination of these classes to create more dynamic and flexible layouts.</p>
      <p>Each tier of classes scales up, meaning if you plan on setting the same widths for xs and sm, you only need to specify xs.</p>
      <div class="row">
        <div class="col-12 col-md-8">.col-12 .col-md-8</div>
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
        <div class="col-6 col-md-4">.col-6 .col-md-4</div>
      </div>
      <div class="row">
        <div class="col-6">.col-6</div>
        <div class="col-6">.col-6</div>
      </div>

      <hr>

      <h2 class="mt-4">Mixed: mobile, tablet, and desktop</h2>
      <p></p>
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-8">.col-12 .col-sm-6 .col-lg-8</div>
        <div class="col-6 col-lg-4">.col-6 .col-lg-4</div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
        <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
        <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
      </div>

    </div> <!-- /container -->
				
			</div><!-- /#content --> 
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>