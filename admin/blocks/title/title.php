<?php

/**
 * Title Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$content = get_field("content");
// Options
$tag = get_field("html_tag");
$size = get_field("size");
$alignement = get_field('alignement');
$color = get_field("color");

$classes = array('title-block', $size, 'text-' . $alignement, $color);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<!-- Block - Title -->
<section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="container">
        <<?php echo $tag; ?>><?php echo $content; ?></<?php echo $tag; ?>>
    </div>
</section>