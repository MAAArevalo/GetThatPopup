<?php
/**
 * @package AAGetThatPopup
*/

class Aagtp_adminfields{
    
    //Register metabox
    function fields_block(){
        add_meta_box(
          'aagtp_box_fields',            // Unique ID
          'Popup Settings',      // Title
          [$this, 'meta_box_html'],          // Function to display fields
          'aagtp'   // Post type
        );
    }

    //Meta Fields
    function meta_box_html($post){
        wp_nonce_field('aagtp_save_meta_box', 'aagtp_meta_box_nonce');
        /**
         * Popup General Settings
         */
        //button
        $gen_ButtonText = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_text', true ) );
        $gen_ButtonWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_width', true ) );
        $gen_ButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_text_color', true ) );
        $gen_ButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_back_color', true ) );

        //button hover
        $gen_HoverButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_back_hover_color', true ) );
        $gen_HoverButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_text_hover_color', true ) );

        //image
        $gen_ImagePosition = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_position', true ) );
        $gen_ImageUrl = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_url', true ) );
        $gen_ImageSize = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_size', true ) );

        //popup
        $gen_PopupWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_width', true ) );
        $gen_PopupMWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_m_width', true ) );
        $gen_PopupBorderRad = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_border_rad', true ) );
        $gen_PopupBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_back_color', true ) );
        $gen_PopupTextColP = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_text_col_p', true ) );
        $gen_PopupTextColH = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_text_col_h', true ) );

        /**
         * Popup Advance Settings
         */
        $conditionalPopup = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        //$cookiePopup = "";

        ?>
        <div class="aagtp_popuptab-container">
            <div class="aagtp_popup-head">
                <div id="aagtp_gen-tab" class="aagtp_popuptab active"><span>General</span></div>
                <div id="aagtp_adv-tab" class="aagtp_popuptab"><span>Advance</span></div>
            </div>
            <div class="aagtp_popupcontent">
                <div id="aagtp_gen-cont" class="aagtp_popupcont active">
                    <h3>Popup Settings</h3>
                    <div class="divider"></div>
                    <div class="popupsettings">
                        <div class="popup-setting-col">
                            <div class="aagtp_setting-item" id="aagtp_popupwidth">
                                <label for="aagtp_popup_width">Popup Width (%):</label>
                                <input type="number" min="20" max="100" placeholder="min: 20% | max: 100%" name="aagtp_popup_width" id="aagtp_popup_width" value="<?php echo esc_attr( $gen_PopupWidth ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_popupmwidth">
                                <label for="aagtp_popup_m_width">Popup Max Width (px):</label>
                                <input type="number" min="468" placeholder="min: 468px" name="aagtp_popup_m_width" id="aagtp_popup_m_width" value="<?php echo esc_attr( $gen_PopupMWidth ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_popupborderrad">
                                <label for="aagtp_popup_border_rad">Popup Border Radius (Px):</label>
                                <input type="text" min="468" placeholder="0 0 0 0" name="aagtp_popup_border_rad" id="aagtp_popup_border_rad" value="<?php echo esc_attr( $gen_PopupBorderRad ); ?>">
                                <p class="aagtp-note">Note: Top(px) Right(px) Bottom(px) Left(px) Sample: 20px 20px 20px 20px</p>
                            </div>
                        </div>
                        <div class="popup-setting-col">
                            <div class="aagtp_setting-item" id="aagtp_popupbackcolor">
                                <label for="aagtp_popup_back_color">Popup Background Color:</label>
                                <div class="color-input">
                                    <input type="color" name="aagtp_popup_back_color" id="aagtp_popup_back_color" value="<?php echo esc_attr( $gen_PopupBackColor ); ?>">
                                    <input type="text" placeholder="#000000" id="aagtp_popup_back_color-hex" readonly>
                                </div>


                            </div>
                            <div class="aagtp_setting-item" id="aagtp_popuptextcolorp">
                                <label for="aagtp_popup_text_color_p">Paragraph Color:</label>
                                <div class="color-input">
                                    <input type="color" name="aagtp_popup_text_color_p" id="aagtp_popup_text_color_p" value="<?php echo esc_attr( $gen_PopupTextColP ); ?>">
                                    <input type="text" placeholder="#000000" id="aagtp_popup_text_color_p-hex" readonly>
                                </div>
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_popuptextcolorh">
                                <label for="aagtp_popup_text_color_h">Heading Color:</label>
                                <div class="color-input">
                                    <input type="color" name="aagtp_popup_text_color_h" id="aagtp_popup_text_color_h" value="<?php echo esc_attr( $gen_PopupTextColH ); ?>">
                                    <input type="text" placeholder="#000000" id="aagtp_popup_text_color_h-hex" readonly>
                                </div>

                            </div>
                        </div>

                    </div>
                    <h3>Button Settings</h3>
                    <div class="divider"></div>
                    <div class="buttonsettings">
                        <div class="button-settings-common">
                            <div class="aagtp_setting-item" id="aagtp_buttontext">
                                <label for="aagtp_button_text">Button Text:</label>
                                <input type="text" placeholder="Leave Blank to remove button" name="aagtp_button_text" id="aagtp_button_text" value="<?php echo esc_attr( $gen_ButtonText ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonwidth">
                                <label for="aagtp_button_width">Button Width (%): </label>
                                <input type="number" placeholder="0" name="aagtp_button_width" id="aagtp_button_width" value="<?php echo esc_attr( $gen_ButtonWidth ); ?>">
                                <p class="aagtp-note">Note: width of 0 means normal width/unset.</p>
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttontextcolor">
                                <label for="aagtp_button_textcolor">Button Text Color:</label>
                                <div class="color-input">
                                    <input type="color" placeholder="ex. #000000" name="aagtp_button_textcolor" id="aagtp_button_textcolor" value="<?php echo esc_attr( $gen_ButtonTextColor ); ?>">
                                    <input type="text" id="aagtp_button_textcolor-hex" placeholder="#000000" readonly>
                                </div>
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonbackcolor">
                                <label for="aagtp_button_backcolor">Button Background Color:</label>
                                <div class="color-input">
                                    <input type="color" placeholder="ex. #000000" name="aagtp_button_backcolor" id="aagtp_button_backcolor" value="<?php echo esc_attr( $gen_ButtonBackColor ); ?>">
                                    <input type="text" id="aagtp_button_backcolor-hex" placeholder="#000000" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="button-settings-hover">
                            <div class="aagtp_setting-item" id="aagtp_buttontextcolorhover">
                                <label for="aagtp_button_text_color_hover">Button Hover Text Color:</label>
                                <div class="color-input">
                                    <input type="color" placeholder="ex. #000000" name="aagtp_button_text_color_hover" id="aagtp_button_text_color_hover" value="<?php echo esc_attr( $gen_HoverButtonTextColor ); ?>">
                                    <input type="text" id="aagtp_button_text_color_hover-hex" placeholder="#000000" readonly>
                                </div>
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonbackcolorhover">
                                <label for="aagtp_button_back_color_hover">Button Hover Background Color:</label>
                                <div class="color-input">
                                    <input type="color" placeholder="ex. #000000" name="aagtp_button_back_color_hover" id="aagtp_button_back_color_hover" value="<?php echo esc_attr( $gen_HoverButtonBackColor ); ?>">
                                    <input type="text" id="aagtp_button_back_color_hover-hex" placeholder="#000000" readonly>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="imagesettings">
                        <h3>Image Settings</h3>
                        <div class="divider"></div>
                        <div class="image-setting-col">
                            <div class="image-setting-col-1">
                                <div class="aagtp_setting-item" id="aagtp_imageposition">
                                    <label for="aagtp_image_position">Image Position:</label>
                                    <select name="aagtp_image_position" id="aagtp_image_position">
                                        <option value="right" selected <?php selected( $gen_ImagePosition, 'right' ); ?>>Right</option>
                                        <option value="top" <?php selected( $gen_ImagePosition, 'top' ); ?>>Top</option>
                                        <option value="left" <?php selected( $gen_ImagePosition, 'left' ); ?>>Left</option>
                                    </select>
                                </div>
                            </div>
                            <div class="image-setting-col-2">
                                <div class="aagtp_setting-item" id="aagtp_imagesize">
                                    <label for="aagtp_image_size">Image Size:</label>
                                    <select name="aagtp_image_size" id="aagtp_image_size">
                                        <option value="cover" selected <?php selected( $gen_ImageSize, 'cover' ); ?>>Cover</option>
                                        <option value="contain" <?php selected( $gen_ImageSize, 'contain' ); ?>>Contain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="aagtp_setting-item" id="aagtp_imageurl">
                            <label for="aagtp_image_url">Image Redirect URL:</label>
                            <input type="text" name="aagtp_image_url" id="aagtp_image_url" value="<?php echo esc_attr( $gen_ImageUrl ); ?>">
                        </div>
                    </div>
                </div>
                <div id="aagtp_adv-cont" class="aagtp_popupcont">
                    <h3>Page Targeting</h3>
                    <div class="divider"></div>
                    <div class="conditionalsetting">
                        <div class="aagtp_setting-item" id="aagtp_pagetarget">
                            <!--Show Pages Selected in a list-->
                            <div class="aagtp-page-selected-list"></div>
                            <input type="text" name="aagtp_target_ids" id="aagtp_target_ids">

                            <!--Select Pages-->
                            <select name="aagtp_page_target" id="aagtp_page_target">
                                <option value="-1">All</option>
                                <?php
                                    $pagequery = new WP_Query(array(
                                        'post_type' => 'page',
                                        'posts_per_page' => -1
                                    ));
                                    if($pagequery->have_posts()):
                                        while($pagequery->have_posts()): $pagequery->the_post();
                                ?>
                                <option value="<?php echo get_the_ID(  ); ?>"><?php the_title(); ?></option>
                                <?php 
                                        endwhile;
                                        wp_reset_postdata(  );
                                    endif;
                                ?>
                            </select>
                        </div>
                    </div>

                    <h3>Trigger</h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>

	<?php
    }

