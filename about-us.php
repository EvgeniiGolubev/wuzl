<?php
    /* 
    * Template Name: About us
    */
    get_header();
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/o-nas/"); ?>" title="О нас">О нас</a></li>
                </ol>
            </nav>
            <article class="about-us">
                <h1 class="about-us__title">О нас</h1>
                <section class="company">
                    <h2 class="company__title">О компании</h2>
                    <div class="company__content">
                        <div class="company__description-holder">
                            <p class="company__description">
                                WUZL — мастерская из Санкт-Петербурга, где создают деревянные головоломки и авторские карточные игры. Мы объединяем ремесло и современный дизайн, чтобы каждая вещь приносила радость и развивала внимание, логику и воображение.
                            </p>
                            <p class="company__description">
                                Все изделия производятся из натурального дерева, проходят ручную обработку и контроль качества. Мы уделяем внимание каждой детали — от удобства сборки до эстетики упаковки.
                            </p>
                            <p class="company__description">
                                Карточные игры WUZL продуманы так, чтобы объединять людей за столом и создавать атмосферу живого общения. Наши головоломки — это не просто игрушки, а способ провести время с пользой и удовольствием.
                            </p>
                        </div>
                        <img class="company__image" src="img/o-kompanii-golovolomka.jpg" alt="Головолмки" width="400"/>
                    </div>
                </section>
                <section class="team">
                    <h2 class="team__title">Наша команда</h2>
                    <ul class="team__list">
                        <li class="team__item">
                            <figure class="team__figure">
                                <img class="team__image" src="img/Kosty.jpg" alt="Костя — директор компании WUZL" width="300">
                                <figcaption class="team__info">
                                    <span class="team__name">Константин</span>
                                    <span class="team__post">Основатель и директор производства</span>
                                    <hr>
                                    <p class="team__description">Константин отвечает за идеи, разработку новых моделей и общее направление развития компании.</p>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="team__item">
                            <figure class="team__figure">
                                <img class="team__image" src="img/Dasha.jpg" alt="Костя — кладовщик" width="300">
                                <figcaption class="team__info">
                                    <span class="team__name">Дарья</span>
                                    <span class="team__post">Главный менеджер проекта</span>
                                    <hr>
                                    <p class="team__description">Дарья следит за процессами, координирует задачи и обеспечивает стабильную работу всей команды.</p>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="team__item">
                            <figure class="team__figure">
                                <img class="team__image" src="img/Mihail.jpg" alt="Миша — сбощик" width="300">
                                <figcaption class="team__info">
                                    <span class="team__name">Михаил</span>
                                    <span class="team__post">Глава производственного отдела</span>
                                    <hr>
                                    <p class="team__description">Михаил контролирует сборку и качество головоломок, следит за точностью на каждом этапе изготовления.</p>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </section>
                <section class="production">
                    <h2 class="production__title">Наше производство</h2>
                    <div class="production__content">
                        <img class="production__image" src="img/proizvodstvo.jpg" alt="Производство" width="400"/>
                        <div class="production__description-holder">
                            <p class="production__description">
                                Производство WUZL расположено в Санкт-Петербурге. Все изделия создаются на современном оборудовании, где ключевую роль играет ЧПУ-станок — он обеспечивает высокую точность резки и идеальную подгонку деталей.
                            </p>
                            <p class="production__description">
                                Каждая головоломка проходит несколько этапов: проектирование, лазерная или фрезерная обработка, шлифовка, сборка и финальная проверка качества. Благодаря сочетанию ручного труда и автоматизации мы добиваемся стабильного результата и безупречной геометрии элементов.
                            </p>
                            <p class="production__description">
                                Используем только экологичные породы дерева и безопасные покрытия. Производственный процесс WUZL построен так, чтобы сохранить естественную красоту материала и придать каждой головоломке индивидуальный характер.
                            </p>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>
<?php get_footer(); ?>  