	function tc_display_head() {
	?>
		<head>
		    <meta charset="<?php bloginfo( 'charset' ); ?>" />
		    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
		    <title><?php wp_title( '|' , true, 'right' ); ?></title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <link rel="profile" href="http://gmpg.org/xfn/11" />
		    <?php	 	
		      /* We add some JavaScript to pages with the comment form
		       * to support sites with threaded comments (when in use).
		       */
		      if ( is_singular() && get_option( 'thread_comments' ) )
		        wp_enqueue_script( 'comment-reply' );
		    ?>

		  <!-- Favicon -->
		    <?php do_action( '__favicon' ); ?>
		    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		   
		   <!-- Icons font support for IE6-7 -->
		    <!--[if lt IE 8]>
		      <script src="<?php echo TC_BASE_URL ?>inc/css/fonts/lte-ie7.js"></script>
		    <![endif]-->
		    <?php	 	
		      /* Always have wp_head() just before the closing </head>
		       * tag of your theme, or you will break many plugins, which
		       * generally use this hook to add elements to <head> such
		       * as styles, scripts, and meta tags.
		       */
		      wp_head();
		    ?>
		</head>
		<?php	 	
	}