    //Save field data
    static function save_fields($post_id){

        //Security check
        if(!isset($_POST['aagtp_meta_box_nonce']) || !wp_verify_nonce( $_POST['aagtp_meta_box_nonce'], 'aagtp_save_meta_box' )){
            return;
        }

        //Stop Autosave
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
            return;
        }

        //Stop if not allowed to edit
        if(!current_user_can( 'edit_post', $post_id )){
            return;
        }

        //Popup save fields
        if(isset($_POST['aagtp_popup_width'])):
            update_post_meta( $post_id, '_aagtp_popup_width', sanitize_text_field( $_POST['aagtp_popup_width'] ) );
        endif;
        if(isset($_POST['aagtp_popup_m_width'])):
            update_post_meta( $post_id, '_aagtp_popup_m_width', sanitize_text_field( $_POST['aagtp_popup_m_width'] ) );
        endif;
        if(isset($_POST['aagtp_popup_border_rad'])):
            update_post_meta( $post_id, '_aagtp_popup_border_rad', sanitize_text_field( $_POST['aagtp_popup_border_rad'] ) );
        endif;
        if(isset($_POST['aagtp_popup_back_color'])):
            update_post_meta( $post_id, '_aagtp_popup_back_color', sanitize_text_field( $_POST['aagtp_popup_back_color'] ) );
        endif;
        if(isset($_POST['aagtp_popup_text_color_p'])):
            update_post_meta( $post_id, '_aagtp_popup_text_col_p', sanitize_text_field( $_POST['aagtp_popup_text_color_p'] ) );
        endif;
        if(isset($_POST['aagtp_popup_text_color_h'])):
            update_post_meta( $post_id, '_aagtp_popup_text_col_h', sanitize_text_field( $_POST['aagtp_popup_text_color_h'] ) );
        endif;

