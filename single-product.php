<?php 
    get_header();

    $fields = CFS()->get(false, get_the_ID());
    
    $terms = get_the_terms(get_the_ID(), 'product_category');
    $term = $terms && !is_wp_error($terms) ? $terms[0] : null;

    $query = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => 6,
        'tax_query'      => [
            [
                'taxonomy' => 'product_category',
                'field'    => 'slug',
                'terms'    => $term,
            ]
        ]
    ]);
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo get_term_link($term); ?>" title="<?php echo esc_html($term->name); ?>"><?php echo esc_html($term->name); ?></a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <article class="card">
                <h1 class="card__title"><?php the_title(); ?></h1>
                <div class="card__body">
                    <div class="card__gallery">
                        <div class="images__wrapper">
                            <button class="slider__btn slider__btn--prev images__btn--prev">←</button>
                            <ul class="images__list">
                                <?php
                                    $loop = $fields['images_list'];
                                    foreach ($loop as $row):
                                        $images_item_id  = $row['images_item'];
                                        $images_item_url = wp_get_attachment_image_url($images_item_id, 'full');
                                        $images_item_alt = get_post_meta($images_item_id, '_wp_attachment_image_alt', true);
                                ?>
                                    <li class="images__item">
                                        <img class="card__image" alt="<?php echo $images_item_alt; ?>" src="<?php echo $images_item_url; ?>" width="600"/>
                                    </li>
                                <?php endforeach?>
                            </ul>
                            <button class="slider__btn slider__btn--next images__btn--next">→</button>
                        </div>
                        <ul class="card__thumbnails">
                            <?php
                                $loop = $fields['images_list'];
                                foreach ($loop as $row):
                                    $images_item_id  = $row['images_item'];
                                    $images_item_url = wp_get_attachment_image_url($images_item_id, 'full');
                                    $images_item_alt = get_post_meta($images_item_id, '_wp_attachment_image_alt', true);
                            ?>
                                <li class="card__thumbnail" >
                                    <img alt="<?php echo $images_item_alt; ?>" src="<?php echo $images_item_url; ?>" width="170"/>
                                </li>
                            <?php endforeach?>
                        </ul>
                    </div>
                    <div class="card__content">
                        <span class="card__price"><?= $fields['card_price']; ?> ₽</span>
                        <span class="card__stock">Остаток: <?= $fields['card_stock']; ?> шт.</span>
                        <div class="card__description">
                            <?php the_content(); ?>
                        </div>
                        <div class="card__actions">
                            <a class="btn btn--ozon card__btn" href="<?= $fields['ozon_btn_url']; ?>" title="<?= $fields['ozon_btn_text']; ?>" target="_blank"><?= $fields['ozon_btn_text']; ?></a>
                            <a class="btn btn--wb card__btn" href="<?= $fields['wb_btn_url']; ?>" title="<?= $fields['wb_btn_text']; ?>" target="_blank"><?= $fields['wb_btn_text']; ?></a>
                        </div>
                    </div>
                </div>
            </article>
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
                                    <span class="goods__price"><?php echo CFS()->get('card_price'); ?> ₽</span>
                                </a>
                            </li>
                           <?php endwhile; ?>
                        </ul>
                        <button class="slider__btn slider__btn--next goods__btn--next">→</button>
                    </div>
                </section>
            <?php endif; wp_reset_postdata(); ?>
            <section class="reviews">
                <h2 class="reviews__title"><?= $fields['reviews_title']; ?></h2>
                <div class="reviews__wrapper">
                    <button class="slider__btn slider__btn--prev reviews__btn--prev">←</button>
                    <ul class="reviews__list">
                        <?php
                            $loop = $fields['reviews_list'];
                            foreach ($loop as $row):
                                $reviews_item_id  = $row['reviews_item'];
                                $reviews_item_url = wp_get_attachment_image_url($reviews_item_id, 'full');
                                $reviews_item_alt = get_post_meta($reviews_item_id, '_wp_attachment_image_alt', true);
                        ?>
                            <li class="reviews__item">
                                <img class="reviews__img" alt="<?php echo $reviews_item_alt; ?>" src="<?php echo $reviews_item_url; ?>" width="550"/>
                            </li>
                        <?php endforeach?>
                    </ul>
                    <button class="slider__btn slider__btn--next reviews__btn--next">→</button>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>