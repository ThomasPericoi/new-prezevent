<?php

/**
 * Card location Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$informations = get_field('informations');

$classes = array('card-location-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<!-- Block - Card location -->
<section class="container <?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="information">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/icons/capacity.svg"); ?>
        <span class="title"><?php echo __('Capacité max', 'prezevolve'); ?></span>
        <span class="number"><?php echo $informations["capacity"]; ?></span>
    </div>
    <div class="information">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/icons/space.svg"); ?>
        <span class="title"><?php echo __('Espace(s)', 'prezevolve'); ?></span>
        <span class="number"><?php echo $informations["space"]; ?></span>
    </div>
    <div class="information">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/icons/conference.svg"); ?>
        <span class="title"><?php echo __('Conférence', 'prezevolve'); ?></span>
        <span class="number"><?php echo $informations["conference"]; ?></span>
    </div>
    <div class="information">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/icons/cocktail.svg"); ?>
        <span class="title"><?php echo __('Cocktail', 'prezevolve'); ?></span>
        <span class="number"><?php echo $informations["cocktail"]; ?></span>
    </div>
    <div class="information">
        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/assets/icons/meal.svg"); ?>
        <span class="title"><?php echo __('Repas', 'prezevolve'); ?></span>
        <span class="number"><?php echo $informations["meal"]; ?></span>
    </div>
</section>