<?php get_header(); ?>

<?php
$title = get_field('home_title') ?: get_bloginfo("name");
$description = get_field('home_description') ?: get_bloginfo("description");
$button_1 = get_field('home_button_1');
$button_2 = get_field('home_button_2');
?>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <h1 class="title"><?php echo $title; ?></h1>
    <p class="description"><?php echo $description; ?></p>
    <div class="btn-wrapper">
      <?php if ($button_1) : ?>
        <a href="<?php echo $button_1["content"]["url"]; ?>" target="<?php echo $button_1["content"]["target"]; ?>" class="btn btn-<?php echo $button_1["style"]["color"]; ?>"><?php echo $button_1["content"]["title"]; ?></a>
      <?php endif; ?>
      <?php if ($button_2) : ?>
        <a href="<?php echo $button_2["content"]["url"]; ?>" target="<?php echo $button_2["content"]["target"]; ?>" class="btn btn-<?php echo $button_2["style"]["color"]; ?>"><?php echo $button_2["content"]["title"]; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Content -->
<?php the_content(); ?>

<?php get_footer(); ?>