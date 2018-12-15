<?php
if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die('Please do not load this page directly. Thanks!');
if(post_password_required()): ?>
	<div class="alert alert-warning"><p class="bottom">This post is password protected. Enter the password to view comments.</p></div>
<?php return; endif ?>
<div id="comments">
    <h3 id="comments-title"><?php $com_num = number_format_i18n(get_comments_number()); echo $com_num ?> Comment<?php if($com_num != 1) echo 's' ?></h3>
    <div id="respond" class="ter-com-form">
        <?php if(get_option('comment_registration') && !is_user_logged_in()): ?>
        <p>You must be <a href="<?php echo wp_login_url(get_permalink()) ?>">logged in</a> to post a comment.</p>
        <?php else: ?>
        <form action="<?php echo get_option('siteurl') ?>/wp-comments-post.php" method="post">
            <?php if(is_user_logged_in()): ?>
            <?php else: ?>
            <p><em>Please provide us with the following before posting a comment</em></p>
            <div class="form-group">
                <label for="author">Name <?php if($req) echo "*"; ?></label>
                <input type="text" class="text form-control" name="author" value="<?php echo esc_attr($comment_author) ?>" tabindex="1" <?php if($req) echo "aria-required='true'" ?>/>
            </div>
            <div class="form-group">
                <label for="email">Email <?php if($req) echo "*" ?></label>
                <input type="text" class="text form-control" name="email" value="<?php echo esc_attr($comment_author_email) ?>" tabindex="2" <?php if($req) echo "aria-required='true'" ?>/>
            </div>
            <div class="form-group">
                <label for="url">Website</label>
                <input type="text" class="text form-control" name="url" value="<?php echo esc_attr($comment_author_url) ?>" tabindex="3"/>
            </div>
            <?php endif ?>
            <div class="form-group">
            <textarea name="comment" tabindex="4" class="form-control"></textarea>
            </div>
            <input name="submit" id="comment-submit" class="btn btn-default" type="submit" tabindex="5" value="Post Comment"/>
            <span class="cancel-comment-reply"><?php cancel_comment_reply_link('Cancel') ?></span>
            <?php comment_id_fields() ?>
            <?php do_action('comment_form',$post->ID) ?>
        </form>
        <?php endif ?>
    </div>
    <?php if(have_comments()): ?>
        <ol class="commentlist"><?php wp_list_comments('callback=terx_com_callback&reverse_top_level=true&reverse_children=true') ?></ol>
    <?php else: //no comments ?>
        <?php if(comments_open()): ?>
         <?php else: //closed ?>
            <p class="nocomments">Comments are closed.</p>
        <?php endif ?>
    <?php endif ?>
    <?php if(comments_open()): ?>
    <?php endif ?>
</div>