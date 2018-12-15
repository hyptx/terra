<?php terx_template_comment(__FILE__) ?>
<aside id="secondary" class="<?php echo TERX_SECONDARY_CLASS ?> widget-area" role="complementary">
    <?php if(!dynamic_sidebar('sidebar-1')): ?>
    <div id="archives" class="widget">
        <h3 class="widget-title"><?php _e('Archives','terra') ?></h3>
        <ul><?php wp_get_archives(array('type' => 'monthly')) ?></ul>
    </div>
    <div id="meta" class="widget">
        <h3 class="widget-title"><?php _e('Meta','terra') ?></h3>
        <ul>
            <?php wp_register() ?>
            <li><?php wp_loginout() ?></li>
            <?php wp_meta() ?>
        </ul>
    </div>
    <?php endif ?>
</aside><!-- #secondary -->