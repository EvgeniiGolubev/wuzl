<?php 
    get_header();

    $category = get_queried_object();
    $cat_name = $category->name;
    $cat_slug = $category->slug;
    $cat_description = $category->description;

    $query = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => [
            [
                'taxonomy' => 'product_category',
                'field'    => 'slug',
                'terms'    => $cat_slug,
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
                    <li class="bread-crumbs__item" aria-current="page"><?php echo esc_html( $cat_name ); ?></li>
                </ol>
            </nav>
            <section class="category">
                <h1 class="category__title"><?php echo esc_html( $cat_name ); ?></h1>
                <?php if ($query->have_posts()): ?>
                <ul class="category__list">
                    <?php 
                        while ($query->have_posts()): 
                            $query->the_post(); 
                            $thumb_id = get_post_thumbnail_id();
                            $img_url  = wp_get_attachment_image_url($thumb_id, 'large');
                            $img_alt  = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    ?>
                        <li class="category__item">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img class="category__img" alt="<?php echo esc_attr($img_alt); ?>" src="<?php echo $img_url; ?>" width="250"/>
                                <h3 class="category__name"><?php the_title(); ?></h3>
                                <span class="category__price"><?php echo CFS()->get('card_price'); ?> ₽</span>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; wp_reset_postdata();?>
                <?php if ( !empty($cat_description) ): ?>
                    <div class="category__description">
                        <?php echo wp_kses_post($cat_description); ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
<?php get_footer(); ?>