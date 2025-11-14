<?php
    add_theme_support('post-thumbnails');
    
    add_action( "wp_enqueue_scripts", "add_styles" );
    add_action( "wp_enqueue_scripts", "add_scripts" );

    function add_styles() {
        wp_enqueue_style( "style", get_stylesheet_uri() );
        wp_enqueue_style( "header", get_template_directory_uri() . "/assets/css/header.css" );
        wp_enqueue_style( "footer", get_template_directory_uri() . "/assets/css/footer.css" );

        if (is_page('catalog')) {
            wp_enqueue_style('catalog', get_template_directory_uri() . '/assets/css/catalog.css');
        } elseif (is_page('kak-sobrat-golovolomku')) {
            wp_enqueue_style('how-assemble-puzzle', get_template_directory_uri() . '/assets/css/how-assemble-puzzle.css');
        } elseif (is_tax('product_category')) {
            wp_enqueue_style('category', get_template_directory_uri() . '/assets/css/category.css');
        } elseif (is_page('o-nas')) {
            wp_enqueue_style('about-us', get_template_directory_uri() . '/assets/css/about-us.css');
        } elseif (is_page('politika-konfidencialnosti')) {
            wp_enqueue_style('privacy-policy', get_template_directory_uri() . '/assets/css/privacy-policy.css');
        } elseif (is_home()) {
            wp_enqueue_style('blog', get_template_directory_uri() . '/assets/css/blog.css');
        } elseif (is_page('kontakty')) {
            wp_enqueue_style('contacts', get_template_directory_uri() . '/assets/css/contacts.css');
        } elseif (is_singular('product')) {
            wp_enqueue_style('single-product', get_template_directory_uri() . '/assets/css/single-product.css');
        } elseif (is_single() && get_post_type() === 'post') {
            wp_enqueue_style('single-post', get_template_directory_uri() . '/assets/css/single-post.css');
        } else {
            wp_enqueue_style( "main", get_template_directory_uri() . "/assets/css/main.css" );
        }
    }

    function add_scripts() {
        wp_enqueue_script( "main", get_template_directory_uri() . "/assets/js/main.js", false, null, true );
        
        if(is_front_page() || is_singular('product')) {
            wp_enqueue_script( "slider", get_template_directory_uri() . "/assets/js/slider.js", false, null, true );
            wp_enqueue_script( "review-modal", get_template_directory_uri() . "/assets/js/review-modal.js", false, null, true );
        }
    }

    add_action('init', function() {

        // ТОВАРЫ
        register_post_type('product', array(
            'labels' => array(
                'name'          => 'Товары',
                'singular_name' => 'Товар',
            ),
            'public'      => true,
            'has_archive' => false, // общий архив /product/ не нужен
            'menu_icon'   => 'dashicons-cart',
            'supports'    => array('title', 'editor', 'thumbnail'),
            'rewrite'     => array('slug' => 'product'),
        ));

        // КАТЕГОРИИ ТОВАРОВ
        register_taxonomy('product_category', 'product', array(
            'labels' => array(
                'name'          => 'Категории товаров',
                'singular_name' => 'Категория товара',
            ),
            'public'       => true,
            'hierarchical' => true, // как обычные рубрики
            'rewrite'      => array('slug' => 'catalog'),
        ));
    });

?>