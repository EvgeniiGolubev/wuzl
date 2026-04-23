<?php
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');

    add_action( 'wp_enqueue_scripts', 'add_styles' );
    add_action( 'wp_enqueue_scripts', 'add_scripts' );
    add_action( 'init', 'register_categories' );
    add_action('template_redirect', 'popular_category_redirect');

    function add_styles() {
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'header', get_template_directory_uri() . '/assets/css/header.css' );
        wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/css/footer.css' );

        if (is_page('catalog')) {
            wp_enqueue_style('catalog', get_template_directory_uri() . '/assets/css/catalog.css');
        } elseif (is_page('kak-otkryt-derevyannuyu-golovolomku')) {
            wp_enqueue_style('how-assemble-puzzle', get_template_directory_uri() . '/assets/css/how-assemble-puzzle.css');
        } elseif (is_tax('product_category')) {
            wp_enqueue_style('category', get_template_directory_uri() . '/assets/css/category.css');
        } elseif (is_page('o-nas')) {
            wp_enqueue_style('about-us', get_template_directory_uri() . '/assets/css/about-us.css');
        } elseif (is_page('politika-konfidencialnosti')) {
            wp_enqueue_style('privacy-policy', get_template_directory_uri() . '/assets/css/privacy-policy.css');
        } elseif (is_page('karta-sajta')) {
            wp_enqueue_style('sitemap', get_template_directory_uri() . '/assets/css/sitemap.css');
        } elseif (is_home()) {
            wp_enqueue_style('blog', get_template_directory_uri() . '/assets/css/blog.css');
        } elseif (is_page('kontakty')) {
            wp_enqueue_style('contacts', get_template_directory_uri() . '/assets/css/contacts.css');
        } elseif (is_singular('product')) {
            wp_enqueue_style('single-product', get_template_directory_uri() . '/assets/css/single-product.css');
        } elseif (is_single() && get_post_type() === 'post') {
            wp_enqueue_style('single-post', get_template_directory_uri() . '/assets/css/single-post.css');
        } elseif (is_404()) {
            wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css');
        } else {
            wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
        }
    }

    function add_scripts() {
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', false, null, true );
        
        if(is_front_page() || is_singular('product')) {
            wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/slider.js', false, null, true );
            wp_enqueue_script( 'review-modal', get_template_directory_uri() . '/assets/js/review-modal.js', false, null, true );
        }
        
        if(is_singular('product')) {
            wp_enqueue_script( 'card-photo-changes', get_template_directory_uri() . '/assets/js/card-photo-changes.js', false, null, true );
        }
    }
    
    function register_categories() {
        // ТОВАРЫ
        register_post_type('product', array(
            'labels' => array(
                'name'          => 'Товары',
                'singular_name' => 'Товар',
            ),
            'public'      => true,
            'has_archive' => false,
            'menu_icon'   => 'dashicons-cart',
            'supports'    => array('title', 'editor', 'thumbnail'),
            'rewrite'     => array('slug' => 'product', 'with_front'   => false),
        ));

        // КАТЕГОРИИ ТОВАРОВ
        register_taxonomy('product_category', 'product', array(
            'labels' => array(
                'name'          => 'Категории товаров',
                'singular_name' => 'Категория товара',
            ),
            'public'       => true,
            'hierarchical' => true,
            'rewrite'      => array(
                'slug'         => 'catalog',
                'with_front'   => false,
                'hierarchical' => true
            ),
        ));
    }

    function popular_category_redirect() {
        if (is_tax('product_category')) {
            $term = get_queried_object();

            if ($term && $term->slug === 'popular') {
                wp_redirect(home_url('/'), 301);
                exit;
            }
        }
    }

    add_filter( 'upload_mimes', function( $mimes ) {
        $mimes['ico'] = 'image/x-icon';
        return $mimes;
    } );

    add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes, $real_mime ) {
        $ext = pathinfo( $filename, PATHINFO_EXTENSION );
        if ( strtolower( $ext ) === 'ico' ) {
            $data['ext']  = 'ico';
            $data['type'] = 'image/x-icon';
        }
        return $data;
    }, 10, 5 );

    add_filter('wpseo_sitemap_entry', function($url, $type, $object){
        if ($type === 'term' && $object->taxonomy === 'product_category' && $object->slug === 'popular') {
            return false;
        }
        return $url;
    }, 10, 3);
    
    add_filter( 'wpseo_json_ld_output', '__return_false' );
    
    // Полное отключение sitemap для category в Yoast SEO
    add_filter('wpseo_sitemap_index', function($sitemap_index) {
        // Убираем блок <sitemap> для category
        $sitemap_index = preg_replace(
            '#<sitemap>\s*<loc>.*category-sitemap\.xml<\/loc>\s*<\/sitemap>#',
            '',
            $sitemap_index
        );
        return $sitemap_index;
    });
    
    // Отключаем генерацию самих category sitemap
    add_filter('wpseo_sitemap_exclude_taxonomy', function($bool, $taxonomy) {
        if ($taxonomy === 'category') {
            return true; // не выводить в sitemap
        }
        return $bool;
    }, 10, 2);
    
    add_action('wp_head', function () {
        echo '<link rel="icon" href="https://wp-games.ru/favicon.ico" type="image/x-icon">';
    }, 1);
        
    add_action('wp_head', function () {
    
        if ( is_front_page() ) {
            return;
        }
    
        $items = [];
        $position = 1;
    
        // 2. Главная — всегда первый элемент
        $items[] = [
            "@type" => "ListItem",
            "position" => $position++,
            "name" => "Главная",
            "item" => home_url('/')
        ];
        
        if ( is_page('catalog') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Каталог",
                "item" => home_url('/catalog/')
            ];
        }

        if ( is_page('kak-otkryt-derevyannuyu-golovolomku') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Как открыть деревянную головоломку?",
                "item" => home_url('/kak-otkryt-derevyannuyu-golovolomku/')
            ];
        }
        
        if ( is_page('o-nas') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "О нас",
                "item" => home_url('/o-nas/')
            ];
        }
        
        if ( is_page('kontakty') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Контакты",
                "item" => home_url('/kontakty/')
            ];
        }
        
        if ( is_page('politika-konfidencialnosti') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Политика конфиденциальности",
                "item" => home_url('/politika-konfidencialnosti/')
            ];
        }
        
        if ( is_page('karta-sajta') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Карта сайта",
                "item" => home_url('/karta-sajta/')
            ];
        }
        
        if ( is_tax('product_category') ) {

            $term = get_queried_object();
        
            $items[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "name" => "Каталог",
                "item" => home_url('/catalog/')
            ];
        
            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => $term->name,
                "item" => get_term_link($term)
            ];
        }
        
        if ( is_singular('product') ) {

            $terms = get_the_terms(get_the_ID(), 'product_category');
        
            if ( ! empty($terms) && ! is_wp_error($terms) ) {
                $term = array_shift($terms);
        
                $items[] = [
                    "@type" => "ListItem",
                    "position" => $position++,
                    "name" => "Каталог",
                    "item" => home_url('/catalog/')
                ];
        
                $items[] = [
                    "@type" => "ListItem",
                    "position" => $position++,
                    "name" => $term->name,
                    "item" => get_term_link($term)
                ];
            }
        
            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => get_the_title(),
                "item" => get_permalink()
            ];
        }
        
        if ( is_home() ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => "Блог",
                "item" => home_url('/blog/')
            ];
        }
        
        if ( is_singular('post') ) {

            $items[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "name" => "Блог",
                "item" => home_url('/blog/')
            ];
        
            $items[] = [
                "@type" => "ListItem",
                "position" => $position,
                "name" => get_the_title(),
                "item" => get_permalink()
            ];
        }
        
        if ( count($items) < 2 ) {
            return;
        }
    
        echo '<script type="application/ld+json">' .
            wp_json_encode([
                "@context" => "https://schema.org",
                "@type" => "BreadcrumbList",
                "itemListElement" => $items
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
        '</script>';
    
    });
    
    add_action('wp_head', function () {

        if ( ! is_singular('product') ) {
            return;
        }
    
        $product_id = get_the_ID();
        $fields     = CFS()->get(false, $product_id);
    
        // Название и ссылки
        $name = get_the_title($product_id);
        $url  = get_permalink($product_id);
    
        // Описание
        $description = wp_strip_all_tags( get_post_field('post_content', $product_id) );
    
        // Цена и остаток
        $price = isset($fields['card_price']) ? (int)$fields['card_price'] : null;
        $stock = isset($fields['card_stock']) ? (int)$fields['card_stock'] : 0;
    
        // Availability
        /* $availability = $stock > 0
            ? 'https://schema.org/InStock'
            : 'https://schema.org/OutOfStock'; */
        $availability = 'https://schema.org/InStock';
    
        // Изображения
        $images = [];
        if ( ! empty($fields['images_list']) ) {
            foreach ($fields['images_list'] as $row) {
                if ( ! empty($row['images_item']) ) {
                    $img = wp_get_attachment_image_url($row['images_item'], 'full');
                    if ($img) {
                        $images[] = $img;
                    }
                }
            }
        }
    
        // URL покупки (приоритет — Ozon)
        $offer_url = ! empty($fields['ozon_btn_url'])
            ? $fields['ozon_btn_url']
            : $url;
    
        $schema = [
            "@context" => "https://schema.org",
            "@type"    => "Product",
            "@id"      => $url . '#product',
            "name"     => $name,
            "image"    => $images,
            "description" => $description,
            "brand" => [
                "@type" => "Brand",
                "name"  => "WP Games"
            ],
            "offers" => [
                "@type" => "Offer",
                "url"   => $offer_url,
                "price" => $price,
                "priceCurrency" => "RUB",
                "availability"  => $availability
            ]
        ];
    
        // Чистим пустые значения
        $schema = array_filter($schema, function ($v) {
            return ! empty($v);
        });
    
        echo '<script type="application/ld+json">' .
             wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
             '</script>';
    
    });
    
    add_action('wp_head', function () {

        if ( ! is_tax('product_category') ) {
            return;
        }
    
        $term = get_queried_object();
    
        $query = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'tax_query'      => [
                [
                    'taxonomy' => 'product_category',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ]
            ]
        ]);
    
        if ( ! $query->have_posts() ) {
            return;
        }
    
        $items = [];
        $position = 1;
    
        while ( $query->have_posts() ) {
            $query->the_post();
    
            $product_id = get_the_ID();
            $fields = CFS()->get(false, $product_id);
    
            // Цена и остаток
            $price = isset($fields['card_price']) ? (int)$fields['card_price'] : null;
            $stock = isset($fields['card_stock']) ? (int)$fields['card_stock'] : 0;
    
            /*$availability = $stock > 0
                ? 'https://schema.org/InStock'
                : 'https://schema.org/OutOfStock';*/
            
            $availability = 'https://schema.org/InStock';
    
            // Картинка
            $thumb_id = get_post_thumbnail_id($product_id);
            $image = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'full') : null;
    
            // Описание (короткое)
            $description = get_the_excerpt();
            if ( ! $description ) {
                $description = wp_trim_words(
                    wp_strip_all_tags(get_post_field('post_content', $product_id)),
                    30
                );
            }
    
            $items[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "item" => [
                    "@type" => "Product",
                    "@id"   => get_permalink() . '#product',
                    "name"  => get_the_title(),
                    "url"   => get_permalink(),
                    "image" => $image,
                    "description" => $description,
                    "brand" => [
                        "@type" => "Brand",
                        "name"  => "WP Games"
                    ],
                    "offers" => [
                        "@type" => "Offer",
                        "url"   => get_permalink(),
                        "price" => $price,
                        "priceCurrency" => "RUB",
                        "availability"  => $availability
                    ]
                ]
            ];
        }
    
        wp_reset_postdata();
    
        $schema = [
            "@context" => "https://schema.org",
            "@type"    => "ItemList",
            "@id"      => get_term_link($term) . '#itemlist',
            "name"     => $term->name,
            "itemListElement" => $items
        ];
    
        echo '<script type="application/ld+json">' .
             wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
             '</script>';
    
    });
    
    add_action('wp_head', function () {

        $front_id = (int) get_option('page_on_front');
        $show = false;
    
        if ( $front_id > 0 && get_queried_object_id() === $front_id ) {
            $show = true;
        }
    
        // опционально: на "О нас" и "Контакты"
        if ( is_page('o-nas') || is_page('kontakty') ) {
            $show = true;
        }
    
        if ( ! $show ) {
            return;
        }
    
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "@id" => home_url('/') . '#organization',
            "name" => "WP Games",
            "legalName" => "ИП Миненко Максим Геннадьевич",
            "url" => home_url('/'),
            "email" => "wuzl.job@yandex.ru",
            "telephone" => "+7-999-526-26-22",
            "taxID" => "540307154465",
            "identifier" => [
                "@type" => "PropertyValue",
                "propertyID" => "ОГРНИП",
                "value" => "321547600140359"
            ],
            "sameAs" => [
                "https://vk.com/wuzlru"
            ],
            "address" => [
                "@type" => "PostalAddress",
                "addressCountry" => "RU",
                "addressRegion" => "Санкт-Петербург",
                "streetAddress" => "улица Зайцева, 4к2"
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "contactType" => "customer support",
                "telephone" => "+7-999-526-26-22",
                "email" => "wuzl.job@yandex.ru",
                "availableLanguage" => ["ru"]
            ]
        ];
    
        echo '<script type="application/ld+json">' .
            wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
        '</script>';
    });

    add_action('wp_head', function () {

        if ( ! is_home() && ! is_post_type_archive('post') ) {
            return;
        }
    
        global $wp_query;
    
        if ( empty($wp_query->posts) ) {
            return;
        }
    
        $items = [];
        $position = 1;
    
        foreach ( $wp_query->posts as $post ) {
    
            $items[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "item" => [
                    "@type" => "BlogPosting",
                    "@id"   => get_permalink($post->ID) . '#blogpost',
                    "headline" => get_the_title($post->ID),
                    "url" => get_permalink($post->ID),
                    "datePublished" => get_the_date('c', $post->ID),
                    "dateModified"  => get_the_modified_date('c', $post->ID),
                    "author" => [
                        "@type" => "Organization",
                        "name" => "WP Games"
                    ]
                ]
            ];
        }
    
        echo '<script type="application/ld+json">' .
            wp_json_encode([
                "@context" => "https://schema.org",
                "@type" => "Blog",
                "@id" => home_url('/blog/') . '#blog',
                "name" => "Блог WP Games",
                "blogPost" => $items
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
        '</script>';
    });
    
    add_action('wp_head', function () {

        if ( ! is_singular('post') ) {
            return;
        }
    
        $post_id = get_the_ID();
    
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "@id" => get_permalink($post_id) . '#blogpost',
            "headline" => get_the_title($post_id),
            "url" => get_permalink($post_id),
            "datePublished" => get_the_date('c', $post_id),
            "dateModified" => get_the_modified_date('c', $post_id),
            "author" => [
                "@type" => "Organization",
                "name" => "WP Games"
            ],
            "publisher" => [
                "@type" => "Organization",
                "@id" => home_url('/') . '#organization'
            ]
        ];
    
        echo '<script type="application/ld+json">' .
            wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
        '</script>';
    });
    
    add_action('wp_head', function () {

        if ( ! is_front_page() ) {
            return;
        }
    
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "@id" => home_url('/') . '#website',
            "url" => home_url('/'),
            "name" => "WP Games",
            "publisher" => [
                "@type" => "Organization",
                "@id" => home_url('/') . '#organization'
            ]
        ];
    
        echo '<script type="application/ld+json">' .
            wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
            '</script>';
    });
    
    add_filter('wpseo_title', function ($title) {

        if (is_home() && is_paged()) {
    
            $paged = (int) get_query_var('paged');
    
            $title = preg_replace('/\s*\|\s*Страница\s+\d+\s+из\s+\d+/iu', '', $title);
    
            $title = preg_replace('/\s*\|\s*Страница\s+\d+/iu', '', $title);
    
            return trim($title) . ' — стр. ' . $paged;
        }
    
        return $title;
    
    }, 20);

    add_filter('wpseo_metadesc', function ($desc) {

        if (is_home() && is_paged()) {

            $paged = (int) get_query_var('paged');

            if (!empty($desc)) {
                return $desc . ' – стр ' . $paged;
            }
        }

        return $desc;

    }, 20);
?>