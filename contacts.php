<?php
    /* 
    * Template Name: Contacts
    */
    get_header();
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/kontakty/"); ?>" title="Контакты">Контакты</a></li>
                </ol>
            </nav>
            <article class="contacts">
                <section class="contacts__body">
                    <div class="contacts__content">
                        <h1 class="contacts__title">Контакты</h1>
                        <ul class="contacts__list">
                            <li><a rel="nofollow" href="mailto:wuzl.job@yandex.ru" title="Электронная почта"><i class="fa-solid fa-envelope fa-xl"></i> wuzl.job@yandex.ru</a></li>
                            <li><a rel="nofollow" href="tel:+79833202334" title="Номер телефона"><i class="fa-solid fa-phone fa-xl"></i> +7 (983) 320-23-34</a></li>
                            <li><i class="fa-solid fa-building fa-2xl"></i> Реквизиты:
                                <ul>
                                    <li>ИП Миненко Максим Геннадьевич</li>
                                    <li>ИНН: 540307154465</li>
                                    <li>ОГРНИП: 321547600140359</li>
                                    <li>Санкт-Петербург, улица Зайцева, 4к2</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?ll=30.261682%2C59.871039&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NzQwNDY5MBJM0KDQvtGB0YHQuNGPLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0YPQu9C40YbQsCDQl9Cw0LnRhtC10LLQsCwgNNC6MiIKDewX8kEV8ntvQg%2C%2C&source=serp_navig&z=17"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                </section>
                <section class="feedback">
                    <h2 class="feedback__title">Связаться с нами</h2>
                    <form class="feedback__form" action="#" method="post">
                        <input type="text" name="name" placeholder="Ваше имя" required>
                        <input type="email" name="email" placeholder="Ваш e-mail" required>
                        <textarea name="message" placeholder="Ваше сообщение" required></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                </section>         
            </article>
        </div>
    </main>
<?php get_footer(); ?>  