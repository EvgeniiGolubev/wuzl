<?php 
    /* 
    * Template Name: Main page
    */
    get_header();

     $fields = CFS()->get(false, get_the_ID());
    
    $hero_img_id  = $fields['hero_img'];
    $hero_img_url = wp_get_attachment_image_url($hero_img_id, 'full');
    $hero_img_alt = get_post_meta($hero_img_id, '_wp_attachment_image_alt', true);

    $golovolomki_img_id  = $fields['catalog_golovolomki_img'];
    $golovolomki_img_url = wp_get_attachment_image_url($golovolomki_img_id, 'full');
    $golovolomki_img_alt = get_post_meta($golovolomki_img_id, '_wp_attachment_image_alt', true);

    $kartochnye_igry_img_id  = $fields['catalog_kartochnye_igry_img'];
    $kartochnye_igry_img_url = wp_get_attachment_image_url($kartochnye_igry_img_id, 'full');
    $kartochnye_igry_img_alt = get_post_meta($kartochnye_igry_img_id, '_wp_attachment_image_alt', true);

    $dnd_img_id  = $fields['catalog_dnd_img'];
    $dnd_img_url = wp_get_attachment_image_url($dnd_img_id, 'full');
    $dnd_img_alt = get_post_meta($dnd_img_id, '_wp_attachment_image_alt', true);

    $query = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => 6,
        'tax_query'      => [
            [
                'taxonomy' => 'product_category',
                'field'    => 'slug',
                'terms'    => 'popular',
            ]
        ]
    ]);
