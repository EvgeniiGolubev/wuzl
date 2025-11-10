<?php
    add_action( "wp_enqueue_scripts", "add_styles" );
    add_action( "wp_enqueue_scripts", "add_scripts" );

    function add_styles() {
        wp_enqueue_style( "style", get_stylesheet_uri() );
        wp_enqueue_style( "header", get_template_directory_uri() . "/assets/css/header.css" );
        wp_enqueue_style( "footer", get_template_directory_uri() . "/assets/css/footer.css" );

        if (is_page('catalog')) {
            wp_enqueue_style('catalog', get_template_directory_uri() . '/assets/css/catalog.css');
        } else {
            wp_enqueue_style( "main", get_template_directory_uri() . "/assets/css/main.css" );
        }
    }

    function add_scripts() {
        wp_enqueue_script( "main", get_template_directory_uri() . "/assets/js/main.js", false, null, true );
        
        if(is_front_page()) {
            wp_enqueue_script( "slider", get_template_directory_uri() . "/assets/js/slider.js", false, null, true );
            wp_enqueue_script( "review-modal", get_template_directory_uri() . "/assets/js/review-modal.js", false, null, true );
        }
    }

?>