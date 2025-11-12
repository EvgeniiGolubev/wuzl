<?php
    /*
    Template Name: How Assemble Puzzle
    */
    get_header();
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/kak-sobrat-golovolomku/"); ?>" title="Как собрать головоломку?">Как собрать головоломку?</a></li>
                </ol>
            </nav>
            <article class="video">
                <h1 class="video__title">Как собрать головоломку?</h1>
                <p class="video__description">Каждая деревянная головоломка требует внимательности и терпения. Начните с изучения всех деталей — разложите их на ровной поверхности и найдите элементы с прямыми краями, если они есть. Сначала соберите базу или внешний контур, а затем переходите к внутренним частям, подбирая их по форме и рисунку.</p>
                <p class="video__description">Не спешите — процесс сборки приносит удовольствие именно благодаря поиску правильных решений. Если деталь не подходит, не применяйте силу: проверьте симметрию и направление соединений. После нескольких попыток вы начнёте замечать закономерности в форме элементов, и сборка станет проще.</p>
                <div class="video__holder">
                    <iframe src="https://rutube.ru/play/embed/1bcda5b9334c8f7913e04e72fd65bfa5/?p=FkJVJIwTBtMwychDYBDRLQ&skinColor=fea429" style="border: none;" allow="clipboard-write; autoplay"></iframe>
                </div>
            </article>
        </div>
    </main>
<?php get_footer(); ?>