<?php  get_sidebar(); ?>

<!-- begin footer -->
<div id="footer">

	<div class="f1">
		<a href="<?php  echo get_settings('home'); ?>">Home</a> | <a href="<?php  bloginfo('rss2_url'); ?>">Entries RSS</a> | <a href="<?php  bloginfo('comments_rss2_url'); ?>">Comments RSS</a>
	</div>
	<div class="f2">
		<strong><a href="<?php  bloginfo('url'); ?>"><?php  bloginfo('info'); ?></a> &copy; <?php  echo date("Y"); " " ?></strong> <br />
		<?php  bloginfo('name'); ?> powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a><br />
		Designed By <a href="http://blog.seonews2.com/">Yellow Blog</a>
		
	</div>
</div>
</div>

</body>
</html>