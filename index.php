<?php 
    /* 
    * Template Name: Main page
    */
    get_header();
    
    $hero_img_id  = CFS()->get('hero_img');
    $hero_img_url = wp_get_attachment_image_url($hero_img_id, 'full');
    $hero_img_alt = get_post_meta($hero_img_id, '_wp_attachment_image_alt', true);

    $golovolomki_img_id  = CFS()->get('catalog_golovolomki_img');
    $golovolomki_img_url = wp_get_attachment_image_url($golovolomki_img_id, 'full');
    $golovolomki_img_alt = get_post_meta($golovolomki_img_id, '_wp_attachment_image_alt', true);

    $kartochnye_igry_img_id  = CFS()->get('catalog_kartochnye_igry_img');
    $kartochnye_igry_img_url = wp_get_attachment_image_url($kartochnye_igry_img_id, 'full');
    $kartochnye_igry_img_alt = get_post_meta($kartochnye_igry_img_id, '_wp_attachment_image_alt', true);

    $dnd_img_id  = CFS()->get('catalog_dnd_img');
    $dnd_img_url = wp_get_attachment_image_url($dnd_img_id, 'full');
    $dnd_img_alt = get_post_meta($dnd_img_id, '_wp_attachment_image_alt', true);
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
                        <a class="btn btn--ozon hero__btn" href="<?php echo CFS()->get('hero_ozon_url') ?>" title="<?php echo CFS()->get('hero_ozon_text') ?>" target="_blank"><?php echo CFS()->get('hero_ozon_text') ?></a>
                        <a class="btn btn--wb hero__btn" href="<?php echo CFS()->get('hero_wb_url') ?>" title="<?php echo CFS()->get('hero_wb_text') ?>" target="_blank"><?php echo CFS()->get('hero_wb_text') ?></a>
                    </div>
                </div>
            </section>
            <section class="goods">
                <h2 class="goods__title"><?php echo CFS()->get('goods_title') ?></h2>
                <div class="goods__wrapper">
                    <button class="slider__btn slider__btn--prev goods__btn--prev">←</button>
                    <ul class="goods__list">
                        <li class="goods__item">
                            <a href="/single-product.html" title="Da Vinci">
                                <img class="goods__img" alt="Da Vinci" src="img/da-vinci.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Da Vinci Дуб</h3>
                                <span class="goods__price">3500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Минотавр">
                                <img class="goods__img" alt="Минотавр" src="img/minotavr.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Минотавр Дуб</h3>
                                <span class="goods__price">2500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Набор DnD">
                                <img class="goods__img" alt="Набор DnD" src="img/dnd.jpg" width="250"/>
                                <h3 class="goods__name">Набор DnD</h3>
                                <span class="goods__price">1500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Ловерсы">
                                <img class="goods__img" alt="Ловерсы" src="img/lovers.jpg" width="250"/>
                                <h3 class="goods__name">Ловерсы</h3>
                                <span class="goods__price">1000₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Минотавр">
                                <img class="goods__img" alt="Минотавр" src="img/minotavr-eben.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Минотавр Эбен</h3>
                                <span class="goods__price">2500₽</span>
                            </a>
                        </li>
                    </ul>
                    <button class="slider__btn slider__btn--next goods__btn--next">→</button>
                </div>
            </section>
            <section class="category">
                <h2 class="category__title"><?php echo CFS()->get('catalog_title'); ?></h2>
                <ul class="category__list">
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/golovolomki/"); ?>" title="<?php echo CFS()->get('catalog_golovolomki_name'); ?>">
                            <figure class="category__figure">
                                <img class="category__image" alt="<?php echo $golovolomki_img_alt; ?>" src="<?php echo $golovolomki_img_url; ?>" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?php echo CFS()->get('catalog_golovolomki_name'); ?></h3>
                                    <p class="category__description"><?php echo CFS()->get('catalog_golovolomki_description'); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/kartochnye-igry/"); ?>" title="<?php echo CFS()->get('catalog_kartochnye_igry_name'); ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $kartochnye_igry_img_url; ?>" alt="<?php echo $kartochnye_igry_img_alt; ?>" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?php echo CFS()->get('catalog_kartochnye_igry_name'); ?></h3>
                                    <p class="category__description"><?php echo CFS()->get('catalog_kartochnye_igry_description'); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/nabory-dlya-dnd/"); ?>" title="<?php echo CFS()->get('catalog_dnd_name'); ?>">
                            <figure class="category__figure">
                                <img class="category__image" src="<?php echo $dnd_img_url; ?>" alt="<?php echo $dnd_img_alt; ?>" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name"><?php echo CFS()->get('catalog_dnd_name'); ?></h3>
                                    <p class="category__description"><?php echo CFS()->get('catalog_dnd_description'); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
            </section>
            <section class="benefits">
                <h2 class="benefits__title"><?php echo CFS()->get('benefits_title'); ?></h2>
                <div class="benefits__list">
                    <?php
                        $loop = CFS() -> get('benefits_items');
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
            <section class="blog">
                <?php
                    $blog_title = CFS()->get('blog_title');
                    $blog_btn_text = CFS()->get('blog_btn_text');
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
                ?>
                <div class="blog__content">
                    <img class="blog__image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" width="400"/>
                    <div class="blog__description-holder">
                        <h2 class="blog__title"><?php echo $blog_title; ?></h2>
                        <p class="blog__description"><?php echo $yoast_desc; ?></p>
                        <a class="btn blog__btn" href="<?php echo home_url("/blog/"); ?>" title="<?php echo $blog_btn_text; ?>" target="_blank"><?php echo $blog_btn_text; ?></a>
                    </div>
                </div>
                <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </section>
            <section class="reviews">
                <h2 class="reviews__title"><?php echo CFS()->get('reviews_title'); ?></h2>
                <div class="reviews__wrapper">
                    <button class="slider__btn slider__btn--prev reviews__btn--prev">←</button>
                    <ul class="reviews__list">
                        <?php
                            $loop = CFS() -> get('reviews_items');
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
        </div>
    </main>
    <div class="modal" id="review-modal">
        <img src="" alt="Крупный отзыв" class="modal__img">
    </div>
<?php get_footer(); ?>  