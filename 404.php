<?php get_header(); ?>
    <main class="main">
        <div class="main__container container">
            <section class="page-error">
                <h1 class="page-error__title">Ошибка 404</h1>
                <p class="page-error__description">К сожаленю, такой страницы не существует!</p>
                <a class="page-error__link" href="<?php echo home_url("/"); ?>" title="На главную">На главную</a>
            </section>
        </div>
    </main>
<?php get_footer(); ?>  