<?php  get_header(); ?>

					<?php  if(!of_get_option('show_alexandria_slider_page') || of_get_option('show_alexandria_slider_page') == 'true') : ?>
					<?php  get_template_part( 'slider' ); ?>
                    <?php  endif; ?>
                    
                	<div class="r100 overflowauto content_section">
                    
                    	<div class="maxwidth overflowauto vpadding2">
                        
                        	<div class="w90 bpadding5p overflowauto">
                        
                                
                                    <div class="fouroh">
                                        <h2><?php  _e('Not Found!', 'alexandria') ?></h2>
                                        <p><?php  _e('You are looking for something that is not here. Please use the seach form below.', 'alexandria') ?></p>
                                        <div class="fourohsearch">
                                            <?php  get_search_form(); ?>
                                        </div>
                                    </div>
                                                            
                                				
                            </div>

                        </div>
                    
                    </div>
                    
<?php  get_footer(); ?>                    
