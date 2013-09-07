<div class="sideleft sidebars">

<ul>

<?php  	/* Widgetized sidebar, if you have the plugin installed. */

					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(LeftSidebar) ) : ?>

<?php  wp_list_pages('title_li=<h2 class="sidebars">Pages</h2>' ); ?>

<?php  wp_list_categories('show_count=0&feed=RSS&title_li=<h2 class="lsidebartitle">Categories</h2>'); ?>

<li><h2 class="sidebars">Archives</h2>

				<ul class="sidebars">

				<?php  wp_get_archives('type=monthly'); ?>

				</ul></li>

<?php  /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>			

		<li><h2 class="sidebars">Links</h2>

                                <ul>

                   <?php  get_links(-1, '<li>', '</li>', ' - '); ?>

                                </ul></li>
<?php  } ?>

<?php  endif; ?>

</ul>

</div>