<?php  get_header(); ?>

<?php  include (TEMPLATEPATH . "/lsidebar.php"); ?> 

<div class="main">

<?php  if (have_posts()) : ?>

 <?php  $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php  /* If this is a category archive */ if (is_category()) { ?>
		
<h3 class="posttitle">Archive for the &#8216;<?php  single_cat_title(); ?>&#8217; Category</h3>
 	  <?php  /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h3 class="posttitle">Posts Tagged &#8216;<?php  single_tag_title(); ?>&#8217;</h3>
 	  <?php  /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="posttitle">Archive for <?php  the_time('F jS, Y'); ?></h3>
 	  <?php  /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="posttitle">Archive for <?php  the_time('F, Y'); ?></h3>
 	  <?php  /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="posttitle">Archive for <?php  the_time('Y'); ?></h3>
	  <?php  /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="posttitle">Author Archive</h3>
 	  <?php  /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

		<h3 class="posttitle">Blog Archives</h3>

 	  <?php  } ?>


		<?php  while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php  the_ID(); ?>">

				<h2 class="posttitle"><a href="<?php  the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php  the_title_attribute(); ?>"><?php  the_title(); ?></a></h2>

<p class="postmetadata"><?php  the_time('F j, Y') ?> in <?php  the_category(', ') ?><br /> <?php  the_tags('Tags: ', ', ', ''); ?> | <?php  comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php  edit_post_link('Edit', '', ''); ?></p>

				<div class="entry">

	<?php  the_excerpt(); ?>

				</div>

<br clear="all"/>

			</div>

		<?php  endwhile; ?>


		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link('Next Page &raquo;') ?></div>
			<div class="alignright"><?php  previous_posts_link('&laquo; Back') ?></div>
		</div>

<br clear="all"/>

	<?php  else : ?>


<h2 class="posttitle">Not Found</h2>

<p>Sorry, but you are looking for something that isn't here.</p>


		<?php  include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php  endif; ?>

</div>

<?php  include (TEMPLATEPATH . "/rsidebar.php"); ?> 


<?php  get_footer(); ?>