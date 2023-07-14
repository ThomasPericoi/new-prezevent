<?php

/**
 * Perks Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$display = get_field('display');
$alignement = get_field('alignement');

$classes = array('perks-block', $display, 'text-' . $alignement);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (have_rows('perk')) : ?>
    <!-- Block - Perks -->
    <section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
        <div class="container">
            <?php while (have_rows('perk')) : the_row();
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $type = get_sub_field('type');
                $icon = get_sub_field('icon');
                $image = get_sub_field('image'); ?>
                <div class="perk">
                    <?php if (($type === "image") && ($image)) : ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <?php endif; ?>
                    <?php if (($type === "icon") && ($icon)) : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo $icon; ?>-alt.svg" alt="Fonctionnalités">
                    <?php endif; ?>
                    <div>
                        <span class="title"><?php echo $title; ?></span>
                        <div><?php echo $text; ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>