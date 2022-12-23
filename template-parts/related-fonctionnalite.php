<section class="related">
    <div class="container">
        <?php if (get_field("feature_related_title")) : ?>
            <h2><?php echo get_field("feature_related_title"); ?></h2>
        <?php endif; ?>

        <div class="features-grid">
            <?php foreach ($args['related'] as $post) :
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
    </div>
</section>
<?php wp_reset_postdata(); ?>