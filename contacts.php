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
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/kontakty/"); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                </ol>
            </nav>
            <article class="contacts">
                <section class="contacts__body">
                    <div class="contacts__content">
                        <h1 class="contacts__title"><?php the_title(); ?></h1>
                        <ul class="contacts__list">
                            <li><a rel="nofollow" href="mailto:<?php echo CFS()->get('contacts_email'); ?>" title="Электронная почта"><i class="fa-solid fa-envelope fa-xl"></i> <?php echo CFS()->get('contacts_email'); ?></a></li>
                            <li><a rel="nofollow" href="tel:<?php echo CFS()->get('contacts_phone'); ?>" title="Номер телефона"><i class="fa-solid fa-phone fa-xl"></i> <?php echo CFS()->get('contacts_phone'); ?></a></li>
                            <li><i class="fa-solid fa-building fa-2xl"></i> Реквизиты:
                                <ul>
                                    <?php
                                        $loop = CFS() -> get('contacts_details');
                                        foreach ($loop as $row):
                                    ?>
                                        <li><?php echo $row['contacts_detail']; ?></li>
                                    <?php endforeach?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php the_content(); ?>
                </section>
                <section class="feedback">
                    <h2 class="feedback__title"><?php echo CFS()->get('feedback_title'); ?></h2>
                    <?php echo do_shortcode(CFS()->get('feedback_shortcode_form')); ?>
                </section>         
            </article>
        </div>
    </main>
<?php get_footer(); ?>  