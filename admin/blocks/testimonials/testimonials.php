<?php

/**
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$title = get_field('title') ?: 'Ils nous adorent !';
$content = get_field('content') ?: 'Prezevent, c\'est super. Voici pourquoi...';
$author = get_field('author') ?: '';

$classes = 'testimonials';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<div class="<?php echo esc_attr($classes); ?>" style="<?php echo esc_attr($style); ?>">
    <h3 class="h4-size"><?php echo $title; ?></h3>
    <blockquote><?php echo $content; ?></blockquote>
    <div class="author">
        <img src="<?php echo esc_url($author['company_logo']['url']); ?>" alt="<?php echo esc_attr($author['company_logo']['alt']); ?>" />
        <div class="infos">
            <p class="name"><?php echo $author['name']; ?></p>
            <p class="position"><?php echo $author['position']; ?></p>
        </div>
    </div>
</div>