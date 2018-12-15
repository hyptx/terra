// This file is for use in modifying Gutenberg Blocks, un-comment filter in functions.php, terx_enqueue_blocks()
// https://wordpress.org/gutenberg/handbook/extensibility/extending-blocks/
// The below example changes the classname of the code block to be 'codetastic'
/*
function setBlockCustomClassName( className, blockName ) {
	return blockName === 'core/code' ?
		'codetastic' :
		className;
}

// Adding the filter
wp.hooks.addFilter(
	'blocks.getBlockDefaultClassName',
	'my-plugin/set-block-custom-class-name',
	setBlockCustomClassName
);
*/