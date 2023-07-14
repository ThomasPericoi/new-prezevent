<?php

/**
 * Content Block Template.
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
$content = get_field("content");
$subtitle = $content["subtitle"];
$title = $content["title"];
$text = $content["text"];
// Options
$block_style = get_field("style");
$number = get_field("number");
$has_background = ($block_style["background_color"] == "none") ? "" : "has-background";
$background = $block_style["background_color"];

$classes = array('content-block', $has_background);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background-color: " . $background . "");
$style  = implode('; ', $styles);

?>
<?php if ($content) : ?>
    <!-- Block - Content -->
    <section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
        <div class="container">
            <div class="content">
                <?php if ($subtitle) : ?>
                    <span class="subtitle"><?php echo $subtitle; ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2><?php if ($number) : ?><span class="title-number"><?php echo $number; ?>.</span> <?php endif; ?><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="text formatted">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>