<?php

/**
 * Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$subtitle = get_field("subtitle");
$title = get_field("title");
$description = get_field("description");

$classes = array('tabs-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (have_rows('tab')) : ?>
    <!-- Block - Tabs -->
    <section class="container <?php echo esc_attr($classes); ?>">
        <?php if ($subtitle || $title || $description) : ?>
            <div class="introduction">
                <?php if ($subtitle) : ?>
                    <span class="subtitle"><?php echo $subtitle; ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="description formatted">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="tabs">
            <nav>
                <?php while (have_rows('tab')) : the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('description'); ?>
                    <a tabindex="0" role="button">
                        <h3 class="h4-size"><?php echo $title; ?></h3>
                        <?php if ($description) : ?>
                            <div class="description"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </a>
                <?php endwhile; ?>
            </nav>
            <div class="content-wrapper">
                <?php $i = 1; ?>
                <?php while (have_rows('tab')) : the_row();
                    $image = get_sub_field('image');
                    $video = get_sub_field('video'); ?>
                    <div class="content">
                        <div class="index"><?php echo $i; ?></div>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                    <?php $i++ ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>