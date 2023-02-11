<?php /* Template Name: Page simple (sans bloc) */
get_header(); ?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <h1 class="title"><?php echo get_the_title(); ?></h1>
    </div>
</section>

<!-- Content -->
<section>
    <div class="container formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>