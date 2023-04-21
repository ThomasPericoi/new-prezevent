<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$title = get_field("title");
$subtitle = get_field("subtitle");

$classes = 'slider-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (have_rows('slider_element')) : ?>
    <!-- Block - Slider -->
    <section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
        <div class="container">
            <div class="introduction">
                <?php if ($subtitle) : ?>
                    <span class="subtitle"><?php echo $subtitle; ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slider_element')) : the_row();
                        $image = get_sub_field('image');
                        $legend = get_sub_field('legend');
                        $background = get_sub_field('legend_color'); ?>
                        <div class="swiper-slide element">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <div class="legend" style="background-color: <?php echo $background; ?>">
                                <div><?php echo $legend; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>