<?php  get_header(); ?>

	<div id="content" class="narrowcolumn">

    <?php  if ( have_posts() ) { ?>
    <?php  while ( have_posts() ) { the_post(); ?>
    
        <div class="post" id="post-<?php  the_ID(); ?>">
        
        </div>
    
    <?php  } } else { ?>
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>    
    <?php  } ?> 
    
	<?php  if (have_posts()) : ?>
	
		<?php  while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php  the_ID(); ?>">
				<h2 class="archive-title"><a href="<?php  the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php  the_title_attribute(); ?>"><?php  the_title(); ?></a></h2>
				<small class="postmeta">Posted on <?php  the_time('m/d/y') ?> by <?php  the_author() ?>
				<?php  edit_post_link('Edit Post', ' | ', ''); ?></small>

				<div class="entry">
					<?php  the_content('Continue reading ' . get_the_title() . '...'); ?>
				</div>
				<?php  comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>

				<p class="postmetadata"><?php  the_tags('Tags: ', ', ', '<br />'); ?> Categories: <?php  the_category(', ') ?> 
			    </p>
			</div>

		<?php  endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php  previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php  else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php  include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php  endif; ?>

	</div>

<?php  get_sidebar(); ?>

<?php  get_footer(); ?>
