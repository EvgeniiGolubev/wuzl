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
                    <img class="hero__img" alt="<?php echo $hero_img_alt; ?>" src="<?php echo $hero_img_url; ?>" width="450"/>
                </div>
                <div class="hero__content">
                    <h1 class="hero__title"><?php the_title(); ?></h1>
                    <div class="hero__btn-holder">
                        <a class="btn btn--ozon hero__btn" href="<?= $fields['hero_ozon_url']; ?>" title="<?= $fields['hero_ozon_text']; ?>" target="_blank"><?= $fields['hero_ozon_text']; ?></a>
                        <a class="btn btn--wb hero__btn" href="<?= $fields['hero_wb_url']; ?>" title="<?= $fields['hero_wb_text']; ?>" target="_blank"><?= $fields['hero_wb_text']; ?></a>
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
                                        <img class="goods__img" alt="<?php echo esc_attr($img_alt); ?>" src="<?php echo $img_url; ?>" width="250"/>
                                        <h3 class="goods__name"><?php the_title(); ?></h3>
                                        <span class="goods__price"><?= CFS()->get('card_price'); ?> ₽</span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <button class="slider__btn slider__btn--next goods__btn--next">→</button>
                    </div>
                </section>
            <?php endif; wp_reset_postdata();?>
            <section class="category">
                <h2 class="category__title"><?= $fields['catalog_title']; ?></h2>
                <ul class="category__list">
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'golovolomki', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_golovolomki_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" alt="<?php echo $golovolomki_img_alt; ?>" src="<?php echo $golovolomki_img_url; ?>" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?= $fields['catalog_golovolomki_name']; ?></h3>
                                    <p class="category__description"><?= $fields['catalog_golovolomki_description']; ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'golovolomki', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_kartochnye_igry_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $kartochnye_igry_img_url; ?>" alt="<?php echo $kartochnye_igry_img_alt; ?>" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?= $fields['catalog_kartochnye_igry_name']; ?></h3>
                                    <p class="category__description"><?= $fields['catalog_kartochnye_igry_description']; ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <?php $term = get_term_by('slug', 'golovolomki', 'product_category'); ?>
                        <a href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_dnd_name']; ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $dnd_img_url; ?>" alt="<?php echo $dnd_img_alt; ?>" width="300">
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
                    <img class="blog__image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" width="400"/>
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
                                    <img class="reviews__img" alt="<?php echo $reviews_img_alt; ?>" src="<?php echo $reviews_img_url; ?>" width="550"/>
                                </li>
                            <?php endforeach?>
                        </ul>
                        <button class="slider__btn slider__btn--next reviews__btn--next">→</button>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </main>
    <div class="modal" id="review-modal">
        <img src="" alt="Крупный отзыв" class="modal__img">
    </div>
<?php get_footer(); ?>  