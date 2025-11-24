<?php
    /* 
    * Template Name: Privacy Policy
    */
    get_header();
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <article class="politica">
                <h1 class="politica__title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        </div>
    </main>
<?php get_footer(); ?>