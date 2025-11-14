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
                    <li class="blog__item">
                        <a href="/single-post.html" title="Топ настольных игр на двоих">
                            <figure class="blog__figure">
                                <img class="blog__image" src="img/blog/nastolnaya-igra.jpg" alt="" width="300">
                                <figcaption class="blog__info">
                                    <h2 class="blog__name">Топ настольных игр на двоих</h2>
                                    <p class="blog__description">Топ настольных игр на двоих 2025: карточные и классические настолки, лучшие игры для 2 человек. Обзор, рейтинг и советы, в какие настолки поиграть вдвоем.</p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
            </article>
        </div>
    </main>
<?php get_footer(); ?>