								</div> <!-- end .boxpadder -->
							</div> <!-- end .centerbox -->
						</div> <!-- end .center -->
						<div id="left" >

<?php  if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Navigation') ) : else : ?>
							<h2><?php  _e('Pages','mtsjourney'); ?></h2>
							<ul>
								<?php  wp_list_pages('title_li=' ); ?></ul>    

							<h2><?php  _e('Category',''); ?></h2>
							<ul><?php  wp_list_categories('sort_column=name&show_count=0&title_li='); ?>	</ul>
		
<?php  endif; ?>
						</div> <!-- end #left -->
						<br class="brclear" />
					</div> <!-- end .float-wrap -->
					<div id="sidebar"><!-- right column -->
<?php  if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>
						<div style="margin:30px 0 0 0 ;">
<?php  if (function_exists('get_search_form')) {  get_search_form(); 
}else { 
include (TEMPLATEPATH . '/searchform.php');} ?>
						</div>     
						<h2><?php  _e('Archive',''); ?></h2>
						<ul class="lavaLamp"><?php  wp_get_archives('type=monthly'); ?></ul>
						<h2><?php  _e('Tag Cloud','');?></h2>
						<?php  wp_tag_cloud('smallest=0.8&largest=2&unit=em'); ?>
						<h2><?php  _e('Blogroll',''); ?></h2>
						<ul><?php  wp_list_bookmarks('categorize=0&show_description=&title_before=&title_after&title_li=&category_before=&category_after='); ?></ul>
<?php  if (function_exists('wp_theme_switcher')) { ?>
						<h2><?php  _e('Themes'); ?></h2>
							<?php  wp_theme_switcher(); ?>
<?php  } ?>

<?php  endif; ?>	

					</div><!--sidebar end-->

<!--sidebar.php end-->
