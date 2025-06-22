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
        $gen_ButtonText = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ButtonWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_HoverButtonBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_HoverButtonTextColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ImagePosition = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ImageUrl = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $gen_ImageSize = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        /**
         * Popup Style Settings
         */
        $style_PopupWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupMWidth = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupBorderRad = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupBackColor = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupBackImage = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupTextColP = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        $style_PopupTextColH = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );

        /**
         * Popup Advance Settings
         */
        $conditionalPopup = sanitize_text_field( get_post_meta( $post->ID, '_aagtp_use_premade template', true ) );
        //$cookiePopup = "";

        ?>
        <div class="aagtp_popuptab-container">
            <div class="aagtp_popup-head">
                <div id="aagtp_gentab" class="aagtp_popuptab active"><span>General</span></div>
                <div id="aagtp_styletab" class="aagtp_popuptab"><span>Style</span></div>
                <div id="aagtp_advtab" class="aagtp_popuptab"><span>Advance</span></div>
            </div>
            <div class="aagtp_popupcontent">
                <div id="aagtp_gencont" class="active">
                    <div class="aagtp_setting-item" id="aagtp_buttontext">
                        <label for="aagtp_button_text">Button Text:</label>
                        <input type="text" name="aagtp_button_text" id="aagtp_button_text" value="<?php echo esc_attr( $gen_ButtonText ); ?>">
                    </div>
                </div>
                <div id="aagtp_stylecont">
                    <div class="aagtp_setting-item" id="aagtp_popupwidth">
                        <label for="aagtp_popup_width">Popup Width:</label>
                        <input type="number" min="20" max="100" name="aagtp_popup_width" id="aagtp_popup_width" value="<?php echo esc_attr( $style_PopupWidth ); ?>">
                    </div>
                    <div class="aagtp_setting-item" id="aagtp_popupmwidth">
                        <label for="aagtp_popup_m_width">Popup Max Width:</label>
                        <input type="number" min="425" name="aagtp_popup_m_width" id="aagtp_popup_m_width" value="<?php echo esc_attr( $style_PopupMWidth ); ?>">
                    </div>
                </div>
                <div id="advcont"></div>
            </div>
        </div>





	<?php
    }

    static function save_fields($post_id){

        if(isset($_POST['aagpt_select_template_option'])):
            update_post_meta( $post_id, '_aagtp_select_template_option', sanitize_text_field( $_POST['aagpt_select_template_option'] ) );
        endif;
    }
}