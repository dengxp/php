                	<div class="r100 overflowauto content_section">
                    
                    	<div class="maxwidth overflowauto vpadding5">
                        
                        <div class="r66100 floatleft bpadding5p">
                        
                        	<div class="w90 bpadding5p overflowauto">
                        
                                <h1 class="rtxtaln h148sspr bpadding20">
                                <?php  
									if( of_get_option('biztwo_welcome_headline') ){
										echo esc_html( of_get_option('biztwo_welcome_headline') );
									}else {
										_e('Welcome Headline Comes Here',  'alexandria');
									}
								?>
                                </h1>
                                <p>
                                <?php  
									if( of_get_option('biztwo_welcome_text') ){
										echo esc_html( of_get_option('biztwo_welcome_text') );
									}else {
										_e('You can change this text in welcome text box of welcome section block in Biz one tab of theme options page. You can change this text in welcome text box of welcome section block in Biz two tab of theme options page.',  'alexandria');
									}
								?>                                
                                </p>
                                
                            </div>
                            
                        	<div class="w90 bpadding5p overflowauto">
                        
								<div class="r100 overflowauto vpadding5">
                                
                                    <div class="r40100 maximg rfltlft rtxtaln bge4e6e9">
									<a class="displayblock" href="<?php  if( of_get_option('biztwo_left_section_link') ){ echo esc_url( of_get_option('biztwo_left_section_link') );}else { echo '#';}?>">
									<?php  
                                        if( of_get_option('biztwo_left_section_image') ){
                                            echo '<img class="" src="'.esc_url( of_get_option('biztwo_left_section_image') ).'" />';
                                        }else {
                                            echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                        }
                                    ?>                                    
                                    </a>    
                                    </div>

                                    <div class="r60100 maximg rfltlft rtxtaln">
                                        
                                        <div class="w867">
                                        
                                        <p class="h336tt22lr bpadding20">
											<a href="<?php  if( of_get_option('biztwo_left_section_link') ){ echo esc_url( of_get_option('biztwo_left_section_link') );}else { echo '#';}?>">
											<?php  
                                                if( of_get_option('biztwo_left_section_headline') ){
                                                    echo esc_html( of_get_option('biztwo_left_section_headline') );
                                                }else {
													_e('Design',  'alexandria');
                                                }
                                            ?> 
                                            </a>                                       
                                        </p>
                                        <p>
											<?php  
                                                if( of_get_option('biztwo_left_section_text') ){
                                                    echo esc_html( of_get_option('biztwo_left_section_text') );
                                                }else {
                                                    _e('You can change this text in description box of left section block in Biz two tab of theme options page.',  'alexandria');
                                                }
                                            ?>                                         
                                        </p>
                                        
                                        </div>
                                        
                                    </div>                                                                    
                                
                                </div>
                                
								<div class="r100 overflowauto vpadding5">
                                
                                    <div class="r40100 maximg rfltlft rtxtaln bge4e6e9">
                                    <a class="displayblock" href="<?php  if( of_get_option('biztwo_center_section_link') ){ echo esc_url( of_get_option('biztwo_center_section_link') );}else { echo '#';}?>">
									<?php  
                                        if( of_get_option('biztwo_center_section_image') ){
                                            echo '<img class="" src="'.esc_url( of_get_option('biztwo_center_section_image') ).'" />';
                                        }else {
                                            echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                        }
                                    ?>
                                    </a> 
                                    </div>

                                    <div class="r60100 maximg rfltlft rtxtaln">
                                    
                                    <div class="w867">
                                    
                                        <p class="h336tt22lr bpadding20">
											<a href="<?php  if( of_get_option('biztwo_center_section_link') ){ echo esc_url( of_get_option('biztwo_center_section_link') );}else { echo '#';}?>">
											<?php  
                                                if( of_get_option('biztwo_center_section_headline') ){
                                                    echo esc_html( of_get_option('biztwo_center_section_headline') );
                                                }else {
													_e('Development',  'alexandria');
                                                }
                                            ?>
                                            </a>                                       
                                        </p>
                                        <p>
											<?php  
                                                if( of_get_option('biztwo_center_section_text') ){
                                                    echo esc_html( of_get_option('biztwo_center_section_text') );
                                                }else {
                                                    _e('You can change this text in description box of center section block in Biz two tab of theme options page.',  'alexandria');
                                                }
                                            ?>                                         
                                        </p>
                                        
                                    </div>
                                    
                                    </div>                                 
                                
                                </div>
                                
								<div class="r100 overflowauto vpadding5">
                                
                                    <div class="r40100 maximg rfltlft rtxtaln bge4e6e9">
									<a class="displayblock" href="<?php  if( of_get_option('biztwo_right_section_link') ){ echo esc_url( of_get_option('biztwo_right_section_link') );}else { echo '#';}?>">
									<?php  
                                        if( of_get_option('biztwo_right_section_image') ){
                                            echo '<img class="" src="'.esc_url( of_get_option('biztwo_right_section_image') ).'" />';
                                        }else {
                                            echo '<img class="" src="'.get_stylesheet_directory_uri().'/images/fetimg2.png"  />';
                                        }
                                    ?>
                                    </a>
                                    </div>

                                    <div class="r60100 maximg rfltlft rtxtaln">
                                    
                                    <div class="w867">
                                    
                                        <p class="h336tt22lr bpadding20">
											<a href="<?php  if( of_get_option('biztwo_right_section_link') ){ echo esc_url( of_get_option('biztwo_right_section_link') );}else { echo '#';}?>">
											<?php  
                                                if( of_get_option('biztwo_right_section_headline') ){
                                                    echo esc_html( of_get_option('biztwo_right_section_headline') );
                                                }else {
													_e('Marketing',  'alexandria');
                                                }
                                            ?>
                                            </a>                                        
                                        </p>
                                        <p>
											<?php  
                                                if( of_get_option('biztwo_right_section_text') ){
                                                    echo esc_html( of_get_option('biztwo_right_section_text') );
                                                }else {
                                                    _e('You can change this text in description box of right section block in Biz two tab of theme options page.',  'alexandria');
                                                }
                                            ?>                                         
                                        </p>
                                        
                                    </div>
                                    
                                    </div>                                 
                                
                                </div>                                                                
                                
                            </div> 
                            
                            <?php  if( !of_get_option('show_alexandria_quote_biztwo') || of_get_option('show_alexandria_quote_biztwo') == 'true' ) : ?>
                        	<div class="w90 overflowauto brdr1e4e7e9">
                            
                            	<div class="quote">
                        
                                		<p class="bpadding10">
											<?php  
                                                if( of_get_option('biztwo_quote_section_text') ){
                                                    echo esc_html( of_get_option('biztwo_quote_section_text') );
                                                }else {
                                                    _e('You can change this text in quote box of quote section block in Biz two tab of theme options page. You can change this text in quote box of quote section block in Biz two tab of theme options page.',  'alexandria');
                                                }
                                            ?>                                         
                                        </p>
                                        
                                		<p class="quotenm rbg5550 bge4e6e9">
											<?php  
                                                if( of_get_option('biztwo_quote_section_name') ){
                                                    echo esc_attr( of_get_option('biztwo_quote_section_name') );
                                                }else {
													_e('Mac Taylor',  'alexandria');
                                                }
                                            ?>                                         
                                        </p>                                        
                                
                            	</div> 
                            
                            </div>
                            <?php  endif; ?>                                                      
                        
                        </div>
                        
                        <div class="r30100 floatleft overflowauto">
                        
                            <div class="w90 ht300 bge4e6e9 rbgb5 overflowauto">
                            
                                <div class="r100 vpadding15px rbgt5 dark10p bmargin20px">
                                    <p class="h336tt22lr w867">Portfolio</p>
                                </div>
                                
                                <?php  if( of_get_option('biztwo_port_one_image') ) : ?>
                                <div class="r100 bpadding10">
                                
                                    <p class="h336tt22lr w867 maximg"><img src="<?php  echo esc_url( of_get_option('biztwo_port_one_image') ); ?>" /></p>
                                    
                                    <?php  if( of_get_option('biztwo_port_one_name') ) : ?>
                                    <p class="w867 txtcntr vpadding10px">
                                        <?php  if( of_get_option('biztwo_port_one_link') ) : ?>
                                        <a href="<?php  echo esc_url( of_get_option('biztwo_port_one_link') ); ?>">
                                            <?php  echo esc_attr( of_get_option('biztwo_port_one_name') ); ?>
                                        </a>
                                        <?php  else : ?>
                                            <?php  echo esc_attr( of_get_option('biztwo_port_one_name') ); ?>
                                        <?php  endif; ?>
                                    </p>
                                    <?php  endif; ?>
                                        
                                </div>
                                <?php  endif; ?> 
                                
                                <?php  if( of_get_option('biztwo_port_two_image') ) : ?>
                                <div class="r100 bpadding10">
                                
                                    <p class="h336tt22lr w867 maximg"><img src="<?php  echo esc_url( of_get_option('biztwo_port_two_image') ); ?>" /></p>
                                    
                                    <?php  if( of_get_option('biztwo_port_two_name') ) : ?>
                                    <p class="w867 txtcntr vpadding10px">
                                        <?php  if( of_get_option('biztwo_port_two_link') ) : ?>
                                        <a href="<?php  echo esc_url( of_get_option('biztwo_port_two_link') ); ?>">
                                            <?php  echo esc_attr( of_get_option('biztwo_port_two_name') ); ?>
                                        </a>
                                        <?php  else : ?>
                                            <?php  echo esc_attr( of_get_option('biztwo_port_two_name') ); ?>
                                        <?php  endif; ?>
                                    </p>
                                    <?php  endif; ?>
                                        
                                </div>
                                <?php  endif; ?>
                                
                                <?php  if( of_get_option('biztwo_port_three_image') ) : ?>
                                <div class="r100 bpadding10">
                                
                                    <p class="h336tt22lr w867 maximg"><img src="<?php  echo esc_url( of_get_option('biztwo_port_three_image') ); ?>" /></p>
                                    
                                    <?php  if( of_get_option('biztwo_port_three_name') ) : ?>
                                    <p class="w867 txtcntr vpadding10px">
                                        <?php  if( of_get_option('biztwo_port_three_link') ) : ?>
                                        <a href="<?php  echo esc_url( of_get_option('biztwo_port_three_link') ); ?>">
                                            <?php  echo esc_attr( of_get_option('biztwo_port_three_name') ); ?>
                                        </a>
                                        <?php  else : ?>
                                            <?php  echo esc_attr( of_get_option('biztwo_port_three_name') ); ?>
                                        <?php  endif; ?>
                                    </p>
                                    <?php  endif; ?>
                                        
                                </div>
                                <?php  endif; ?>
                                
                                <?php  if( of_get_option('biztwo_port_four_image') ) : ?>
                                <div class="r100 bpadding10">
                                
                                    <p class="h336tt22lr w867 maximg"><img src="<?php  echo esc_url( of_get_option('biztwo_port_four_image') ); ?>" /></p>
                                    
                                    <?php  if( of_get_option('biztwo_port_four_name') ) : ?>
                                    <p class="w867 txtcntr vpadding10px">
                                        <?php  if( of_get_option('biztwo_port_four_link') ) : ?>
                                        <a href="<?php  echo esc_url( of_get_option('biztwo_port_four_link') ); ?>">
                                            <?php  echo esc_attr( of_get_option('biztwo_port_four_name') ); ?>
                                        </a>
                                        <?php  else : ?>
                                            <?php  echo esc_attr( of_get_option('biztwo_port_four_name') ); ?>
                                        <?php  endif; ?>
                                    </p>
                                    <?php  endif; ?>
                                        
                                </div>
                                <?php  endif; ?>                                                                                    
                            
                            </div>
                        
                        </div>
                        
                        </div>
                    
                    </div>