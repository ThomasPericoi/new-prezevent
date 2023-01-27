<?php

/**
 * Summary Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$classes = 'summary';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (have_rows('item')) : ?>
    <!-- Block - Summary -->
    <section class="container <?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
        <div class="title"><?php echo __('Sommaire', 'prezevolve'); ?></div>
        <ol>
            <?php while (have_rows('item')) : the_row();
                $title = get_sub_field('title');
                $id = get_sub_field('id'); ?>
                <li><a href="#<?php echo $id; ?>"><?php echo $title; ?></a></li>
            <?php endwhile; ?>
        </ol>
    </section>
<?php endif; ?>