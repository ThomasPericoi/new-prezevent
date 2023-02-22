<?php

/**
 * Media Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Style
$block_style = get_field("style");
$number = $block_style["number"];
$shadowed = $block_style["image_shadowed"] ? "shadowed" : "";
// Content
$content = get_field("content");
$title = $content["title"];
$subtitle = $content["subtitle"];
// Media
$media = get_field("media");
$type = $media["type"];
$image = $media["image"];
$video = $media["video"];
$max_size = $media["maximum_size"];

$classes = 'media-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (($image || $video)) : ?>
    <!-- Block - Media -->
    <section class="container <?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
        <div class="content">
            <?php if ($subtitle) : ?>
                <span class="subtitle"><?php echo $subtitle; ?></span>
            <?php endif; ?>
            <?php if ($title) : ?>
                <h2><?php if ($number) : ?><span class="title-number"><?php echo $number; ?>.</span> <?php endif; ?><?php echo $title; ?></h2>
            <?php endif; ?>
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
    </section>
<?php endif; ?>