<?php  get_header(); ?>

	

	<?php  if (have_posts()) : ?>

		<?php  while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php  the_ID(); ?>">
				<div class="post-date">
					<div class="day"><?php  the_time('d') ?></div>
					<div class="month"><?php  the_time('M') ?></div>
					<div class="month"><?php  the_time('Y') ?></div>
				</div>
				<h2><a href="<?php  the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php  the_title_attribute(); ?>"><?php  the_title(); ?></a></h2>
				<p class="byline"><small>by <?php  the_author() ?> </small></p>

				<div class="entry">
					<?php  the_content("Continue reading " . get_the_title('', '', false)); ?>
				</div>

				<div class="postmetadata"><?php  the_tags('Tags: ', ', ', '<br />'); ?> Posted in <span class="tiny-category"><?php  the_category(', ') ?></span> | <?php  edit_post_link('<span class="tiny-pencil">Edit</span>', '', ' | '); ?>  <span class="tiny-comments"><?php  comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?></span></div>
			</div>

		<?php  endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php  previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php  else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php  include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php  endif; ?>

		

<?php  get_sidebar(); ?>
<!-- end right div -->


<?php  get_footer(); ?>
