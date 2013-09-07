<?php  get_header(); ?>
	<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
		<h2 id="post-<?php  the_ID(); ?>"><a href="<?php  the_permalink() ?>" rel="bookmark" title="<?php  the_title(); ?>"><?php  the_title(); ?></a></h2>
		<div class="ct"><?php  the_tags('Tags: ', ', ', '<br />'); ?>, <?php  _e('Posted in&#58;'); ?> <?php  the_category(', ') ?>, Author: <?php  the_author() ?> (<?php  the_time('F j, Y') ?>) <?php  edit_post_link('Edit','',''); ?>
			<div class="mct">
				
<?php  ($post->post_excerpt != "")? the_excerpt('Read more &#187;') : the_content('Read more &#187;'); ?>
			</div>
			<div class="sep"></div>
				<div class="whatToDo">
					<?php  comments_popup_link('Comments - 0 &#187;', 'Comments - 	1 &#187;', 'Comments - 	% &#187;'); ?> 


				</div>
				<div class="sep"></div>
			</div>
		</div>
		<br /><br />
				
	<?php  endwhile; else: ?>
	<div class="post">
	<h2>Not Found</h2>
	<div class="ct">
			<div class="mct">
				<p>Sorry, but you are looking for something that isn't here.</p>
			</div>

	</div>
	</div>
	<?php  endif; ?>		
		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link('&laquo; Previous Posts') ?></div>
			<div class="alignright"><?php  previous_posts_link('Next Posts &raquo;') ?></div>
		</div>
	</div>
<?php  get_footer(); ?>