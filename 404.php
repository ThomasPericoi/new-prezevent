<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <span class="category"><?php echo __('Aïe, Code 404 !', 'prezevolve'); ?></span>
    <h1 class="title"><?php echo __('Il semble que vous soyez perdu…', 'prezevolve'); ?></h1>
    <p class="description"><?php echo __('Mais pas de panique, on va tout faire pour que vous retrouviez votre chemin.', 'prezevolve'); ?></p>
    <a href="<?php echo get_home_url(); ?>" class="btn btn-secondary"><?php echo __('Retourner dans un endroit connu', 'prezevolve'); ?></a>
  </div>
</section>

<!-- Related - Dossiers -->
<?php $related = get_posts(array(
  'numberposts' => 3,
  'post__not_in' => array($post->ID)
));
if ($related) : ?>
<?php get_template_part(
    'template-parts/related',
    'dossier',
    array(
      'title' => __('Lire un de nos derniers dossiers', 'prezevolve'),
      'related' => get_field("post_related_posts") ?: $related,
    )
  );
endif;
wp_reset_postdata(); ?>

<!-- Outro - Boutons -->
<?php if (get_field('outro_1_button_1', 'option')["content"] || get_field('outro_1_button_2', 'option')["content"]) : ?>
  <?php get_template_part('template-parts/outro', 'buttons', array(
    'title' => get_field('outro_1_title', 'option'),
    'button_1' => get_field('outro_1_button_1', 'option')["content"] ? get_field('outro_1_button_1', 'option') : false,
    'button_2' => get_field('outro_1_button_2', 'option')["content"] ? get_field('outro_1_button_2', 'option') : false,
  )); ?>
<?php endif; ?>

<?php get_footer(); ?>