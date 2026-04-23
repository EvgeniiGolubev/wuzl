    <footer class="footer">
        <div class="footer__container container">
            <div class="footer__info">
                <p class="footer__copy">© 2026 Деревянные головоломки и игры.<br> Все права защищены.</p>
                <a href="<?php echo home_url("/politika-konfidencialnosti/"); ?>" class="footer__policy" title="Политика конфиденциальности">Политика конфиденциальности</a>
                <a href="<?php echo home_url("/karta-sajta/"); ?>" class="footer__sitemap" title="Карта сайта">Карта сайта</a>
            </div>
            <nav class="footer__menu">
                <span class="footer__menu-title">Категории</span>
                <ul class="footer__menu-list">
                    <li class="footer__menu-item"><a href="<?php echo home_url("/catalog/derevyannye-golovolomki/"); ?>" title="Квест боксы" aria-current="page">Квест боксы</a></li>
                    <li class="footer__menu-item"><a href="<?php echo home_url("/catalog/kartochnye-igry-dlya-par/"); ?>" title="Карточки с вопросами для пар">Карточки с вопросами для пар</a></li>
                    <li class="footer__menu-item"><a href="<?php echo home_url("/catalog/igrovye-nabory-dlya-dnd/"); ?>" title="Игровые наборы для ДнД">Игровые наборы для ДнД</a></li>
                </ul>
            </nav>
            <div class="footer__contacts-block">
                <address class="footer__contacts">
                    <a class="footer__contact" rel="nofollow" href="mailto:wuzl.job@yandex.ru" title="Электронная почта"><i class="fa-solid fa-envelope fa-xl"></i>wuzl.job@yandex.ru</a>
                    <a class="footer__contact" rel="nofollow" href="tel:+79995262622" title="Номер телефона"><i class="fa-solid fa-phone fa-xl"></i>+7 (999) 526 26 22</a>
                </address>
                <div class="footer__social-links">
                    <a class="footer__social-link" rel="nofollow" href="https://vk.com/wuzlru" title="Группа в ВК" ><i class="fa-brands fa-vk fa-2xl"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <button class="up-button" type="button">
        <div class="arrow-top"></div>
    </button>
    <?php wp_footer(); ?>
</body>
</html>