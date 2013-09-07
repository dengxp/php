<?php  get_header(); ?>

<?php  include (TEMPLATEPATH . "/lsidebar.php"); ?> 

<div class="main">

<?php  if (have_posts()) : ?>

		<?php  while (have_posts()) : the_post(); ?>

<div class="navigation">

			<div class="alignleft">&nbsp;</div>

			<div class="alignright">&nbsp;</div>

		</div>

<br clear="all" />

<?php  $attachment_link = get_the_attachment_link($post->ID, true, array(468, 800)); // This also populates the iconsize for the next line ?>

<?php  $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>

			<div class="post" id="post-<?php  the_ID(); ?>">

				<h1 class="posttitle"><a href="<?php  echo get_permalink($post->post_parent); ?>" rev="attachment"><?php  echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php  echo get_permalink() ?>" rel="bookmark" title="Permanent Link to: <?php  the_title(); ?>"><?php  the_title(); ?></a></h1>

				<div class="entry">

p class="<?php  echo $classname; ?>"><?php  echo $attachment_link; ?><br /><?php  echo basename($post->guid); ?></p>

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