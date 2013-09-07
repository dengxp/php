<?php  get_header(); ?>

					<?php  if(!of_get_option('show_alexandria_slider_page') || of_get_option('show_alexandria_slider_page') == 'true') : ?>
					<?php  get_template_part( 'slider' ); ?>
                    <?php  endif; ?>
                    
                	<div class="r100 overflowauto content_section">
                    
                    	<div class="maxwidth overflowauto vpadding5">
                        
                            
							<?php  if (have_posts()) : ?>
							<?php  while (have_posts()) : the_post(); ?>                                                  
                        
                        	<div <?php  $pageclass= array('w90', 'bpadding5p', 'overflowauto' ); post_class( $pageclass ); ?> id="post-<?php  the_ID(); ?>">
                        
                                <h1 class="h148sspr bpadding20 brdbtm1E4E6E9"><?php  the_title(); ?></h1>
                                
								<div class="r100">
                                
									<div class="entry vmargint20">
										
										<?php  the_content(__('<span>Continue Reading >></span>', 'alexandria')); ?>
                                        
										
                                        <div class="clear"></div>
                                                            
										
                                        <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'alexandria' ) . '</span>', 'after' => '</div>' ) ); ?>	
                                        
                                                            														
									</div>
                                    

                                    
                                                                      
                                                            
                                </div>	
                                
                                
								<?php  comments_template(); ?>
                                
                                
								<?php  endwhile; ?>
								<?php  endif; ?>                                 				
                                
                            </div>

                            
                            

                        
                        </div>
                    
                    </div>
                    
<?php  get_footer(); ?>                    
