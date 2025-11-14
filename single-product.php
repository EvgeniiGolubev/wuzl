<?php get_header(); ?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="/" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="/catalog.html" title="Каталог">Каталог</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="/category.html" title="Головоломки">Головоломки</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="/single-product.html" title="Головоломка Da Vinci Дуб">Головоломка Da Vinci Дуб</a></li>
                </ol>
            </nav>
            <article class="card">
                <h1 class="card__title">Головоломка Da Vinci Дуб</h1>
                <div class="card__body">
                    <div class="card__gallery">
                        <div class="images__wrapper">
                            <button class="slider__btn slider__btn--prev images__btn--prev">←</button>
                            <ul class="images__list">
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci.jpg" width="600"/>
                                </li>
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci-1.jpg" width="600"/>
                                </li>
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci-2.jpg" width="600"/>
                                </li>
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci-3.jpg" width="600"/>
                                </li>
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci-4.jpg" width="600"/>
                                </li>
                                <li class="images__item">
                                    <img class="card__image" alt="Da Vinci" src="img/da-vinci-5.jpg" width="600"/>
                                </li>
                            </ul>
                            <button class="slider__btn slider__btn--next images__btn--next">→</button>
                        </div>
                        <ul class="card__thumbnails">
                            <li class="card__thumbnail card__thumbnail--active" >
                                <img alt="Da Vinci" src="img/da-vinci.jpg" width="170"/>
                            </li>
                            <li class="card__thumbnail">
                                <img alt="Da Vinci" src="img/da-vinci-1.jpg" width="170"/>
                            </li>
                            <li class="card__thumbnail">
                                <img alt="Da Vinci" src="img/da-vinci-2.jpg" width="170"/>
                            </li>
                            <li class="card__thumbnail">
                                <img alt="Da Vinci" src="img/da-vinci-3.jpg" width="170"/>
                            </li>
                            <li class="card__thumbnail">
                                <img alt="Da Vinci" src="img/da-vinci-4.jpg" width="170"/>
                            </li>
                            <li class="card__thumbnail">
                                <img alt="Da Vinci" src="img/da-vinci-5.jpg" width="170"/>
                            </li>
                        </ul>
                    </div>
                    <div class="card__content">
                        <span class="card__price">2 500 ₽</span>
                        <span class="card__stock">Остаток: 5 шт.</span>
                        <div class="card__description">
                            <p>
                                Квест-бокс Da Vinci - деревянная головоломка с секретом!<br>
                                Раскройте тайны гениального Леонардо с нашей шкатулкой-кубом Da Vinci – стильной деревянной головоломкой, где каждый механизм хранит зашифрованное послание, а секретный отсек ждет вашего особенного подарка!<br>
                                Погрузитесь в мир тайн Леонардо да Винчи с квест-кубом Da Vinci - деревянной головоломкой уровня medium, которая станет идеальным подарком для взрослых и подростков от 14 лет.
                            </p>
                            <h3 class="card__subtitle">Характеристики:</h3>
                            <ul class="card__features">
                                <li class="card__feature">Размер: 120х120х120</li>
                                <li class="card__feature">Цвет: Дуб (светлый)</li>
                                <li class="card__feature">Время на разгадывание головоломки: от 40 минут</li>
                                <li class="card__feature">Возраст: 14+</li>
                            </ul>
                        </div>
                        <div class="card__actions">
                            <a class="btn btn--ozon card__btn" href="#" title="Купить на OZON" target="_blank">Купить на OZON</a>
                            <a class="btn btn--wb card__btn" href="#" title="Купить на WB" target="_blank">Купить на WB</a>
                        </div>
                    </div>
                </div>
            </article>
            <section class="goods">
                <h2 class="goods__title">Похожие товары</h2>
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
            <section class="reviews">
                <h2 class="reviews__title">Отзывы</h2>
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
<?php get_footer(); ?>