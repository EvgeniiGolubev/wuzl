<?php 
    get_header();
    $category = get_queried_object();
    $cat_name = $category->name;
    $cat_slug = $category->slug;
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/catalog/" . $cat_slug . "/"); ?>" title="<?php echo esc_html( $cat_name ); ?>"><?php echo esc_html( $cat_name ); ?></a></li>
                </ol>
            </nav>
            <section class="category">
                <h1 class="category__title"><?php echo esc_html( $cat_name ); ?></h1>
                <ul class="category__list">
                    <li class="category__item">
                        <a href="/single-product.html" title="Da Vinci Дуб">
                            <img class="category__img" alt="Da Vinci Дуб" src="img/da-vinci.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Da Vinci Дуб</h3>
                            <span class="category__price">3500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Da Vinci Мокко">
                            <img class="category__img" alt="Da Vinci Мокко" src="img/da-vinci-mokko.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Da Vinci Мокко</h3>
                            <span class="category__price">3500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Da Vinci Эбен">
                            <img class="category__img" alt="Da Vinci Эбен" src="img/da-vinci-eben.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Da Vinci Эбен</h3>
                            <span class="category__price">3500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Da Vinci Орех">
                            <img class="category__img" alt="Da Vinci Орех" src="img/da-vinci-oreh.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Da Vinci Орех</h3>
                            <span class="category__price">3500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Минотавр Дуб">
                            <img class="category__img" alt="Минотавр Дуб" src="img/minotavr.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Минотавр Дуб</h3>
                            <span class="category__price">2500₽</span>
                        </a>                        
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Минотавр Орех">
                            <img class="category__img" alt="Минотавр Орех" src="img/minotavr-oreh.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Минотавр Орех</h3>
                            <span class="category__price">2500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Минотавр Мокко">
                            <img class="category__img" alt="Минотавр Мокко" src="img/minotavr-mokko.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Минотавр Мокко</h3>
                            <span class="category__price">2500₽</span>
                        </a>
                    </li>
                    <li class="category__item">
                        <a href="/single-product.html" title="Минотавр Эбен">
                            <img class="category__img" alt="Минотавр Эбен" src="img/minotavr-eben.jpg" width="250"/>
                            <h3 class="category__name">Головоломка Минотавр Эбен</h3>
                            <span class="category__price">2500₽</span>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
    </main>
<?php get_footer(); ?>