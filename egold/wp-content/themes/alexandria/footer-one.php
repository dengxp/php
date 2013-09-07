                        		<!-- Footer logo section starts here -->
								<div class="r40100 floatleft vpadding5">
                                
                                	<div class="w867m rtxtaln">
                                    
                                    	<h3 class="flogo fontgreyf"><a href="<?php  echo esc_url( home_url( '/' ) ); ?>"><?php  bloginfo('name'); ?></a></h3>
                                        <p class="fontgreyf bmargin5px"><?php  _e('&copy; All rights reserved.', 'alexandria') ?></p>
                                                        <?php  if( is_home() || is_front_page() ): ?>
                                                        <p class="fontgreyf bmargin5px">
															<?php  _e('Powered by ', 'alexandria') ?><a href="http://www.wordpress.org/"><?php  _e('WordPress', 'alexandria') ?></a> </p> 
                                                        <p class="fontgreyf bmargin5px"><?php  _e('Designed by ', 'alexandria') ?><a href="http://www.themealley.com/"><?php  _e('ThemeAlley.Com', 'alexandria') ?></a>
                                                        </p>
                                                        <?php  else: ?>
                                                        <p class="fontgreyf bmargin5px">
															<?php  _e('Powered by ', 'alexandria') ?><a href="http://www.wordpress.org/"><?php  _e('WordPress', 'alexandria') ?></a>
                                                        </p>                                                        
														<?php  endif;?>                                      
                                        <div class="r100 vpadding2 flogos"><?php  get_search_form(); ?></div>
                                    
                                    </div>
                                
                                </div>
                                
                                <!-- Footer left widget starts here -->
								<div class="r20100 floatleft vpadding5">
                                
                                	<div class="w867m">
                                        
										<?php  if ( dynamic_sidebar('footer-left') ){
                                                                                } else { ?>
                                                                                
                                                <div class="sidebar_widget">
                                                
                                                    <div class="widget">
                                                        
                                                        <h3 class="widgettitle"><?php  _e('Archives', 'alexandria') ?></h3>
                                                        <ul>
                                                            <?php  wp_get_archives('type=monthly'); ?>
                                                        </ul>
                                                
                                                    </div>
                                                    
                                                </div>
                                                                                
                                        <?php  } ?>                                         
                                        			
                                    </div>                                                                                                                                                  
                                </div> 
                                
                                <!-- Footer center widget starts here -->
								<div class="r20100 floatleft vpadding5">
                                
                                	<div class="w867m">
                                    
										<?php  if ( dynamic_sidebar('footer-center') ){
                                                                                } else { ?>
                                                                                
                                                <div class="sidebar_widget">
                                                
                                                    <div class="widget">
                                                        
                                                        <h3 class="widgettitle"><?php  _e('Authors', 'alexandria') ?></h3>
                                                        <ul>
                                                             <?php  wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC&number=3'); ?> 
                                                        </ul>
                                                
                                                    </div>
                                                    
                                                </div>
                                                                                
                                        <?php  } ?>                                         
                                        
                                        			
                                    </div>                                
                                
                                </div> 
                                
                                <!-- Footer right widget starts here -->
								<div class="r20100 floatleft vpadding5">
                                
                                	<div class="w867m">
                                    
										<?php  if ( dynamic_sidebar('footer-right') ){
                                                                                } else { ?>
                                                                                
                                                <div class="sidebar_widget">
                                                
                                                    <div class="widget">
                                                        
                                                        <h3 class="widgettitle"><?php  _e('Pages', 'alexandria') ?></h3>
                                                        <ul>
                                                            <?php  wp_list_pages('title_li='); ?>
                                                        </ul>
                                                
                                                    </div>
                                                    
                                                </div>
                                                                                
                                        <?php  } ?>                                         
                                        			
                                    </div>                                
                                
                                </div>
                                <!-- Footer right widget ends here -->