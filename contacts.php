<?php
    /* 
    * Template Name: Contacts
    */
    get_header();
    $fields = CFS()->get(false, get_the_ID());
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
            <article class="contacts">
                <section class="contacts__body">
                    <div class="contacts__content">
                        <h1 class="contacts__title"><?php the_title(); ?></h1>
                        <ul class="contacts__list">
                            <li><a rel="nofollow" href="mailto:<?= $fields['contacts_email']; ?>" title="Электронная почта"><i class="fa-solid fa-envelope fa-xl"></i> <?= $fields['contacts_email']; ?></a></li>
                            <?php
                                $digits = preg_replace('/\D+/', '', $fields['contacts_phone']);
                                $formatted = sprintf(
                                    '+%s (%s) %s-%s-%s',
                                    substr($digits, 0, 1),
                                    substr($digits, 1, 3),
                                    substr($digits, 4, 3),
                                    substr($digits, 7, 2),
                                    substr($digits, 9, 2)
                                );
                            ?>
                            <li><a rel="nofollow" href="tel:<?= $fields['contacts_phone']; ?>" title="Номер телефона"><i class="fa-solid fa-phone fa-xl"></i> <?= $formatted; ?></a></li>
                            <?php 
                                $loop = $fields['contacts_details'];
                                if (!empty($loop) && is_array($loop)):
                            ?>
                                <li><i class="fa-solid fa-building fa-2xl"></i> Реквизиты:
                                    <ul>
                                        <?php foreach ($loop as $row): ?>
                                            <li><?php echo $row['contacts_detail']; ?></li>
                                        <?php endforeach?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php the_content(); ?>
                </section>
                <section class="feedback">
                    <h2 class="feedback__title"><?= $fields['feedback_title']; ?></h2>
                    <?php echo do_shortcode($fields['feedback_shortcode_form']); ?>
                </section>         
            </article>
        </div>
    </main>
<?php get_footer(); ?>  