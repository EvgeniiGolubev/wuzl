<?php
    /* 
    * Template Name: About us
    */
    get_header();

    $company_img_id  = CFS()->get('company_img');
    $company_img_url = wp_get_attachment_image_url($company_img_id, 'full');
    $company_img_alt = get_post_meta($company_img_id, '_wp_attachment_image_alt', true);

    $production_img_id  = CFS()->get('production_img');
    $production_img_url = wp_get_attachment_image_url($production_img_id, 'full');
    $production_img_alt = get_post_meta($production_img_id, '_wp_attachment_image_alt', true);
?>
    <main class="main">
        <div class="main__container container">
            <nav class="bread-crumbs" aria-label="Хлебные крошки">
                <ol class="bread-crumbs__list">
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/"); ?>" title="Главная">Главная</a></li>
                    <li class="bread-crumbs__item" aria-hidden="true">/</li>
                    <li class="bread-crumbs__item"><a href="<?php echo home_url("/o-nas/"); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                </ol>
            </nav>
            <article class="about-us">
                <h1 class="about-us__title"><?php the_title(); ?></h1>
                <section class="company">
                    <h2 class="company__title"><?php echo CFS()->get('company_title'); ?></h2>
                    <div class="company__content">
                        <div class="company__description-holder">
                            <?php echo CFS()->get('company_description'); ?>
                        </div>
                        <img class="company__image" src="<?php echo $company_img_url; ?>" alt="<?php echo $company_img_alt; ?>" width="400"/>
                    </div>
                </section>
                <section class="team">
                    <h2 class="team__title"><?php echo CFS()->get('team_title'); ?></h2>
                    <ul class="team__list">
                        <?php
                            $loop = CFS() -> get('team_items');
                            foreach ($loop as $row):
                                $team_img_id  = $row['team_image'];
                                $team_img_url = wp_get_attachment_image_url($team_img_id, 'full');
                                $team_img_alt = get_post_meta($team_img_id, '_wp_attachment_image_alt', true);
                        ?>
                            <li class="team__item">
                                <figure class="team__figure">
                                    <img class="team__image" src="<?php echo $team_img_url; ?>" alt="<?php echo $team_img_alt; ?>" width="300">
                                    <figcaption class="team__info">
                                        <span class="team__name"><?php echo $row['team_name']; ?></span>
                                        <span class="team__post"><?php echo $row['team_post']; ?></span>
                                        <hr>
                                        <p class="team__description"><?php echo $row['team_description']; ?></p>
                                    </figcaption>
                                </figure>
                            </li>
                        <?php endforeach?>
                    </ul>
                </section>
                <section class="production">
                    <h2 class="production__title"><?php echo CFS()->get('production_title'); ?></h2>
                    <div class="production__content">
                        <img class="production__image" src="<?php echo $production_img_url; ?>" alt="<?php echo $production_img_alt; ?>" width="400"/>
                        <div class="production__description-holder">
                            <?php echo CFS()->get('production_description'); ?>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>
<?php get_footer(); ?>  