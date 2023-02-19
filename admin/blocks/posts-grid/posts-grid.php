<?php

/**
 * Posts grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Content
$title = get_field("title");
$subtitle = get_field("subtitle");
$button = get_field("button");
// Query
$amount = get_field("amount");
$categories = get_field("categories");
$tags = get_field("tags");

$classes = 'posts-grid-block';
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Block - Posts grid -->
<section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
  <div class="container">

    <?php if ($title || $subtitle) : ?>
      <div class="introduction">
        <?php if ($title) : ?>
          <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle) : ?>
          <p><?php echo $subtitle; ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php global $post;
    $posts = get_posts(array(
      'numberposts' => $amount,
      'category' => $categories,
    ));

    if ($posts) : ?>
      <div class="posts-grid">
        <?php foreach ($posts as $post) : setup_postdata($post); ?>
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
    <?php endif;
    wp_reset_postdata();  ?>

    <?php if ($button) : ?>
      <a class="btn btn-secondary" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo __("Lire tous nos dossiers", "prezevolve") ?></a>
    <?php endif; ?>

  </div>
</section>