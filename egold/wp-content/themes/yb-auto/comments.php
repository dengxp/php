<?php  // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p>This post is password protected. Enter the password to view comments.</p>

				<?php 
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<div id="comments">
			<h2>Comments</h2>
			<div class="xmtv"></div>
			<div class="sep"></div>

<?php  if ($comments) : ?>
<?php  $i = 1; ?>
<?php  foreach ($comments as $comment) :?>
<div class="comment" id="comment-<?php  comment_ID() ?>"> <?php  echo get_avatar( $comment, 40 ); ?> <strong><?php  comment_author_link() ?></strong> (<?php  the_time('F jS, Y'); ?> at <?php  the_time('H:m'); ?>)
		<?php  if ($comment->comment_approved == '0') : ?>
		<p>Your comment is awaiting moderation.</p>
		<?php  endif; ?>
<?php  comment_text() ?>
</div>
<?php  endforeach; /* end for each comment */ ?>


<?php  else : // this is displayed if there are no comments so far ?>

  <?php  if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->

	 <?php  else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div class="comment"><p>Comments are closed.</p></div>

	<?php  endif; ?>
<?php  endif; ?>
</div>
<?php  if ('open' == $post->comment_status) : ?>
<div id="commentArea">
	<h2 style="padding-left: 10px;">Leave a Reply</h2>
<?php  if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php  echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php  the_permalink(); ?>">logged in</a> to post a comment.</p>
<form action="<?php  echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php  else : ?>
<?php  if ( $user_ID ) : ?>
<p>
Logged in as <a href="<?php  echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php  echo $user_identity; ?></a>. <a href="<?php  echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
<form action="<?php  echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php  else : ?>
<form action="<?php  echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<p><label for="cmt_name" style="position: relative; right: 10px;">Name: </label> <input class="in" name="author" id="cmt_name" value="<?php  echo $comment_author; ?>"></input></p>
<p><label for="cmt_email" style="position: relative; right: 10px;">Email: </label>	<input class="in" name="email" id="cmt_email" value="<?php  echo $comment_author_email; ?>"></input></p>
<p><label for="cmt_url" style="position: relative; right: 10px;">Website: </label><input class="in" id="cmt_url" name="url" value="<?php  echo $comment_author_url; ?>"></input></p>
<?php  endif; ?>
<p><label for="cmt_email" style="position: relative; right: 10px;"></label><textarea name="comment" cols="40" rows="6" class="in"></textarea></p>
<p class="subm"><input type="submit" class="push" value="Submit Comment"></input></p><p><input type="hidden" name="comment_post_ID" value="<?php  echo $id; ?>"></input></p>
<?php  do_action('comment_form', $post->ID); ?>
</form>
<div id="commentBottom"></div>
</div>
<?php  endif; // If registration required and not logged in ?>

<?php  endif; // if you delete this the sky will fall on your head ?>