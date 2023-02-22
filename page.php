<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="content-wrapper">
            <h1 class="title"><?php echo get_field("page_title") ?: get_the_title(); ?></h1>
            <p class="description"><?php echo get_field("page_introduction"); ?></p>
            <?php if (get_field('page_button_content')) : ?>
                <a href="<?php echo get_field('page_button_content')["url"]; ?>" target="<?php echo get_field('page_button_content')["target"]; ?>" class="btn btn-<?php echo get_field('page_button_style')["color"]; ?>"><?php echo get_field('page_button_content')["title"]; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Content -->
<?php the_content(); ?>

<!-- Outro - Boutons -->
<?php if (get_field('outro_1_button_1', 'option')["content"] || get_field('outro_1_button_2', 'option')["content"]) : ?>
    <?php get_template_part('template-parts/outro', 'buttons', array(
        'title' => get_field("page_outro_title") ?: get_field('outro_1_title', 'option'),
        'button_1' => get_field('outro_1_button_1', 'option')["content"] ? get_field('outro_1_button_1', 'option') : false,
        'button_2' => get_field('outro_1_button_2', 'option')["content"] ? get_field('outro_1_button_2', 'option') : false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>