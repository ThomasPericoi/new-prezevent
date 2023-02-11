<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <h1 class="title"><?php echo __('Changelogs de l\'application Prezevent'); ?></h1>
        <div class="description"><?php echo __('Nous mettons à jour notre application régulièrement. Vous pouvez consulté les changelogs de cete dernière sur cette page.', 'prezevolve'); ?></div>
    </div>
</section>

<!-- Loop -->
<section class="index">
    <div class="container">

        <?php if (have_posts()) : ?>

            <div class="changelogs-grid">
                <ul>

                    <?php
                    while (have_posts()) : the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="post">
                                <p class="date"><?php echo __('Mis à jour le', 'prezevolve'); ?> <?php echo get_the_date(); ?></p>
                                <h3 class="h5-size"><?php the_title(); ?></h3>
                            </a>
                        </li>
                    <?php endwhile; ?>

                </ul>

            </div>
            <?php the_posts_pagination(); ?>

        <?php else : echo __('Aucun changelog n\'a été (encore) publié', 'prezevolve');
        endif; ?>

    </div>
</section>

<!-- Outro - Boutons -->
<?php if (get_field('outro_1_button_1', 'option')["content"] || get_field('outro_1_button_2', 'option')["content"]) : ?>
    <?php get_template_part('template-parts/outro', 'buttons', array(
        'title' => get_field('outro_1_title', 'option'),
        'button_1' => get_field('outro_1_button_1', 'option')["content"] ? get_field('outro_1_button_1', 'option') : false,
        'button_2' => get_field('outro_1_button_2', 'option')["content"] ? get_field('outro_1_button_2', 'option') : false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>