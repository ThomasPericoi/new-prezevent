<?php

/**
 * Shortcode Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$shortcode = get_field("shortcode");

$classes = array('shortcode-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<!-- Block - Shortcode -->
<section class="<?php echo esc_attr($classes); ?>">
    <div class="container">
        <?php echo $shortcode; ?>
    </div>
</section>