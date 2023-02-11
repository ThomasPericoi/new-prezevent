<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <h1 class="title"><?php echo get_the_title(); ?></h1>
        <p class="description"><?php echo __('Mis à jour le', 'prezevolve'); ?> <?php echo get_the_date(); ?></p>
    </div>
</section>

<!-- Content -->
<section>
    <div class="container formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>