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

    function meta_box_html($post){
                
        /**
         * Popup General Settings
         */
        //$gen_checkPremadeTemplate = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ButtonText = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_text', true ) );
        $gen_ButtonWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_width', true ) );
        $gen_ButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_text_color', true ) );
        $gen_ButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_button_back_color', true ) );
        $gen_HoverButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_hover_back_color', true ) );
        $gen_HoverButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_hover_text_color', true ) );
        $gen_ImagePosition = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_pos', true ) );
        $gen_ImageUrl = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_url', true ) );
        $gen_ImageSize = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_image_size', true ) );
        /**
         * Popup Style Settings
         */
        $style_PopupWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_width', true ) );
        $style_PopupMWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_m_width', true ) );
        $style_PopupBorderRad = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_border_rad', true ) );
        $style_PopupBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_back_color', true ) );
        $style_PopupBackImage = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_back_image', true ) );
        $style_PopupTextColP = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_text_col_p', true ) );
        $style_PopupTextColH = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_popup_text_col_h', true ) );

        /**
         * Popup Advance Settings
         */
        $conditionalPopup = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        //$cookiePopup = "";

        ?>
        <div class="aagtp_popuptab-container">
            <div class="aagtp_popup-head">
                <div id="aagtp_gen-tab" class="aagtp_popuptab active"><span>General</span></div>
                <div id="aagtp_style-tab" class="aagtp_popuptab"><span>Style</span></div>
                <div id="aagtp_adv-tab" class="aagtp_popuptab"><span>Advance</span></div>
            </div>
            <div class="aagtp_popupcontent">
                <div id="aagtp_gen-cont" class="aagtp_popupcont active">
                    <div class="buttonsettings">
                        <div class="button-settings-common">
                            <h3>Button Settings</h3>
                            <div class="divider"></div>
                            <div class="aagtp_setting-item" id="aagtp_buttontext">
                                <label for="aagtp_button_text">Button Text:</label>
                                <input type="text" placeholder="Leave Blank to remove button" name="aagtp_button_text" id="aagtp_button_text" value="<?php echo esc_attr( $gen_ButtonText ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonwidth">
                                <label for="aagtp_button_width">Button Width (%): </label>
                                <input type="number" name="aagtp_button_width" id="aagtp_button_width" value="<?php echo esc_attr( $gen_ButtonWidth ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttontextcolor">
                                <label for="aagtp_button_textcolor">Button Text Color (Hex):</label>
                                <input type="text" placeholder="ex. #000000" name="aagtp_button_textcolor" id="aagtp_button_textcolor" value="<?php echo esc_attr( $gen_ButtonTextColor ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonbackcolor">
                                <label for="aagtp_button_backcolor">Button Background Color (Hex):</label>
                                <input type="text" placeholder="ex. #000000" name="aagtp_button_backcolor" id="aagtp_button_backcolor" value="<?php echo esc_attr( $gen_ButtonBackColor ); ?>">
                            </div>
                        </div>
                        <div class="button-settings-hover">
                            <h3>Hover Button Settings</h3>
                            <div class="divider"></div>
                            <div class="aagtp_setting-item" id="aagtp_buttontextcolorhover">
                                <label for="aagtp_button_text_color_hover">Button Hover Text Color (Hex):</label>
                                <input type="text" placeholder="ex. #000000" name="aagtp_button_text_color_hover" id="aagtp_button_text_color_hover" value="<?php echo esc_attr( $gen_HoverButtonTextColor ); ?>">
                            </div>
                            <div class="aagtp_setting-item" id="aagtp_buttonbackcolorhover">
                                <label for="aagtp_button_back_color_hover">Button Hover Background Color (Hex):</label>
                                <input type="text" placeholder="ex. #000000" name="aagtp_button_back_color_hover" id="aagtp_button_back_color_hover" value="<?php echo esc_attr( $gen_HoverButtonBackColor ); ?>">
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
                            <label for="aagtp_image_url">Image URL:</label>
                            <input type="text" name="aagtp_image_url" id="aagtp_image_url" value="<?php echo esc_attr( $gen_ImageUrl ); ?>">
                        </div>
                    </div>
                </div>
                <div id="aagtp_style-cont" class="aagtp_popupcont">
                    <div class="aagtp_setting-item" id="aagtp_popupwidth">
                        <label for="aagtp_popup_width">Popup Width:</label>
                        <input type="number" min="20" max="100" name="aagtp_popup_width" id="aagtp_popup_width" value="<?php echo esc_attr( $style_PopupWidth ); ?>">
                    </div>
                    <div class="aagtp_setting-item" id="aagtp_popupmwidth">
                        <label for="aagtp_popup_m_width">Popup Max Width:</label>
                        <input type="number" min="425" name="aagtp_popup_m_width" id="aagtp_popup_m_width" value="<?php echo esc_attr( $style_PopupMWidth ); ?>">
                    </div>
                </div>
                <div id="aagtp_adv-cont" class="aagtp_popupcont"></div>
            </div>
        </div>

	<?php
    }

    static function save_fields($post_id){

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

    }
}