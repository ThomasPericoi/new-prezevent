<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
    <div class="container cols">
        <div class="logo-wrapper">
            <div>
                <img src="<?php echo get_field("client_case_logo")["url"]; ?>" alt="<?php echo get_field("client_case_logo")["alt"]; ?>">
            </div>
        </div>
        <div class="content-wrapper">
            <span class="category"><?php echo get_field("client_case_parent"); ?></span>
            <h1 class="title"><?php echo get_field("client_case_title") ?: get_the_title(); ?></h1>
            <div class="description"><?php echo get_field("client_case_introduction"); ?></div>
            <div class="pills-wrapper">
                <?php if (get_field("client_case_year")) : ?>
                    <div><?php echo get_field("client_case_year"); ?></div>
                <?php endif; ?>
                <?php if (get_field("client_case_location")) : ?>
                    <div><?php echo get_field("client_case_location"); ?></div>
                <?php endif; ?>
                <?php if (get_field("client_case_sector")) : ?>
                    <div><?php echo get_field("client_case_sector"); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<?php the_content(); ?>

<!-- Outro - Boutons -->
<?php if (get_field('outro_1_button_1', 'option')["content"] || get_field('outro_1_button_2', 'option')["content"]) : ?>
    <?php get_template_part('template-parts/outro', 'buttons', array(
        'title' => get_field("feature_outro_title") ?: get_field('outro_1_title', 'option'),
        'button_1' => get_field('outro_1_button_1', 'option')["content"] ? get_field('outro_1_button_1', 'option') : false,
        'button_2' => get_field('outro_1_button_2', 'option')["content"] ? get_field('outro_1_button_2', 'option') : false,
    )); ?>
<?php endif; ?>

<?php get_footer(); ?>