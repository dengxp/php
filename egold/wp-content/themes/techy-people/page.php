<?php  get_header(); ?>

<?php  include (TEMPLATEPATH . "/lsidebar.php"); ?> 

<div class="main">

<?php  if (have_posts()) : ?>

		<?php  while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php  the_ID(); ?>">

				<h1 class="posttitle"><?php  the_title(); ?></h1>


				<div class="entry">

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