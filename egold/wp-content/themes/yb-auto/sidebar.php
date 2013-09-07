<!-- begin sidebar -->
<div id="left">
	<div class="p">
		<h2>Pages</h2>
		<ul>
			<?php  wp_list_pages('title_li=0' ); ?>
		</ul>
	</div>
	<div class="p">
		<h2>Categories</h2>
		<ul>
			<?php  wp_list_categories('sortby=name&show_count=0&title_li=0'); ?>	
		</ul>
	</div>
	<div class="p">
		<h2>Archives</h2>
		<ul>
			<?php  wp_get_archives('type=monthly&format=other&before=<li>&after=</li>&title_li=0'); ?>		</ul>
	</div>
	<div class="p">
		<h2>Blogroll</h2>
		<ul>
			<?php  wp_list_bookmarks('categorize=0&title_li'); ?>
		</ul>
	</div>
	
	<div class="p">
		<h2>Meta</h2>
		<ul>
		<?php  wp_register('<li>', '</li>'); ?>
<li><?php  wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		<?php  wp_meta(); ?>
		</ul>
	</div>	
	
</div>			
<!-- end sidebar -->