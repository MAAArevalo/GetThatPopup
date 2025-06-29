<?php
/**
 * @package AAGetThatPopup
*/


class Aagtp_popup_front {

    /**
     * Add user input styling based on post meta
     * @return void
     */
    static function user_input_style(){

    }

    /**
     * Render Popup HTML
     * @return void
     */
    static function render_popup(){

        $query = new WP_Query(array(
            'post_type' => 'aagtp',
            'posts_per_page' => -1,
        ));
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            

?>
    <div id="aagtp-popup-<?php echo get_the_ID(); ?>" class="aagtp-popup">
        <div id="aagtp-popup-overlay"></div>
        <div id="aagtp-popup-container">
            <div class="aagtp-popup-content">
                <?php the_content(); ?>
            </div>
            <div class="aagtp-popup-image">

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
}