
                	<div class="r100 overflowauto header_section">
                    
                    	<div class="maxwidth overflowauto vpadding5">
                    
                            <div class="r5090 maximg rfltlft rtxtaln">
									<?php  
                                        if( of_get_option('slider_one_image') ){
                                            echo '<img class="" src="'.esc_url( of_get_option('slider_one_image') ).'" />';
                                        }else {
                                            echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg.png"  />';
                                        }
                                    ?>                             
                            </div>
                            
                            <div class="r5090 rfltlft">
                            
                            	<div class="w867">
                            
                                    <h1 class="fontwhite bpadding40 h160tt22lm txtsdw000 rtxtaln">
										<?php  
                                            if( of_get_option('slider_one_headline') ){
                                                echo esc_html( of_get_option('slider_one_headline') );
                                            }else {
												_e('Responsive Business Theme',  'alexandria');
                                            }
                                        ?>                                    
                                    </h1>
                                    <p class="fontwhite bpadding40 rtxtaln">
										<?php  
                                            if( of_get_option('slider_one_text') ){
                                                echo esc_html( of_get_option('slider_one_text') );
                                            }else {
                                                _e('You can change this text in Slider One settings tab of theme options page. Write something awesome to make your website ridiculously fabulous.',  'alexandria');
                                            }
                                        ?>                                    
                                    </p>
                                    <p class="rtxtaln bpadding40 fontwht">
                                    	<a href="<?php  if( of_get_option('slider_one_cta_link') ){ echo esc_url( of_get_option('slider_one_cta_link') );}else { echo '#';}?>" class="bg333437 brdbtm4000 rbg51550 h324tt22lr">
											<?php  
                                                if( of_get_option('slider_one_cta') ){
                                                    echo esc_attr( of_get_option('slider_one_cta') );
                                                }else {
													_e('Continue Reading',  'alexandria');
                                                }
                                            ?>
                                        </a>
                                    </p>
                                    
                                </div>
                            
                            </div> 
                            
                        </div>                    
                                        
                    </div>