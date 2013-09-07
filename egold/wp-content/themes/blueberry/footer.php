
<hr />
<div id="footer" class="clear center">
	<h2>
	<a href="<?php  bloginfo('wpurl'); ?>/" title="<?php  bloginfo('name'); ?>" rel="home">
        <?php  bloginfo('name'); ?></a> &raquo;
	<?php  bloginfo('description'); ?>
	</h2>
	<p>
		<!-- Proudly Powered By WordPress -->
		<p id="wordpress">
            &lsaquo; <a href="http://wordpress.org/" title="Proudly Powered by WordPress" rel="friend">WP</a>owered &rsaquo;
        </p>    
   	    <a href="<?php  bloginfo('rss2_url'); ?>" title="Entried RSS Feed">Entries feed</a>
		and <a href="<?php  bloginfo('comments_rss2_url'); ?>" title="Comments RSS Feed">Comments feed</a>
		<br />A <a href="http://blueberryware.net/" rel="friend" title="Blueberry Theme">Blueberryware</a>
		theme &rsaquo; <?php  echo get_num_queries(); ?> queries in <?php  timer_stop(1); ?> seconds.
	</p>
</div><!-- #footer -->
</div><!-- #page -->
		<?php  wp_footer(); ?>
</body>
</html>