?>  
    <main class="main">
        <div class="main__container container">
            <section class="hero">
                <div class="hero__img-holder">
                    <img class="hero__img" alt="<?php echo $hero_img_alt; ?>" src="<?php echo $hero_img_url; ?>" height="450" width="450"/>
                </div>
                <div class="hero__content">
                    <h1 class="hero__title"><?php the_title(); ?></h1>
                    <div class="hero__btn-holder">
                        <a class="btn btn--ozon hero__btn" href="<?= $fields['hero_ozon_url']; ?>" title="<?= $fields['hero_ozon_text']; ?>" target="_blank" onclick="ym(105779475, 'reachGoal', 'main-page_click_ozon');"><?= $fields['hero_ozon_text']; ?></a>
                        <a class="btn btn--wb hero__btn" href="<?= $fields['hero_wb_url']; ?>" title="<?= $fields['hero_wb_text']; ?>" target="_blank" onclick="ym(105779475, 'reachGoal', 'main-page_click_wb');"><?= $fields['hero_wb_text']; ?></a>
                    </div>
                </div>
            </section>
            <?php if ($query->have_posts()): ?>
                <section class="goods">
                    <h2 class="goods__title"><?= $fields['goods_title']; ?></h2>
                    <div class="goods__wrapper">
                        <button class="slider__btn slider__btn--prev goods__btn--prev">←</button>
                        <ul class="goods__list">
                            <?php 
                                while ($query->have_posts()): 
                                    $query->the_post(); 
                                    $thumb_id = get_post_thumbnail_id();
                                    $img_url  = wp_get_attachment_image_url($thumb_id, 'large');
                                    $img_alt  = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                            ?>
                                <li class="goods__item">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img class="goods__img" alt="<?php echo esc_attr($img_alt); ?>" src="<?php echo $img_url; ?>" height="250" width="250"/>
                                        <p class="goods__name"><?php the_title(); ?></p>
                                        <span class="goods__price"><?= CFS()->get('card_price'); ?> ₽</span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <button class="slider__btn slider__btn--next goods__btn--next">→</button>
                    </div>
                </section>
                <script type="application/ld+json">
                    <?php
                        $items = [];
                        $position = 1;
                        
                        foreach ( $query->posts as $post ) {
                        
                            $product_fields = CFS()->get(false, $post->ID);
                        
                            $price = isset($product_fields['card_price']) ? (int)$product_fields['card_price'] : null;
                            $stock = isset($product_fields['card_stock']) ? (int)$product_fields['card_stock'] : 0;
                        
                            $availability = 'https://schema.org/InStock';
                        
                            $thumb_id = get_post_thumbnail_id($post->ID);
                            $image = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'full') : null;
                        
                            $description = get_the_excerpt($post->ID);
                            if ( ! $description ) {
                                $description = wp_trim_words(
                                    wp_strip_all_tags($post->post_content),
                                    30
                                );
                            }
                        
                            $items[] = [
                                "@type" => "ListItem",
                                "position" => $position++,
                                "item" => [
                                    "@type" => "Product",
                                    "@id"   => get_permalink($post->ID) . '#product',
                                    "name"  => get_the_title($post->ID),
                                    "url"   => get_permalink($post->ID),
                                    "image" => $image,
                                    "description" => $description,
                                    "brand" => [
                                        "@type" => "Brand",
                                        "name" => "WP Games"
                                    ],
                                    "offers" => [
                                        "@type" => "Offer",
                                        "url" => get_permalink($post->ID),
                                        "price" => $price,
                                        "priceCurrency" => "RUB",
                                        "availability" => $availability
                                    ]
                                ]
                            ];
                        }
                        
                        echo wp_json_encode([
                            "@context" => "https://schema.org",
                            "@type" => "ItemList",
                            "@id" => home_url('/') . '#itemlist',
                            "name" => "Популярные товары",
                            "itemListElement" => $items
                        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    ?>
                </script>
            <?php endif; wp_reset_postdata();?>
            <section class="category">
                <h2 class="category__title"><?= $fields['catalog_title']; ?></h2>
                <ul class="category__list">
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'derevyannye-golovolomki', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_golovolomki_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" alt="<?php echo $golovolomki_img_alt; ?>" src="<?php echo $golovolomki_img_url; ?>" height="300" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?= $fields['catalog_golovolomki_name']; ?></h3>
                                    <p class="category__description"><?= $fields['catalog_golovolomki_description']; ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'kartochnye-igry-dlya-par', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_kartochnye_igry_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $kartochnye_igry_img_url; ?>" alt="<?php echo $kartochnye_igry_img_alt; ?>" height="300" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?= $fields['catalog_kartochnye_igry_name']; ?></h3>
                                    <p class="category__description"><?= $fields['catalog_kartochnye_igry_description']; ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'igrovye-nabory-dlya-dnd', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_dnd_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $dnd_img_url; ?>" alt="<?php echo $dnd_img_alt; ?>" height="300" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?= $fields['catalog_dnd_name']; ?></h3>
                                    <p class="category__description"><?= $fields['catalog_dnd_description']; ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
            </section>
            <?php 
                $loop = $fields['benefits_items'];
                if (!empty($loop) && is_array($loop)):
            ?>
                <section class="benefits">
                    <h2 class="benefits__title"><?= $fields['benefits_title']; ?></h2>
                    <div class="benefits__list">
                        <?php
                            foreach ($loop as $row):
                                $benefits_img_id  = $row['benefits_img'];
                                $benefits_img_url = wp_get_attachment_image_url($benefits_img_id, 'full');
                                $benefits_img_alt = get_post_meta($benefits_img_id, '_wp_attachment_image_alt', true);
                        ?>
                            <div class="benefits__item">
                                <img class="benefits__img" alt="<?php echo $benefits_img_alt; ?>" src="<?php echo $benefits_img_url; ?>" width="150" height="150"/>
                                <h3 class="benefits__name"><?php echo $row['benefits_name']; ?></h3>
                            </div>
                        <?php endforeach?>
                    </div>
                </section>
            <?php endif; ?>
            <section class="blog">
                <?php
                    $blog_title = $fields['blog_title'];
                    $blog_btn_text = $fields['blog_btn_text'];
                    $latest = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 1
                    ]);
                    if ($latest->have_posts()) :
                        while ($latest->have_posts()) : $latest->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $img_url  = wp_get_attachment_image_url($thumb_id, 'large');
                            $img_alt  = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                            $yoast_desc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
                            if (!$yoast_desc) {
                                $yoast_desc = get_the_excerpt();
                            }
                ?>
                <div class="blog__content">
                    <img class="blog__image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" height="400" width="400"/>
                    <div class="blog__description-holder">
                        <h2 class="blog__title"><?php echo $blog_title; ?></h2>
                        <p class="blog__description"><?php echo $yoast_desc; ?></p>
                        <a class="btn blog__btn" href="<?php echo home_url("/blog/"); ?>" title="<?php echo $blog_btn_text; ?>"><?php echo $blog_btn_text; ?></a>
                    </div>
                </div>
                <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </section>
            <?php 
                $loop = $fields['reviews_items'];
                if (!empty($loop) && is_array($loop)):
            ?>
                <section class="reviews">
                    <h2 class="reviews__title"><?= $fields['reviews_title']; ?></h2>
                    <div class="reviews__wrapper">
                        <button class="slider__btn slider__btn--prev reviews__btn--prev">←</button>
                        <ul class="reviews__list">
                            <?php
                                foreach ($loop as $row):
                                    $reviews_img_id  = $row['reviews_img'];
                                    $reviews_img_url = wp_get_attachment_image_url($reviews_img_id, 'full');
                                    $reviews_img_alt = get_post_meta($reviews_img_id, '_wp_attachment_image_alt', true);
                            ?>
                                <li class="reviews__item">
                                    <img class="reviews__img" alt="<?php echo $reviews_img_alt; ?>" src="<?php echo $reviews_img_url; ?>" height="550" width="550"/>
                                </li>
                            <?php endforeach?>
                        </ul>
                        <button class="slider__btn slider__btn--next reviews__btn--next">→</button>
                    </div>
                </section>
            <?php endif; ?>
            <section class="company">
                <?php
                    $company_title = $fields['company_title'];
                    $company_btn_text = $fields['company_btn_text'];
                ?>
                <div class="company__content">
                    <h2 class="company__title"><?= $company_title; ?></h2>
                    <?php the_content(); ?>
                    <a class="btn company__btn" href="<?php echo home_url("/o-nas/"); ?>" title="<?= $company_btn_text; ?>"><?= $company_btn_text; ?></a>
                </div>
            </section>
            <?php 
                $loop = $fields['faq_items'];
                if (!empty($loop) && is_array($loop)):
            ?>
                <section class="faq">
                    <h2 class="faq__title"><?= $fields['faq_title']; ?></h2>
                    <ul class="faq__list">
                        <?php foreach ($loop as $row): ?>
                            <li class="faq__item">
                                <h3 class="faq__question"><?= $row['faq_question']; ?></h3>
                                <p class="faq__answer"><?= $row['faq_answer']; ?></p>
                            </li>
                        <?php endforeach?>
                    </ul>
                </section>
            <?php endif; ?>
        </div>
    </main>
    <div class="modal" id="review-modal">
        <img src="" alt="Крупный отзыв" class="modal__img">
    </div>
<?php get_footer(); ?>  