<?php  get_header(); ?>

	<div id="content" class="narrowcolumn">
        
        <?php  if ( have_posts() ) { while( have_posts() ) { the_post(); ?>
            
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
        </div><!-- .post #post-<?php  the_ID(); ?> -->
            
        <?php  } } else { ?>
        
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
        
        <?php  } ?>
        
	</div><!-- #content -->

<?php  get_sidebar(); ?>

<?php  get_footer(); ?>