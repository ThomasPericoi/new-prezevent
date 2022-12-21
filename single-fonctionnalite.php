<?php get_header(); ?>

<section class="hero">
    <div class="container cols">
        <div class="image-wrapper">
            <video loop autoplay muted playsinline>
                <source src="<?php echo get_field("feature_icon_animated")["url"]; ?>" type="video/mp4">
            </video>
        </div>
        <div class="content-wrapper">
            <span class="category"><?php echo get_field("feature_parent"); ?></span>
            <h1 class="title" <?php if (get_field("feature_pill")) : ?> data-pill="<?php echo get_field("feature_pill_label"); ?>" <?php endif; ?>><?php echo get_field("feature_title") ?: get_the_title(); ?></h1>
            <div class="description"><?php echo get_field("feature_introduction"); ?></div>
            <?php if (get_field('feature_button_content')) : ?>
                <a href="<?php echo get_field('feature_button_content')["url"]; ?>" target="<?php echo get_field('feature_button_content')["target"]; ?>" class="btn btn-<?php echo get_field('feature_button_style')["color"]; ?>"><?php echo get_field('feature_button_content')["title"]; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php the_content(); ?>

<?php $features = get_field("feature_related_features"); ?>
<?php if ($features) : ?>
    <section class="container related">
        <?php if (get_field("feature_related_title")) : ?>
            <h2><?php echo get_field("feature_related_title"); ?></h2>
        <?php endif; ?>

        <div class="features-wrapper">
            <?php foreach ($features as $post) :
                setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="feature">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_field('feature_icon'); ?>-alt.svg" alt="Fonctionnalités">
                    <div>
                        <h3 class="h4-size"><?php the_title(); ?></h3>
                        <p><?php echo get_field('feature_introduction'); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer(); ?>