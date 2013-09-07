<?php  
if( !empty($_SERVER['SCRIPT_FILENAME']) && 
     'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) ) {
    die ('Please do not load this page directly. Thanks!');
}

/* if there is a password */
if( !empty($post->post_password) ) { 
    /* and it doesn't match the cookie */
    if( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {  
?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php 
        return;
    }
}
/* This variable is for alternating comment background */
$oddcomment = 'class="alt" ';
?>

<?php  if( $comments ) { ?>
    <h3 id="comments" class="center">
        <?php  comments_number('No Comments Yet', 'One Comment', '% Comments' );?> on
        <span class="thin">&#8220;</span><?php  the_title(); ?><span class="thin">&#8221;</span>
    </h3>

    <ol class="commentlist">

    <?php  foreach ($comments as $comment) { ?>

        <li <?php  echo $oddcomment; ?>id="comment-<?php  comment_ID() ?>">
            <p class="commentmeta">
                <?php  echo get_avatar( $comment, 26 ); ?>
                <strong><?php  blueberry_comment_name(get_comment_author_link(), 55); ?></strong>
                <br />
                <small><a href="#comment-<?php  comment_ID() ?>">
                    <?php  comment_date('F, jS Y') ?> at <?php  comment_time() ?>
                </a><?php  edit_comment_link('edit',' &mdash; ',''); ?></small> 
                <?php  if( $comment->comment_approved == '0' ) { ?>
                    <em>Your comment is awaiting moderation.</em>
                <?php  } /* if( $comment->comment_approved == '0' ) */?>
            </p>
            <?php  comment_text() ?>
        </li>

    <?php 
        /* Changes every other comment to a different class */
        $oddcomment = ( $oddcomment == 'class="norm"' ) ? 'class="alt" ' : 'class="norm"';
    ?>

    <?php  }; /* end for each comment */ ?>

    </ol>

 <?php  } else { /* this is displayed if there are no comments so far */ ?>

    <?php  if( 'open' == $post->comment_status ) { ?>
        <!-- If comments are open, but there are no comments. -->
     <?php  } else { // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>
    <?php  } /* if( 'open' == $post->comment_status ) */ ?>
    
<?php  } /* if( $comments ) */ ?>


<?php  if( $post->comment_status == 'open' ) { ?>

<h3 id="respond" class="center">Leave a Reply</h3>

<?php  if( get_option('comment_registration') && !$user_ID ) { ?>
<p>You must be <a href="<?php  echo get_option('wp_url'); ?>/wp-login.php?redirect_to=<?php  echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php  } else { ?>

<form action="<?php  echo get_option('wp_url'); ?>/wp-comments-post.php" method="post" id="commentform">

<div class="alignleft">
<?php  if( $user_ID ) { ?>
    
    <p class="right">
    You are logged in as <a href="<?php  echo get_option('wp_url'); ?>/wp-admin/profile.php">
    <?php  echo $user_identity; ?></a>.<br /><br /> 
    <strong><a href="<?php  echo get_option('wp_url'); ?>/wp-login.php?action=logout" title="Log out of this account">
    Log out &raquo;</a></strong></p>
    
<?php  } else { ?>
<p class="textwrap">
    <input type="text" name="author" id="author" 
           value="<?php  ( empty($comment_author) ) ? print('your name') : print($comment_author); ?>" 
           size="22" tabindex="1" class="comment_textbox commentbox"
           <?php  if( $req ) { echo "aria-required='true'"; } ?> />
</p>
<p class="textwrap">
    <input type="text" name="email" id="email" 
           value="<?php  ( empty($comment_author_email) ) ? print('your email') : print($comment_author_email); ?>" 
           size="22" tabindex="2" class="comment_textbox commentbox"
           <?php  if( $req ) { echo "aria-required='true'"; } ?> />
</p>
<p class="textwrap">
    <input type="text" name="url" id="url" 
           value="<?php  ( empty($comment_author_url) ) ? print('http://') : print($comment_author_url); ?>" 
           size="22" tabindex="3" class="comment_textbox commentbox" />
</p>

<?php  } /* if( $user_ID ) */ ?>
</div>
<div class="alignright">
<p>
    <textarea name="comment" id="comment" class="commentbox" cols="30" rows="10" tabindex="4">your comment...</textarea>
</p>
<p class="right">
    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
    <input type="hidden" name="comment_post_ID" value="<?php  echo $id; ?>" />
</p>
</div>
<?php  do_action('comment_form', $post->ID); ?>

<div class="clear"></div>
</form>

<?php  } /* if( get_option('comment_registration') && !$user_ID ) */ ?>

<?php  } /* if( $post->comment_status == 'open' ) */ ?>
