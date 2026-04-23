<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php 
        wp_head(); 
        $logo_id  = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($logo_id, 'full');
    ?>
    <meta name="google-site-verification" content="QhipNJAeOgG1w4eKmU-ABzIKOa5BYtCU0LPKmJa8HYQ" />
    <meta name="yandex-verification" content="fa6c1ee650b7c159" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105779475', 'ym');
    
        ym(105779475, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/105779475" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <div class="header__logo">
                <a href="<?php echo home_url("/"); ?>" title="Главная"><img class="logo__img" alt="Логотип" src="<?php echo $logo_url; ?>" width="150"/></a>
            </div>
            <nav class="header__menu--mobile">
                <ul class="menu__list--mobile menu__list-close">
                    <li class="menu__item--mobile <?php if (is_front_page() || is_page("karta-sajta")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/"); ?>" title="Главная" aria-current="page">Главная</a></li>
                    <li class="menu__item--mobile <?php if (is_page("catalog") || is_tax('product_category') || is_singular('product')) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a></li>
                    <li class="menu__item--mobile <?php if (is_page("kak-otkryt-derevyannuyu-golovolomku")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/kak-otkryt-derevyannuyu-golovolomku/"); ?>" title="Как открыть деревянную головоломку?">Открыть головоломку</a></li>
                    <li class="menu__item--mobile <?php if (is_page("o-nas") || is_page("politika-konfidencialnosti")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/o-nas/"); ?>" title="О нас">О нас</a></li>
                    <li class="menu__item--mobile <?php if (is_home() || (is_single() && get_post_type() === 'post')) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/blog/"); ?>" title="Блог">Блог</a></li>
                    <li class="menu__item--mobile <?php if (is_page("kontakty")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/kontakty/"); ?>" title="Контакты">Контакты</a></li>
                </ul>
                <div class="menu__icon">
                    <span></span>
                </div>
            </nav>
            <nav class="header__menu">
                <ul class="menu__list">
                    <li class="menu__item <?php if (is_front_page() || is_page("karta-sajta")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/"); ?>" title="Главная" aria-current="page">Главная</a></li>
                    <li class="menu__item <?php if (is_page("catalog") || is_tax('product_category') || is_singular('product')) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/catalog/"); ?>" title="Каталог">Каталог</a></li>
                    <li class="menu__item <?php if (is_page("kak-otkryt-derevyannuyu-golovolomku")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/kak-otkryt-derevyannuyu-golovolomku/"); ?>" title="Как открыть деревянную головоломку?">Открыть головоломку</a></li>
                    <li class="menu__item <?php if (is_page("o-nas") || is_page("politika-konfidencialnosti")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/o-nas/"); ?>" title="О нас">О нас</a></li>
                    <li class="menu__item <?php if (is_home() || (is_single() && get_post_type() === 'post')) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/blog/"); ?>" title="Блог">Блог</a></li>
                    <li class="menu__item <?php if (is_page("kontakty")) echo "menu__item--active"; ?>"><a href="<?php echo home_url("/kontakty/"); ?>" title="Контакты">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>