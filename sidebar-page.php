<?php terx_template_comment(__FILE__) ?>
<aside id="secondary" class="<?php echo TERX_SECONDARY_CLASS ?> widget-area" role="complementary">
    <?php if(!dynamic_sidebar('Page Sidebar')): ?>
    <div class="widget">
        <h3 class="widget-title">Page Sidebar Widget</h3>
        <p>This is the sidebar displayed on pages. Just <a href="/wp-admin/widgets.php">create a widget</a> in the Page Sidebar, and you are good to go.</p>
    </div>
    <?php endif ?>
</aside><!-- #secondary -->