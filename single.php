<?php 
    get_header();
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    $current_id = get_the_ID();
    $recent_posts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [$current_id],
        'orderby'        => 'date',
        'order'          => 'DESC'
    ]);
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/blog/"); ?>" title="Блог">Блог</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                </ol>
            </nav>
            <!-- todo: обтекающий текст для фотографий для десктопной версии? -->
            <article class="post">
                <section class="post__content">
                    <h1 class="post__title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </section>
                <section class="post-navigation">
                    <?php if ( $prev_post ) : ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="post-nav post-nav--prev">
                            ← <span><?php echo get_the_title($prev_post->ID); ?></span>
                        </a>
                    <?php endif; ?>
                    <div></div>
                    <?php if ( $next_post ) : ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="post-nav post-nav--next">
                            <span><?php echo get_the_title($next_post->ID); ?></span> →
                        </a>
                    <?php endif; ?>
                </section>
                <?php if ( $recent_posts->have_posts() ) : ?>
                    <section class="another-posts">
                        <h2 class="another-posts__title">Читайте также</h2>
                        <ul class="another-posts__list">
                            <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                <li class="another-posts__item">
                                    <a href="/single-post.html" title="Другая статья">
                                        <figure class="another-posts__figure">
                                            <?php
                                                $thumb_id = get_post_thumbnail_id( get_the_ID() );
                                                $img_url = wp_get_attachment_image_url( $thumb_id, 'large' );
                                                $img_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                                            ?>
                                            <img class="another-posts__image" src="<?php echo $img_url; ?>" alt="<?php echo esc_attr($img_alt); ?>" width="300">
                                            <figcaption class="another-posts__info">
                                                <h3 class="another-posts__name"><?php the_title(); ?></h3>
                                                <p class="another-posts__description"><?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ); ?></p>
                                            </figcaption>
                                    </figure>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                <?php endif; ?>
            </article>
        </div>
    </main>
<?php get_footer(); ?>