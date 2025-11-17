<?php get_header(); ?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/blog/"); ?>" title="Блог">Блог</a></li>
                </ol>
            </nav>
            <article class="blog">
                <h1 class="blog__title">Блог</h1>
                <ul class="blog__list">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li class="blog__item">
                            <a href="<?php the_permalink(); ?>" title="Топ настольных игр на двоих">
                                <figure class="blog__figure">
                                    <?php
                                        $thumb_id = get_post_thumbnail_id( get_the_ID() );
                                        $img_url = wp_get_attachment_image_url( $thumb_id, 'large' );
                                        $img_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                                    ?>
                                    <img class="blog__image" src="<?php echo $img_url; ?>" alt="<?php echo esc_attr($img_alt); ?>" width="300">
                                    <figcaption class="blog__info">
                                        <h2 class="blog__name"><?php the_title(); ?></h2>
                                        <p class="blog__description"><?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ); ?></p>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    <?php endwhile; endif; ?>
                </ul>
            </article>
        </div>
    </main>
<?php get_footer(); ?>