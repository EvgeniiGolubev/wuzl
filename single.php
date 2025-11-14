<?php get_header(); ?>
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
                    <a href="/single-post.html" class="post-nav post-nav--prev">
                        ← <span>Как выбрать настольную игру для компании</span>
                    </a>
                    <a href="/single-post.html" class="post-nav post-nav--next">
                        <span>10 лучших головоломок для всей семьи</span> →
                    </a>
                </section>
                <section class="another-posts">
                    <h2 class="another-posts__title">Читайте также</h2>
                    <ul class="another-posts__list">
                        <li class="another-posts__item">
                            <a href="/single-post.html" title="Другая статья">
                                <figure class="another-posts__figure">
                                    <img class="another-posts__image" src="img/blog/nastolnaya-igra.jpg" alt="" width="300">
                                    <figcaption class="another-posts__info">
                                        <h3 class="another-posts__name">Топ настольных игр на двоих</h3>
                                        <p class="another-posts__description">Топ настольных игр на двоих 2025: карточные и классические настолки, лучшие игры для 2 человек. Обзор, рейтинг и советы, в какие настолки поиграть вдвоем.</p>
                                    </figcaption>
                            </figure>
                            </a>
                        </li>
                        <li class="another-posts__item">
                            <a href="/single-post.html" title="Другая статья">
                                <figure class="another-posts__figure">
                                    <img class="another-posts__image" src="img/blog/nastolnaya-igra.jpg" alt="" width="300">
                                    <figcaption class="another-posts__info">
                                        <h3 class="another-posts__name">Топ настольных игр на двоих</h3>
                                        <p class="another-posts__description">Топ настольных игр на двоих 2025: карточные и классические настолки, лучшие игры для 2 человек. Обзор, рейтинг и советы, в какие настолки поиграть вдвоем.</p>
                                    </figcaption>
                            </figure>
                            </a>
                        </li>
                        <li class="another-posts__item">
                            <a href="/single-post.html" title="Другая статья">
                                <figure class="another-posts__figure">
                                    <img class="another-posts__image" src="img/blog/nastolnaya-igra.jpg" alt="" width="300">
                                    <figcaption class="another-posts__info">
                                        <h3 class="another-posts__name">Топ настольных игр на двоих</h3>
                                        <p class="another-posts__description">Топ настольных игр на двоих 2025: карточные и классические настолки, лучшие игры для 2 человек. Обзор, рейтинг и советы, в какие настолки поиграть вдвоем.</p>
                                    </figcaption>
                            </figure>
                            </a>
                        </li>
                    </ul>
                </section>
            </article>
        </div>
    </main>
<?php get_footer(); ?>