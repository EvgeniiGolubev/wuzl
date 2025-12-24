<?php
    /* 
    * Template Name: Sitemap
    */
    get_header();
    $golovolomki_term = get_term_by('slug', 'golovolomki', 'product_category');
    $kartochnye_term = get_term_by('slug', 'kartochnye-igry', 'product_category');
    $dnd_term = get_term_by('slug', 'nabory-dlya-dnd', 'product_category');
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <article class="sitemap">
                <h1 class="sitemap__title"><?php the_title(); ?></h1>
                <ul class="page__list">
                    <li class="page"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="page"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a>
                        <ul class="page__list">
                            <?php
                                $categories = [
                                    $golovolomki_term,
                                    $kartochnye_term,
                                    $dnd_term,
                                ];

                                foreach ($categories as $term) :
                                    if (!$term || is_wp_error($term)) {
                                        continue;
                                    }
                            ?>
                                <li class="page">
                                    <a class="catalog__item"
                                    href="<?php echo esc_url(get_term_link($term)); ?>"
                                    title="<?php echo esc_attr($term->name); ?>">
                                        <?php echo esc_html($term->name); ?>
                                    </a>

                                    <?php
                                        $products = new WP_Query([
                                            'post_type'      => 'product',
                                            'posts_per_page' => -1,
                                            'post_status'    => 'publish',
                                            'tax_query'      => [
                                                [
                                                    'taxonomy' => 'product_category',
                                                    'field'    => 'term_id',
                                                    'terms'    => $term->term_id,
                                                    'include_children' => true,
                                                ]
                                            ]
                                        ]);
                                        if ($products->have_posts()) :
                                    ?>
                                        <ul class="page__list">
                                            <?php while ($products->have_posts()) : $products->the_post(); ?>
                                                <li class="page">
                                                    <a href="<?php echo esc_url(get_permalink()); ?>"
                                                    title="<?php echo esc_attr(get_the_title()); ?>">
                                                        <?php echo esc_html(get_the_title()); ?>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php wp_reset_postdata(); endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="page"><a href="<?php echo home_url("/kak-otkryt-derevyannuyu-golovolomku/"); ?>" title="Как открыть деревянную головоломку?">Открыть головоломку</a></li>
                    <li class="page"><a href="<?php echo home_url("/o-nas/"); ?>" title="О нас">О нас</a></li>
                    <li class="page">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>" title="Блог">Блог</a>

                        <?php
                            $blog_posts = new WP_Query([
                                'post_type'      => 'post',
                                'posts_per_page' => -1,        // все статьи
                                'post_status'    => 'publish',
                            ]);

                            if ($blog_posts->have_posts()) :
                        ?>
                            <ul class="page__list">
                                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                                    <li class="page">
                                        <a href="<?php echo esc_url(get_permalink()); ?>"
                                        title="<?php echo esc_attr(get_the_title()); ?>">
                                            <?php echo esc_html(get_the_title()); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php wp_reset_postdata(); endif; ?>
                    </li>
                    <li class="page"><a href="<?php echo home_url("/kontakty/"); ?>" title="Контакты">Контакты</a></li>
                    <li class="page"><a href="<?php echo home_url("/politika-konfidencialnosti/"); ?>" title="Политика конфиденциальности">Политика конфиденциальности</a></li>
                </ul>
            </article>
        </div>
    </main>
<?php get_footer(); ?>