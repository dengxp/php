<?php  get_header(); ?>

	<div id="content" class="<?php  blueberry_sidebar(); ?>">

    <?php  if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
    
        <div class="navigation">
            <div class="alignleft"><?php  previous_post_link('&laquo; %link') ?></div>
            <div class="alignright"><?php  next_post_link('%link &raquo;') ?></div>
        </div>
        <div class="post" id="post-<?php  the_ID(); ?>">
            <h2><?php  the_title(); ?></h2>
            <div class="entry">
                <?php  
                    the_content('<p>Continue reading ' . the_title('', '', false) . ' &raquo;</p>'); 
                    wp_link_pages(
                    array('before' => '<p><strong>Pages:</strong> ', 
                          'after' => '</p>', 
                          'next_or_number' => 'number'
                          )
                    ); 
                ?>
            </div><!-- .entry -->
            <p class="postmeta center">
                <a href="<?php  the_permalink(); ?>" title="<?php  the_title(); ?>" rel="bookmark">
                <?php  the_title(); ?></a> was posted on <?php  the_time('l, F jS, Y') ?> at <?php  the_time() ?>.
                This post is tagged <?php  the_tags('', ', ', ''); ?> and is filed under <?php  the_category(', '); ?>.
                You can follow the replies through the <?php  post_comments_feed_link('comments feed'); ?>.
                <?php  blueberry_response(); ?>
            </p>
        </div><!-- .post #post-<?php  the_ID(); ?> -->
    
    <?php  } } else { ?>
        
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
        
    <?php  } ?>
    
	<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>

		

		

	<?php  comments_template(); ?>

	<?php  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php  endif; ?>

	</div>
<?php  if ( get_option('blueberry_sidebar') ) { get_sidebar(); } ?>
<?php  get_footer(); ?>
