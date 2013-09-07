<?php  get_header(); ?>

					<?php  if(!of_get_option('show_alexandria_slider_single') || of_get_option('show_alexandria_slider_single') == 'true') : ?>
					<?php  get_template_part( 'slider' ); ?>
                    <?php  endif; ?>
                    
                	<div class="r100 overflowauto content_section">
                    
                    	<div class="maxwidth overflowauto vpadding5">
                        
                        	<div class="r66100 floatleft">
                            
							<?php  if (have_posts()) : ?>
							<?php  while (have_posts()) : the_post(); ?>                                                  
                        
                        	
                            <div <?php  $pageclass= array('w90', 'bpadding5p', 'overflowauto' ); post_class( $pageclass ); ?> id="post-<?php  the_ID(); ?>">
                        
                                <h1 class="h148sspr bpadding20 brdbtm1E4E6E9"><?php  the_title(); ?></h1>
                                
                                <div class="r100">
                                
                                                     <?php  if(of_get_option('show_featured_image_single') == 'true' && has_post_thumbnail() ) : ?>
                                                     	
                                                        <div class="r100 maximg vmargintb10">
															<?php  the_post_thumbnail( 'alexandriasingle' ); ?>
                                                        </div>
                                                        
                                                     <?php  endif; ?>
													 
													 <?php  if ( function_exists('the_ratings') && (!of_get_option('show_rat_on_single') || of_get_option('show_rat_on_single') == 'true')) : ?>
                                                    <div class="actual_post_ratings r100 brdbtm1E4E6E9 vpadding10px">
                                                    	<?php  the_ratings(); ?>
													</div>   
                                                    <?php  endif; ?>
                                                    
                                                    <?php  if (!of_get_option('show_pd_on_single') || of_get_option('show_pd_on_single') == 'true') : ?>                                                                                                      
													<div class="actual_post_author r100 brdbtm1E4E6E9 vpadding10px">
														<div class="actual_post_posted w867"><?php  _e('Posted by : ','alexandria'); ?><span class="bold"><?php  the_author() ?></span> <?php  _e(' On : ','alexandria'); ?> <span class="bold"><?php  the_time(get_option( 'date_format' )) ?></span></div>
													</div>
                                                    <?php  endif; ?>
                                                    
                                					<?php  if(!of_get_option('show_cats_on_single') || of_get_option('show_cats_on_single') == 'true') : ?>                                                                              
													<div class="metadata r100 brdbtm1E4E6E9 vpadding10px overflowauto">
														<p class="r100 overflowauto">
															<span class="label"><?php  _e('Category:', 'alexandria') ?></span>
															<span class="text"><?php  the_category(', ') ?></span>
														</p>
														<?php  the_tags('<p class="r100 overflowauto"><span class="label">'.__('Tags:','alexandria').'</span><span class="text">', ', ', '</span></p>'); ?>
														
													</div><!-- /metadata -->
                                                    <?php  endif; ?>                                
                                
                                
                                </div>
                                
								<div class="r100">
                                
									<div class="entry vmargint20">
										
										<?php  the_content(__('<span>Continue Reading >></span>', 'alexandria')); ?>
                                        
										
                                        <div class="clear"></div>
                                                            
										
                                        <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages: ', 'alexandria' ) . '</span>', 'after' => '</div>' ) ); ?>	
                                        
                                        <?php  
																
																if (is_attachment()){ 
																	echo '<p class="alexandria_prev_img_attch">';
																	previous_image_link( false, '&#171; '.__('Previous Image' , 'alexandria').'' ); 
																	echo '</p>';
																}  
										
										?> 
                                        
                                        <?php  
																
																if (is_attachment()){ 
																	echo '<p class="alexandria_prev_img_attch">';
																	next_image_link( false, ''.__('Next Image' , 'alexandria').' &#187;' );
																	echo '</p>'; 
																}
										
										?>
                                                            														
									</div>
                                    
                                    <?php  if(!of_get_option('show_np_box') || of_get_option('show_np_box')=='true') : ?>
                                    <!-- Next/prev post starts here --> 
                                    <div class="r100 vmargint20 bge4e6e9 rbg5"> 
                                    <div class="single_np">
                                                    
                                                    	

                                                            
                                                          	<?php  
																
																previous_post_link('<div class="single_np_prev"><p class="single_np_prev_np">'.__('Previous Post' , 'alexandria').'</p><p> %link</p></div>');
																
															?>                                                            
                                                            
                                                        
                                                        
                                                    	

                                                          	<?php  
																
																next_post_link('<div class="single_np_next"><p class="single_np_next_np">'.__('Next Post' , 'alexandria').'</span></p><p> %link</p></div>');
																
															?>                                                             
                                                                                                                
                                                    
                                    </div> 
                                    </div>                                                   
                                    <!-- Next/prev post ends here --> 
                                    <?php  endif; ?>
                                    
                                                                      
                                                            
                                </div>	
                                
								<?php  comments_template(); ?>
                                
								<?php  endwhile; ?>
								<?php  endif; ?>                                 				
                                
                            </div>

                            
                            </div>
                            
                            <!-- Sidebar starts here -->
							<?php  get_sidebar(); ?> 
                            <!-- Sidebar ends here -->
                        
                        </div>
                    
                    </div>
                    
<?php  get_footer(); ?>                    
