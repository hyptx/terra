<?php ter_template_comment(__FILE__) ?>
<aside id="secondary" class="<?php echo TER_SECONDARY_CLASS ?> widget-area" role="complementary">
    <?php if(!dynamic_sidebar('Blog Sidebar')): ?>
	<div class="widget">
        <h3 class="widget-title">Blog Widget</h3>
        <p>This is the sidebar displayed on blog pages</p>
    </div>
    <?php endif ?>
</aside><!-- #secondary -->