<?php

/**
 * F.A.Q. Block Template.
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

$classes = array('faq-block');
$classes  = implode(' ', $classes);
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$styles = array("");
$style  = implode('; ', $styles);

?>
<?php if (have_rows('faq')) : ?>
    <!-- Block - F.A.Q. -->
    <section class="<?php echo esc_attr($classes); ?>">
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
            <ul class="faq-list">
                <?php while (have_rows('faq')) : the_row();
                    $question = get_sub_field('question');
                    $answer = get_sub_field('answer'); ?>
                    <div class="item">
                        <li class="question">
                            <h3><?php echo $question; ?></h3>
                        </li>
                        <li class="answer"><?php echo $answer; ?></li>
                    </div>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>