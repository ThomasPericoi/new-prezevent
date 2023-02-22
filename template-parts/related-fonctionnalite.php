<section class="related">
    <div class="container">
        <h2><?php echo $args['title']; ?></h2>
        <div class="features-grid">
            <?php foreach ($args['related'] as $post) :
                setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="feature">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_field('feature_icon'); ?>-alt.svg" alt="Fonctionnalités">
                    <div>
                        <h3 class="h4-size"><?php the_title(); ?></h3>
                        <div><?php echo get_field('feature_introduction'); ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); ?>