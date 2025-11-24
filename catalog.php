<?php
    /* 
    * Template Name: Catalog
    */
    get_header();

    $fields = CFS()->get(false, get_the_ID());

    $golovolomki_img_id  = $fields['catalog_golovolomki_img'];
    $golovolomki_img_url = wp_get_attachment_image_url($golovolomki_img_id, 'full');
    $golovolomki_img_alt = get_post_meta($golovolomki_img_id, '_wp_attachment_image_alt', true);

    $kartochnye_igry_img_id  = $fields['catalog_kartochnye_igry_img'];
    $kartochnye_igry_img_url = wp_get_attachment_image_url($kartochnye_igry_img_id, 'full');
    $kartochnye_igry_img_alt = get_post_meta($kartochnye_igry_img_id, '_wp_attachment_image_alt', true);

    $dnd_img_id  = $fields['catalog_dnd_img'];
    $dnd_img_url = wp_get_attachment_image_url($dnd_img_id, 'full');
    $dnd_img_alt = get_post_meta($dnd_img_id, '_wp_attachment_image_alt', true);
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
            <section class="catalog">
                <h1 class="catalog__title"><?php the_title(); ?></h1>
                <div class="catalog__list">
                    <?php $term = get_term_by('slug', 'golovolomki', 'product_category'); ?>
                    <a class="catalog__item catalog__item--main" href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_golovolomki_name']; ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?= $fields['catalog_golovolomki_name']; ?></h2>
                            <p class="catalog__desc"><?= $fields['catalog_golovolomki_description']; ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $golovolomki_img_alt; ?>" src="<?php echo $golovolomki_img_url; ?>" height="350"/>
                    </a>
                    <?php $term = get_term_by('slug', 'kartochnye-igry', 'product_category'); ?>
                    <a class="catalog__item" href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_kartochnye_igry_name']; ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?= $fields['catalog_kartochnye_igry_name']; ?></h2>
                            <p class="catalog__desc"><?= $fields['catalog_kartochnye_igry_description']; ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $kartochnye_igry_img_alt; ?>" src="<?php echo $kartochnye_igry_img_url; ?>" height="350"/>
                    </a>
                    <?php $term = get_term_by('slug', 'nabory-dlya-dnd', 'product_category'); ?>
                    <a class="catalog__item" href="<?= get_term_link($term); ?>" title="<?= $fields['catalog_dnd_name']; ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?= $fields['catalog_dnd_name']; ?></h2>
                            <p class="catalog__desc"><?= $fields['catalog_dnd_description']; ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $dnd_img_alt; ?>" src="<?php echo $dnd_img_url; ?>" height="350"/>
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>  