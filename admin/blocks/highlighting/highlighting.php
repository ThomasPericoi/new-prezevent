<?php

/**
 * Highlighting Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$content = get_field('content') ?: 'Il faut vraiment que vous portiez votre attention ici !';
$tab = get_field('tab') ?: 'En bref';

$classes = array('highlighting-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<!-- Block - Highlighting -->
<section class="container <?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="inner" data-tab="<?php echo $tab; ?>">
        <h3><?php echo $content; ?></h3>
    </div>
</section>