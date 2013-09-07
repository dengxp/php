<?php  get_header(); ?>

		<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php  previous_post_link('%link') ?></div>
			<div class="alignright"><?php  next_post_link('%link') ?></div>
		</div>
		<div class="clear"></div>

	
			<div <?php  post_class() ?> id="post-<?php  the_ID(); ?>">
				<div class="post-date">
					<div class="day"><?php  the_time('d') ?></div>
					<div class="month"><?php  the_time('M') ?></div>
					<div class="month"><?php  the_time('Y') ?></div>
				</div>
				<h2><?php  the_title(); ?></h2>
				<p class="byline"><small>by <?php  the_author() ?> </small></p>
				<div class="entry">
				<?php  the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php  wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php  the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						<?php  /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
					
					
					<span class="tiny-category"><?php  the_category(', ') ?></span> | <?php  post_comments_feed_link('<span class="tiny-rss">RSS 2.0</span>'); ?> | 

						<?php  if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<a href="#respond" class="tiny-comments">Respond</a> | <a href="<?php  trackback_url(); ?>" rel="trackback" class="tiny-trackback">Trackback</a> |  

						<?php  } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<a href="<?php  trackback_url(); ?> " rel="trackback" class="tiny-trackback">Trackback</a> | 
						

						<?php  } edit_post_link('<span class="tiny-pencil">Edit</span>','',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php  comments_template(); ?>

	<?php  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php  endif; ?>			
<?php  get_sidebar(); ?>



<?php  get_footer(); ?>
