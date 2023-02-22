<?php

/**
 * Features grid Block Template.
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
$description = get_field("description");

$classes = 'features-grid-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<!-- Block - Features grid -->
<section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="container">
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

        <div class="sections">
            <?php if (have_rows('section')) :
                while (have_rows('section')) : the_row();
                    $subtitle = get_sub_field('subtitle');
                    $title = get_sub_field('title');
                    $features = get_sub_field('feature'); ?>
                    <div class="section">
                        <div class="presentation">
                            <?php if ($subtitle) : ?>
                                <span class="subtitle"><?php echo $subtitle; ?></span>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <h3><?php echo $title; ?></h2>
                                <?php endif; ?>
                        </div>
                        <div class="features-grid">
                            <?php global $post;
                            foreach ($features as $post) :
                                setup_postdata($post); ?>
                                <a href="<?php the_permalink(); ?>" class="feature">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_field('feature_icon', $post); ?>.svg" alt="Fonctionnalités">
                                    <div>
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php echo get_field('feature_introduction', $post); ?></p>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>

    </div>
</section>