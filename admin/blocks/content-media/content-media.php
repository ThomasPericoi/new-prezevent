<?php

/**
 * Content + Media Block Template.
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
$title = $content["title"];
$subtitle = $content["subtitle"];
$text = $content["text"];
// Media
$media = get_field("media");
$type = $media["type"];
$image = $media["image"];
$video = $media["video"];
// Options
$number = get_field("number");
$block_style = get_field("style");
$placement = ($block_style["placement"] == "left") ? "flex-alternate" : "";
$has_background = ($block_style["background_color"] == "none") ? "" : "has-background";
$background = $block_style["background_color"];
$max_size = $block_style["maximum_size"];
$shadowed = $block_style["image_shadowed"] ? "shadowed" : "";

$classes = array('content-media-block', $placement, $has_background);
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("background-color: " . $background . "");
$style  = implode('; ', $styles);

?>
<?php if ($content && ($image || $video)) : ?>
    <!-- Block - Content + Media -->
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
            <div class="media <?php echo $type; ?> <?php echo $shadowed; ?>" style="<?php if ($max_size) : ?>max-width:<?php echo $max_size; ?>px;<?php endif; ?>">
                <?php if ($type == "image") : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php else : ?>
                    <video loop autoplay muted playsinline>
                        <source src="<?php echo $video["url"]; ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>