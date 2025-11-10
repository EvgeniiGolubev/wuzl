<?php
    /* 
    * Template Name: Catalog
    */
    get_header();
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a></li>
                </ol>
            </nav>
            <section class="catalog">
                <h1 class="catalog__title">Каталог</h1>
                <div class="catalog__list">
                    <a class="catalog__item catalog__item--main" href="/category.html" title="Головоломки">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name">Головоломки</h2>
                            <p class="catalog__desc">Сложные и красивые коробочки с секретом, сделанные вручную.</p>
                        </div>
                        <img class="catalog__img" alt="Головоломки" src="img/catalog-golovolomka.png" height="350"/>
                    </a>
                    <a class="catalog__item" href="#" title="Карточные игры">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name">Карточные игры</h2>
                            <p class="catalog__desc">Неожиданные вопросы для вашей второй половинки.</p>
                        </div>
                        <img class="catalog__img" alt="Карточные игры" src="img/catalog-lovers.png" height="350"/>
                    </a>
                    <a class="catalog__item" href="#" title="Наборы для DnD">
                        <div class="catalog__item-content">
                            <h2 class="catalog__name">Наборы для DnD</h2>
                            <p class="catalog__desc">Необычные и полезные наборы для игры в DnD.</p>
                        </div>
                        <img class="catalog__img" alt="Наборы для DnD" src="img/catalog-dnd.png" height="350"/>
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>  