<?php get_header(); ?>

<?php
if (is_category()) :
    $title = single_cat_title('', false);
    $description = category_description();
elseif (is_tag()) :
    $title = single_tag_title('', false);
    $description = tag_description();
else :
    $title = get_the_title(get_option('page_for_posts'));
    $description = __('Retrouvez-ici nos contenus pour réussir à 100% votre événement professionnel', 'prezevolve');
endif;
?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <h1 class="title"><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <div class="description"><?php echo $description; ?></div>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section class="index">
    <div class="container">

        <?php if (have_posts()) : ?>

            <div class="posts-grid">

                <?php
                while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                        <?php endif; ?>
                        <div class="content">
                            <h3 class="h5-size"><?php the_title(); ?></h3>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>

            </div>
            <?php the_posts_pagination(); ?>

        <?php else : echo _('Aucun dossier n\'a été (encore) publié', 'prezevolve');
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