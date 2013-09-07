<?php 

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php 
		return;
	}
?>

<!-- You can start editing here. -->

<?php  if ( have_comments() ) : ?>
	<div class="posttitle"><h3 id="comments"><?php  comments_number('No Responses', 'One Response', '% Responses' );?> to <?php  the_title(); ?></h3></div>

<div class="post">
		<div class="comment-navigation">
			<div class="alignleft"><?php  previous_comments_link() ?></div>
			<div class="alignright"><?php  next_comments_link() ?></div>
	</div>
			<ol class="commentlist">
			<?php  wp_list_comments(); ?>
			</ol>

	<div class="comment-navigation">
		<div class="alignleft"><?php  previous_comments_link() ?></div>
		<div class="alignright"><?php  next_comments_link() ?></div>
	</div>
	</div>
 <?php  else : // this is displayed if there are no comments so far ?>

	<?php  if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php  else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php  endif; ?>
<?php  endif; ?>


<?php  if ('open' == $post->comment_status) : ?>


<div class="posttitle"><h3><?php  comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3></div>

<div class="post"><div class="cancel-comment-reply">
	<small><?php  cancel_comment_reply_link(); ?></small>
</div>

<?php  if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php  echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php  echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php  else : ?>

<form action="<?php  echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<fieldset>
<?php  if ( $user_ID ) : ?>

		<p>Logged in as <a href="<?php  echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php  echo $user_identity; ?></a>. <a href="<?php  echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php  else : ?>
		<p class="firstresponse">Name and Email Address are required fields. Your email will not be published or shared with third parties.</p>
		<p><input type="text" name="author" id="author" value="<?php  echo $comment_author; ?>" size="22" tabindex="1" <?php  if ($req) echo "aria-required='true'"; ?> />
		<label for="author">Name <?php  if ($req) echo "*"; ?></label></p>

		<p><input type="text" name="email" id="email" value="<?php  echo $comment_author_email; ?>" size="22" tabindex="2" <?php  if ($req) echo "aria-required='true'"; ?> />
		<label for="email">Email Address <?php  if ($req) echo "*"; ?></label></p>

		<p><input type="text" name="url" id="url" value="<?php  echo $comment_author_url; ?>" size="22" tabindex="3" />
		<label for="url">Website</label></p>

<?php  endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php  echo allowed_tags(); ?></code></small></p>-->

		<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php  comment_id_fields(); ?>
		</p>
<?php  do_action('comment_form', $post->ID); ?>
	</fieldset>
</form>
</div>
<?php  endif; // If registration required and not logged in ?>

<?php  endif; // if you delete this the sky will fall on your head ?>
