<div class="sideright sidebars">



<ul>

<?php  	/* Widgetized sidebar, if you have the plugin installed. */



					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(RightSidebar) ) : ?>



<?php  wp_list_pages('title_li=<h2 class="sidebars">Pages</h2>' ); ?>



<?php  wp_list_categories('show_count=0&feed=RSS&title_li=<h2 class="lsidebartitle">Categories</h2>'); ?>



<li><h2 class="sidebars">Archives</h2>



				<ul>



				<?php  wp_get_archives('type=monthly'); ?>



				</ul>

			</li>



<?php  /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>



                                <li><h2 class="sidebars">Meta</h2>



				<ul>



					<?php  wp_register(); ?>



					<li><?php  wp_loginout(); ?></li>



					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>



					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>



					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>					



				</ul>



                                </li>			



				<li><h2 class="sidebars">Links</h2>



                                <ul>



                   <?php  get_links(-1, '<li>', '</li>', ' - '); ?>



                                </ul></li>



<?php  } ?>



<?php  endif; ?>



</ul>



</div>