        //Button save fields
        if(isset($_POST['aagtp_button_text'])):
            update_post_meta( $post_id, '_aagtp_button_text', sanitize_text_field( $_POST['aagtp_button_text'] ) );
        endif;
        if(isset($_POST['aagtp_button_width'])):
            update_post_meta( $post_id, '_aagtp_button_width', sanitize_text_field( $_POST['aagtp_button_width'] ) );
        endif;
        if(isset($_POST['aagtp_button_textcolor'])):
            update_post_meta( $post_id, '_aagtp_button_text_color', sanitize_text_field( $_POST['aagtp_button_textcolor'] ) );
        endif;
        if(isset($_POST['aagtp_button_backcolor'])):
            update_post_meta( $post_id, '_aagtp_button_back_color', sanitize_text_field( $_POST['aagtp_button_backcolor'] ) );
        endif;

        //Button Hover save fields
        if(isset($_POST['aagtp_button_text_color_hover'])):
            update_post_meta( $post_id, '_aagtp_button_back_hover_color', sanitize_text_field( $_POST['aagtp_button_text_color_hover'] ) );
        endif;
        if(isset($_POST['aagtp_button_back_color_hover'])):
            update_post_meta( $post_id, '_aagtp_button_text_hover_color', sanitize_text_field( $_POST['aagtp_button_back_color_hover'] ) );
        endif;

        //Image save fields
        if(isset($_POST['aagtp_image_position'])):
            update_post_meta( $post_id, '_aagtp_image_position', sanitize_text_field( $_POST['aagtp_image_position'] ) );
        endif;
        if(isset($_POST['aagtp_image_url'])):
            update_post_meta( $post_id, '_aagtp_image_url', sanitize_text_field( $_POST['aagtp_image_url'] ) );
        endif;
        if(isset($_POST['aagtp_image_size'])):
            update_post_meta( $post_id, '_aagtp_image_size', sanitize_text_field( $_POST['aagtp_image_size'] ) );
        endif;



    }
}