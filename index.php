<?php get_header(); ?>  
    <main class="main">
        <div class="main__container container">
            <section class="hero">
                <div class="hero__img-holder">
                    <img class="hero__img" alt="Головоломка Wuzl" src="img/blob.png" width="450"/>
                </div>
                <div class="hero__content">
                    <h1 class="hero__title">Деревянные головоломки и игры</h1>
                    <div class="hero__btn-holder">
                        <a class="btn btn--ozon hero__btn" href="#" title="Купить на OZON" target="_blank">Купить на OZON</a>
                        <a class="btn btn--wb hero__btn" href="#" title="Купить на WB" target="_blank">Купить на WB</a>
                    </div>
                </div>
            </section>
            <section class="goods">
                <h2 class="goods__title">Популярные товары</h2>
                <div class="goods__wrapper">
                    <button class="slider__btn slider__btn--prev goods__btn--prev">←</button>
                    <ul class="goods__list">
                        <li class="goods__item">
                            <a href="/single-product.html" title="Da Vinci">
                                <img class="goods__img" alt="Da Vinci" src="img/da-vinci.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Da Vinci Дуб</h3>
                                <span class="goods__price">3500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Минотавр">
                                <img class="goods__img" alt="Минотавр" src="img/minotavr.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Минотавр Дуб</h3>
                                <span class="goods__price">2500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Набор DnD">
                                <img class="goods__img" alt="Набор DnD" src="img/dnd.jpg" width="250"/>
                                <h3 class="goods__name">Набор DnD</h3>
                                <span class="goods__price">1500₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Ловерсы">
                                <img class="goods__img" alt="Ловерсы" src="img/lovers.jpg" width="250"/>
                                <h3 class="goods__name">Ловерсы</h3>
                                <span class="goods__price">1000₽</span>
                            </a>
                        </li>
                        <li class="goods__item">
                            <a href="/single-product.html" title="Минотавр">
                                <img class="goods__img" alt="Минотавр" src="img/minotavr-eben.jpg" width="250"/>
                                <h3 class="goods__name">Головоломка Минотавр Эбен</h3>
                                <span class="goods__price">2500₽</span>
                            </a>
                        </li>
                    </ul>
                    <button class="slider__btn slider__btn--next goods__btn--next">→</button>
                </div>
            </section>
            <section class="category">
                <h2 class="category__title">Мы предлагаем</h2>
                <ul class="category__list">
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/golovolomki/"); ?>" title="Головоломки">
                            <figure class="category__figure">
                                <img class="category__image" src="img/catalog-golovolomka.png" alt="Головоломки" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name">Головоломки</h3>
                                    <p class="category__description">Сложные и красивые коробочки с секретом, сделанные вручную.</p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/kartochnye-igry/"); ?>" title="Карточные игры">
                            <figure class="category__figure">
                                <img class="category__image" src="img/catalog-lovers.png" alt="Карточные игры" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name">Карточные игры</h3>
                                    <p class="category__description">Неожиданные вопросы для вашей второй половинки.</p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="<?php echo home_url("/catalog/nabory-dlya-dnd/"); ?>" title="Наборы для DnD">
                            <figure class="category__figure">
                                <img class="category__image" src="img/catalog-dnd.png" alt="Наборы для DnD" width="300">
                                <figcaption class="category__info">
                                    <h3 class="category__name">Наборы для DnD</h3>
                                    <p class="category__description">Необычные и полезные наборы для игры в DnD.</p>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
            </section>
            <section class="benefits">
                <h2 class="benefits__title">Наши преимущества</h2>
                <div class="benefits__list">
                    <div class="benefits__item">
                        <img class="benefits__img" alt="Экологично" src="img/leaf.png" width="150" height="150"/>
                        <h3 class="benefits__name">Экологично</h3>
                    </div>
                    <div class="benefits__item">
                        <img class="benefits__img" alt="Ручная работа" src="img/hand.png" width="150" height="150"/>
                        <h3 class="benefits__name">Ручная работа</h3>
                    </div>
                    <div class="benefits__item">
                        <img class="benefits__img" alt="Быстрая доставка" src="img/car.png" width="150" height="150"/>
                        <h3 class="benefits__name">Быстрая доставка</h3>
                    </div>
                </div>
            </section>
            <section class="blog">
                <div class="blog__content">
                    <img class="blog__image" src="img/blog/nastolnaya-igra.jpg" alt="Статья в блоге" width="400"/>
                    <div class="blog__description-holder">
                        <h2 class="blog__title">Наш блог</h2>
                        <p class="blog__description">
                            Топ настольных игр на двоих 2025: карточные и классические настолки, лучшие игры для 2 человек. Обзор, рейтинг и советы, в какие настолки поиграть вдвоем.
                        </p>
                        <a class="btn blog__btn" href="/blog.html" title="Читайте в блоге" target="_blank">Читайте в блоге</a>
                    </div>
                </div>
            </section>
            <section class="reviews">
                <h2 class="reviews__title">Отзывы о нас</h2>
                <div class="reviews__wrapper">
                    <button class="slider__btn slider__btn--prev reviews__btn--prev">←</button>
                    <ul class="reviews__list">
                        <li class="reviews__item">
                            <img class="reviews__img" alt="Отзыв" src="img/first-review.jpg" width="550"/>
                        </li>
                        <li class="reviews__item">
                            <img class="reviews__img" alt="Отзыв" src="img/second-review.jpg" width="550"/>
                        </li>
                        <li class="reviews__item">
                            <img class="reviews__img" alt="Отзыв" src="img/third-review.jpg" width="550"/>
                        </li>
                        <li class="reviews__item">
                            <img class="reviews__img" alt="Отзыв" src="img/fourth-review.jpg" width="550"/>
                        </li>
                    </ul>
                    <button class="slider__btn slider__btn--next reviews__btn--next">→</button>
                </div>
            </section>
        </div>
    </main>
    <div class="modal" id="review-modal">
        <img src="" alt="Крупный отзыв" class="modal__img">
    </div>
<?php get_footer(); ?>  