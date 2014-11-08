<form role="search" method="get" class="searchform form-inline" action="<?php echo home_url('/') ?>">
	<div class="form-group">
		<label class="sr-only">Search for:</label>
		<input type="text" value="Enter Search Query" name="s" onfocus="terClearMe(this);" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Search" class="btn btn-default" />
	</div>
</form>
