<?php 
/**
* Attachments content actions
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0.5
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_attachment {

    function __construct () {
        add_action  ( '__attachment'			, array( $this , 'tc_content_attachment' ));
    }


    /**
     * The template part for displaying attachment content
     * Inspired from Twenty Twelve WP Theme
     * @package Customizr
     * @since Customizr 3.0
     */
    function tc_content_attachment() {
        global $post;
        ?>
        <header class="entry-header">

            <h1 class="entry-title"><?php  the_title(); ?></h1>

            <footer class="entry-meta">

                <?php 
                    $metadata = wp_get_attachment_metadata();
                    printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.' , 'customizr' ),
                        esc_attr( get_the_date( 'c' ) ),
                        esc_html( get_the_date() ),
                        esc_url( wp_get_attachment_url() ),
                        $metadata['width'],
                        $metadata['height'],
                        esc_url( get_permalink( $post->post_parent ) ),
                        esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
                        get_the_title( $post->post_parent )
                    );
                ?>

                <?php  edit_post_link( __( 'Edit' , 'customizr' ), '<span class="edit-link">' , '</span>' ); ?>

            </footer><!-- .entry-meta -->

            <nav id="image-navigation" class="navigation" role="navigation">

                <span class="previous-image"><?php  previous_image_link( false, __( '&larr; Previous' , 'customizr' ) ); ?></span>

                <span class="next-image"><?php  next_image_link( false, __( 'Next &rarr;' , 'customizr' ) ); ?></span>

            </nav><!-- #image-navigation -->

        </header><!-- .entry-header -->

        <div class="entry-content">

            <div class="entry-attachment">

                <div class="attachment">
                    <?php 

                    $attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit' , 'post_type' => 'attachment' , 'post_mime_type' => 'image' , 'order' => 'ASC' , 'orderby' => 'menu_order ID' ) ) );

                    //did we activate the fancy box in customizer?
                    $tc_fancybox = esc_attr(tc__f ( '__get_option' , 'tc_fancybox' ));

                    ?>
                    
                    <?php  if ( $tc_fancybox == 0 ) : //fancy box not checked! ?> 
                        
                        <?php 
                        /**
                        * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
                        * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
                        */

                        foreach ( $attachments as $k => $attachment )  {
                            if ( $attachment->ID == $post->ID ) {
                                break;
                            }
                        }

                        $k++;

                        // If there is more than 1 attachment in a gallery
                        if ( count( $attachments ) > 1 ) {

                            if ( isset( $attachments[ $k ] ) ) {
                                // get the URL of the next image attachment
                                $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                            }
                            
                            else {
                                // or get the URL of the first image attachment
                                $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                            }
                        }

                        else {
                            // or, if there's only 1 image, get the URL of the image
                            $next_attachment_url = wp_get_attachment_url();
                        }

                        ?>

                        <a href="<?php  echo esc_url( $next_attachment_url ); ?>" title="<?php  the_title_attribute(); ?>" rel="attachment"><?php 
                        $attachment_size = apply_filters( 'customizr_attachment_size' , array( 960, 960 ) );
                        echo wp_get_attachment_image( $post->ID, $attachment_size );
                        ?></a>
                    
                    <?php  else : // if fancybox option checked ?>
                        
                        <?php 
                        //get attachement src
                        $attachment_infos       = wp_get_attachment_image_src( $post->ID , 'large' );
                        $attachment_src         = $attachment_infos[0];
                        ?>

                        <a href="<?php  echo $attachment_src; ?>" title="<?php  the_title_attribute(); ?>" class="grouped_elements" rel="tc-fancybox-group<?php  echo $post -> ID ?>"><?php 
                        $attachment_size = apply_filters( 'customizr_attachment_size' , array( 960, 960 ) );
                        echo wp_get_attachment_image( $post->ID, $attachment_size );
                        ?></a>
                        
                        <div id="hidden-attachment-list" style="display:none">

                            <?php  foreach ( $attachments as $k => $attachment ) : //get all related galery attachement for lightbox navigation ?>

                                <?php 
                                $rel_attachment_infos       = wp_get_attachment_image_src( $attachment->ID , 'large' );
                                $rel_attachment_src         = $rel_attachment_infos[0];
                                ?>

                                <a href="<?php  echo $rel_attachment_src ; ?>" title="<?php  printf('%1$s', !empty( $attachment->post_excerpt ) ? $attachment->post_excerpt :  $attachment->post_title ) ?>" class="grouped_elements" rel="tc-fancybox-group<?php  echo $post -> ID ?>"><?php  echo $rel_attachment_src ; ?></a>
                                
                            <?php  endforeach ?>

                        </div><!--/#hidden-attachment-list-->

                    <?php  endif //end if fancybox option checked ?>

                    <?php  if ( ! empty( $post->post_excerpt ) ) : ?>

                        <div class="entry-caption">
                            <?php  the_excerpt(); ?>
                        </div>

                    <?php  endif; ?>

                </div><!-- .attachment -->

            </div><!-- .entry-attachment -->

        </div><!-- .entry-content -->
        <?php 
    }//end of function

}//end of class