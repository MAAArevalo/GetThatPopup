<?php
/**
 * @package AAGetThatPopup
*/


class Aagtp_popup_front {

    static function perpopup_script(){
    ?>
    <script>
        jQuery(document).ready(function(){
        <?php

        $query = new WP_Query(array(
            'post_type' => 'aagtp',
            'posts_per_page' => -1,
        ));
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            $postID = get_the_ID();
        ?>

        jQuery("div#aagtp-popup-<?php echo esc_attr($postID); ?> div#aagtp-popup-overlay").click(function(){
            jQuery("div#aagtp-popup-<?php echo esc_attr($postID); ?>").hide();
        });
        jQuery("div#aagtp-popup-<?php echo esc_attr($postID); ?> #aagtp-close-<?php echo esc_attr( $postID ); ?>").click(function(){
            jQuery("div#aagtp-popup-<?php echo esc_attr($postID); ?>").hide();
        });

        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        });
    </script>
<?php    
    }

    /**
     * Add user input styling based on post meta
     * @return void
     */
    static function user_input_style(){
?>
    <style>
        <?php

        $query = new WP_Query(array(
            'post_type' => 'aagtp',
            'posts_per_page' => -1,
        ));
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            $postID = get_the_ID(  );
           /* Popup Style */
            $gen_PopupWidth     =  get_post_meta( $postID, '_aagtp_popup_width', true ) ;
            $gen_PopupMWidth    =  get_post_meta( $postID, '_aagtp_popup_m_width', true );
            $gen_PopupBorderRad =  get_post_meta( $postID, '_aagtp_popup_border_rad', true );
            $gen_PopupBackColor =  get_post_meta( $postID, '_aagtp_popup_back_color', true );
            $gen_PopupTextColP  =  get_post_meta( $postID, '_aagtp_popup_text_col_p', true );
            $gen_PopupTextColH  =  get_post_meta( $postID, '_aagtp_popup_text_col_h', true );

            /* Button Style */
            $gen_ButtonWidth     = sanitize_text_field( get_post_meta( $postID, '_aagtp_button_width', true ) );
            $gen_ButtonTextColor = sanitize_text_field( get_post_meta( $postID, '_aagtp_button_text_color', true ) );
            $gen_ButtonBackColor = sanitize_text_field( get_post_meta( $postID, '_aagtp_button_back_color', true ) );

            /* Button Hover Style */

            $gen_HoverButtonBackColor = sanitize_text_field( get_post_meta( $postID, '_aagtp_button_back_hover_color', true ) );
            $gen_HoverButtonTextColor = sanitize_text_field( get_post_meta( $postID, '_aagtp_button_text_hover_color', true ) );
            ?>

            <?php if(!empty($gen_PopupWidth)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container{
                    width: <?php echo esc_attr( $gen_PopupWidth ); ?>%;
                }
            <?php endif; ?>
            <?php if(!empty($gen_PopupMWidth)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container{
                    max-width: <?php echo esc_attr( $gen_PopupMWidth ); ?>px;
                }
            <?php endif; ?>
            <?php if(!empty($gen_PopupBackColor)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container{
                    background-color: <?php echo esc_attr( $gen_PopupBackColor ); ?>;
                }
            <?php endif; ?>
            <?php if(!empty($gen_PopupTextColP)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container p{
                    color: <?php echo esc_attr( $gen_PopupTextColP ); ?>;
                }
            <?php endif; ?>
            <?php if(!empty($gen_PopupTextColH)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h1, 
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h2,
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h3,
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h4,
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h5,
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container h6{
                    color: <?php echo esc_attr( $gen_PopupTextColH ); ?>;
                }
            <?php endif; ?>
            <?php 
                if(!empty($gen_PopupBorderRad)): 
                $borderRadArr = explode(" ", $gen_PopupBorderRad);
                $borderRad = "";
                for ($bor = 0; $bor < count($borderRadArr); $bor++){
                    $borderpx = $borderRadArr[$bor] . "px ";
                    $borderRad = $borderRad . $borderpx;
                }
            ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> div#aagtp-popup-container{
                    border-radius: <?php echo esc_attr( $borderRad ); ?>;
                }
            <?php endif; ?>
            <?php if(!empty($gen_ButtonWidth)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> a#aagtp-popup-btn-<?php echo esc_attr( $postID ); ?>{
                    width: <?php echo esc_attr( $gen_ButtonWidth ); ?>%;
                }
            <?php endif; ?>
            <?php if(!empty($gen_ButtonTextColor)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> a#aagtp-popup-btn-<?php echo esc_attr( $postID ); ?>{
                    color: <?php echo esc_attr( $gen_ButtonTextColor ); ?> !important;
                }
            <?php endif; ?>
            <?php if(!empty($gen_ButtonBackColor)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> a#aagtp-popup-btn-<?php echo esc_attr( $postID ); ?>{
                    background-color: <?php echo esc_attr( $gen_ButtonBackColor ); ?> !important;
                }
            <?php endif; ?>
            <?php if(!empty($gen_HoverButtonTextColor)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> a#aagtp-popup-btn-<?php echo esc_attr( $postID ); ?>:hover {
                    color: <?php echo esc_attr( $gen_HoverButtonTextColor ); ?> !important;
                }
            <?php endif; ?>
            <?php if(!empty($gen_HoverButtonBackColor)): ?>
                div#aagtp-popup-<?php echo esc_attr( $postID ); ?> a#aagtp-popup-btn-<?php echo esc_attr( $postID ); ?>:hover {
                    background-color: <?php echo esc_attr( $gen_HoverButtonBackColor ); ?> !important;
                }
            <?php endif; ?>

            

        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </style>
<?php    
    }

    /**
     * Render Popup HTML
     * @return void
     */
    function render_popup(){

        $query = new WP_Query(array(
            'post_type' => 'aagtp',
            'posts_per_page' => -1,
        ));
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            $button = get_post_meta( get_the_ID(), '_aagtp_button_text', true );
            $button_url = get_post_meta( get_the_ID(), '_aagtp_button_url', true );
            $image_red = get_post_meta( get_the_ID(), '_aagtp_image_red', true );
            $image_url = get_post_meta( get_the_ID(), '_aagtp_image_url', true );
            $image_alt = get_post_meta( $this->get_attachment_id_from_url( $image_url ), '_wp_attachment_image_alt', true );
            $popup_id = get_the_ID();

?>
    <div id="aagtp-popup-<?php echo esc_attr( $popup_id ); ?>" class="aagtp-popup">
        <div id="aagtp-popup-overlay"></div>
        <div class="aagtp-popup-space">
            <div id="aagtp-popup-container">
                <div id="aagtp-close-<?php echo esc_attr( $popup_id ); ?>" class="aagtp-close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                </div>
                <div class="aagtp-popup-content">
                    <div class="aagtp-popup-text">
                        <?php echo the_content(); ?>
                    </div>
                    <?php 
                        if(!empty($button)):    
                    ?>
                    <div class="aagtp-button-container">
                        <a id="aagtp-popup-btn-<?php echo esc_attr( $popup_id ); ?>" class="aagtp-popup-btn" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html($button); ?></a>
                    </div>

                    <?php
                        endif;
                    ?>
                    
                </div>
                <?php if(!empty($image_url)): ?>
                <div class="aagtp-popup-image">
                    <?php if(!empty($image_red)):?>
                        <a href="<?php echo esc_attr( $image_red ); ?>">    
                    <?php endif;?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                    <?php if(!empty($image_red)):?>
                        </a> 
                    <?php endif;?>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php
            endwhile;
            wp_reset_postdata();
        endif;

    }

    /**
     * Enqueque General Style
     * @return void
     */
    static function popup_styles_scripts(){
        wp_enqueue_style( 'popup_style', plugin_dir_url( __FILE__ )."css/aagtp-popup.css");
		wp_enqueue_script( 'popup_script', plugin_dir_url( __FILE__ )."js/aagtp-popup.js", true);
    }

    /**
     * Get ID from URL
     * @param mixed $url
     * @return bool|int
     */
    function get_attachment_id_from_url( $url ) {
        global $wpdb;

        if ( empty( $url ) ) return false;

        $attachment = $wpdb->get_var( $wpdb->prepare(
            "SELECT ID FROM $wpdb->posts WHERE guid = %s AND post_type = 'attachment'",
            $url
        ) );

        return $attachment ? intval( $attachment ) : false;
    }
}