<?php

/**
 * Logos Block Template.
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
// Options
$background = get_field("background_color");

$classes = array('logos-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}

$styles = array("background-color: " . $background . "");
$style  = implode('; ', $styles);
?>

<?php if (have_rows('logo')) : ?>
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

      <div class="logos-grid">
        <?php while (have_rows('logo')) : the_row();
          $image = get_sub_field('image'); ?>
          <div class="logo">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" tabindex="0">
          </div>
        <?php endwhile; ?>
      </div>

    </div>
  </section>
<?php endif; ?>