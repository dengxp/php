<?php  get_header(); ?>

<?php  include (TEMPLATEPATH . "/lsidebar.php"); ?> 

<div class="main">

<?php  if (have_posts()) : ?>

		<?php  while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php  the_ID(); ?>">

				<h1 class="posttitle"><a href="<?php  echo get_permalink($post->post_parent); ?>" rev="attachment"><?php  echo get_the_title($post->post_parent); ?></a> &raquo; <?php  the_title(); ?></h1>

<div class="navigation">

					<div class="alignleft"><?php  previous_image_link() ?></div>

					<div class="alignright"><?php  next_image_link() ?></div>

				</div>

<br clear="all"/>


				<div class="entry">

<p class="attachment"><a href="<?php  echo wp_get_attachment_url($post->ID); ?>"><?php  echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>

                <div class="caption"><?php  if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

	<?php  the_content(); ?>

				</div>

<br clear="all"/>

			</div>

		<?php  endwhile; ?>


	<?php  else : ?>


<h2 class="posttitle">Not Found</h2>

		<p>Sorry, but you are looking for something that isn't here.</p>

		<?php  include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php  endif; ?>

</div>

<?php  include (TEMPLATEPATH . "/rsidebar.php"); ?> 


<?php  get_footer(); ?>