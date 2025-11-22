<?php
    /* 
    * Template Name: Catalog
    */
    get_header();

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
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/catalog/"); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                </ol>
            </nav>
            <section class="catalog">
                <h1 class="catalog__title"><?php the_title(); ?></h1>
                <div class="catalog__list">
                    <a class="catalog__item catalog__item--main" href="<?php echo home_url("/catalog/golovolomki/"); ?>" title="<?php echo CFS()->get('catalog_golovolomki_name'); ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?php echo CFS()->get('catalog_golovolomki_name'); ?></h2>
                            <p class="catalog__desc"><?php echo CFS()->get('catalog_golovolomki_description'); ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $golovolomki_img_alt; ?>" src="<?php echo $golovolomki_img_url; ?>" height="350"/>
                    </a>
                    <a class="catalog__item" href="<?php echo home_url("/catalog/kartochnye-igry/"); ?>" title="<?php echo CFS()->get('catalog_kartochnye_igry_name'); ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?php echo CFS()->get('catalog_kartochnye_igry_name'); ?></h2>
                            <p class="catalog__desc"><?php echo CFS()->get('catalog_golovolomki_description'); ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $kartochnye_igry_img_alt; ?>" src="<?php echo $kartochnye_igry_img_url; ?>" height="350"/>
                    </a>
                    <a class="catalog__item" href="<?php echo home_url("/catalog/nabory-dlya-dnd/"); ?>" title="<?php echo CFS()->get('catalog_dnd_name'); ?>">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name"><?php echo CFS()->get('catalog_dnd_name'); ?></h2>
                            <p class="catalog__desc"><?php echo CFS()->get('catalog_dnd_description'); ?></p>
                        </div>
                        <img class="catalog__img" alt="<?php echo $dnd_img_alt; ?>" src="<?php echo $dnd_img_url; ?>" height="350"/>
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>  