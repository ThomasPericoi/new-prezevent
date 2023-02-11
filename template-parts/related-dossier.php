<section class="related">
    <div class="container">
        <h2><?php echo $args['title']; ?></h2>
        <div class="posts-grid">
            <?php foreach ($args['related'] as $post) :
                setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                    <?php endif; ?>
                    <div class="content">
                        <h3 class="h5-size"><?php the_title(); ?></h3>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); ?>