<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php  language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php  bloginfo('html_type'); ?>; charset=<?php  bloginfo('charset'); ?>" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title><?php  wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="stylesheet" href="<?php  echo get_stylesheet_uri(); ?> " type="text/css" media="all" />
	<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />


    
	<?php  wp_head(); ?>
</head>

<body <?php  body_class(); ?>>

	<!-- Wrapper one starts here -->
	<div id="wrapper_one">
    
    	<!-- Wrapper two starts here -->
    	<div id="wrapper_two">
        
            <!-- Wrapper three starts here -->
            <div id="wrapper_three">
            
                <!-- Wrapper four starts here -->
                <div id="wrapper_four">
                

                        
                    <?php  if( !of_get_option('logo_layout_style') || of_get_option('logo_layout_style') == 'sbys' ) : ?>
                        
                	<div class="r100 overflowauto logo_section">
                    
                    	<div class="maxwidth overflowauto vpadding2">                        
                    
                            <!-- Logo Section starts here -->
                            <div class="r50100 maximg rfltlft">
                            
                                <div class="w867m rtxtaln maximg">
                                
                                	<?php  if( of_get_option('logo_image') ) : ?>
                                		<a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><img src="<?php  echo of_get_option('logo_image'); ?>" /></a>
                                	<?php  else : ?>
                                    <p class="logo fontwht"><a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><?php  bloginfo('name'); ?></a></p>
                                    <p class="fontwhite"><?php  bloginfo('description'); ?></p>                            
                                	<?php  endif; ?>
                                    
                                </div>
                            
                            </div>
                            <!-- Logo Section ends here -->
                            
                            <!-- Menu Section starts here -->
                            <div class="r50100 rfltlft">
                            
                            	<div class="w867m rtxtaln overflowauto vmargint15">
                                    
                                    <div id="menu">
                                        <?php  wp_nav_menu( array( 'theme_location' => 'mainmenu', 'depth' => 1, 'menu_class' => 'dropdown dropdown-horizontal','fallback_cb'     => 'alexandria_backupmenu', 'menu_id'=>'Main_nav', 'container'=>'') ); ?>			
                                    </div>                             

                                </div>                                                               
                            
                            </div>  
                            <!-- Menu Section ends here -->
                            
                        </div>                     

                    </div>                              
                            
                    <?php  else : ?>
                        
                	<div class="r100 overflowauto logo_section">
                    
                    	<div class="maxwidth overflowauto">
                                                
                            <!-- Logo Section starts here -->
                            <div class="r100 maximg vpadding3">
                            
                                <div class="w867m txtcntr maximg">
                                    
                                	<?php  if( of_get_option('logo_image') ) : ?>
                                		<a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><img src="<?php  echo of_get_option('logo_image'); ?>" /></a>
                                	<?php  else : ?>
                                    <p class="logo fontwht"><a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><?php  bloginfo('name'); ?></a></p>
                                    <p class="fontwhite"><?php  bloginfo('description'); ?></p>                            
                                	<?php  endif; ?>                                                               
                                
                                </div>
                            
                            </div>
                            <!-- Logo Section ends here -->
                            
                            <!-- Menu Section starts here -->
                            <div class="r100 rfltlft">
                            
                            	<div class="w867m overflowauto txtcntr vpadding15px rbrdrtop000 bmargin5px">
                            
                                    <div class="ta_menu">
                                        <?php  wp_nav_menu( array( 'theme_location' => 'mainmenu', 'depth' => 1, 'menu_class' => 'dropdown dropdown-horizontal','fallback_cb'     => 'alexandria_backupmenu', 'menu_id'=>'Main_nav', 'container'=>'') ); ?>			
                                    </div> 
                                    
                                </div>                                                               
                            
                            </div>  
                            <!-- Menu Section ends here -->                        
                        
                        </div>                     

                    </div>                         
                    
					<?php  endif; ?> 
                            
                                   