<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <?php
    $cat = get_the_category();
    $cat_name = $cat[0]->cat_name;
    $cat_link = get_category_link($cat[0]->cat_ID);
    ?>
    <?php if ($cat) : ?>
      <a href="<?php echo $cat_link; ?>" class="category"><?php echo $cat_name; ?></a>
    <?php else : ?>
      <span href="<?php echo $cat_link; ?>" class="category"><?php echo get_post_type(); ?></span>
    <?php endif; ?>

    <h1 class="title"><?php echo get_the_title(); ?></h1>

    <?php echo get_field("post_introduction_text"); ?>

    <?php if (has_post_thumbnail()) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail(); ?>
        <?php if (get_field("post_thumbnail_credit")) : ?>
          <span class="credit">Crédit : <?php echo get_field("post_thumbnail_credit"); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php
    $tags = get_the_tags();
    ?>
    <?php if ($tags) : ?>
      <div class="tags">
        <?php echo __('Thématiques abordées :', 'prezevolve'); ?>
        <?php foreach ($tags as $tag) { ?>
          <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag"><?php echo $tag->name; ?></a>
        <?php } ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Content -->
<section>
  <div class="container formatted">
    <?php the_content(); ?>
  </div>
</section>

<!-- Related - Dossiers -->
<?php $related = get_posts(array(
  'numberposts' => 3,
  'post__not_in' => array($post->ID)
));
if ($related || get_field("post_related_posts")) : ?>
<?php get_template_part(
    'template-parts/related',
    'dossier',
    array(
      'title' => get_field("post_related_posts_title"),
      'related' => get_field("post_related_posts") ?: $related,
    )
  );
endif;
wp_reset_postdata(); ?>

<!-- Related - Fonctionnalités -->
<?php if (get_field("post_related_features")) : ?>
  <?php get_template_part(
    'template-parts/related',
    'fonctionnalite',
    array(
      'title' => get_field("post_related_features_title"),
      'related' => get_field("post_related_features"),
    )
  ); ?>
<?php endif; ?>

<!-- Outro - Boutons -->
<?php if (get_field('outro_1_button', 'option')["content"] || get_field('outro_2_button', 'option')["content"]) : ?>
  <?php get_template_part('template-parts/outro', 'buttons', array(
    'title' => get_field("post_outro_title") ?: get_field('outro_1_title', 'option'),
    'button_1' => get_field('outro_1_button', 'option')["content"] ? get_field('outro_1_button', 'option') : false,
    'button_2' => get_field('outro_2_button', 'option')["content"] ? get_field('outro_2_button', 'option') : false,
  )); ?>
<?php endif; ?>

<?php get_footer(); ?>