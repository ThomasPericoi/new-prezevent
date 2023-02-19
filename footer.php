</main>

<!-- Footer -->
<footer id="footer">
  <div class="main-footer">
    <div class="container">
      <?php $alt_logo = get_field('footer_logo_alt', 'option');
      if ($alt_logo) : ?>
        <a href="<?php echo get_home_url(); ?>" class="custom-logo-link">
          <img src="<?php echo $alt_logo['url']; ?>" alt="<?php echo $alt_logo['alt']; ?>" class="custom-logo">
        </a>
      <?php else :
        if (function_exists('the_custom_logo')) {
          the_custom_logo();
        }
      endif; ?>
      <div class="wrapper">

        <div class="informations">
          <?php $address = get_field('footer_address', 'option');
          $email = get_field('footer_email', 'option');
          $phone = get_field('footer_phone', 'option');
          $app_link_title = get_field('footer_app_link_title', 'option');
          $app_store_link = get_field('footer_app_link_apple', 'option');
          $play_store_link = get_field('footer_app_link_google', 'option');
          ?>
          <?php if ($address) : ?>
            <div class="address">
              <?php echo $address; ?>
            </div>
          <?php endif; ?>
          <?php if ($email) : ?>
            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
          <?php endif; ?>
          <?php if ($phone) : ?>
            <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
          <?php endif; ?>
          <div class="app">
            <span class="title"><?php echo $app_link_title; ?></span>
            <div class="app-links">
              <?php if ($app_store_link) : ?>
                <a class="app-pill" href="<?php echo $app_store_link; ?>" target="_blank">
                  <img alt="<?php echo __("Disponible sur l'App Store", "prezevolve"); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/icons/other/app-store.svg" loading="lazy">
                </a>
              <?php endif; ?>
              <?php if ($play_store_link) : ?>
                <a class="app-pill" href="<?php echo $play_store_link; ?>" target="_blank">
                  <img alt="<?php echo __("Disponible sur le Google Play Store", "prezevolve"); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/icons/other/google-play-store.svg" loading="lazy">
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="menu-wrapper menu-1">
          <span class="title"><?php echo wp_get_nav_menu_name('footer-menu-1'); ?></span>
          <?php wp_nav_menu(array('theme_location' => 'footer-menu-1', 'depth' => 1)); ?>
        </div>

        <div class="menu-wrapper menu-2">
          <span class="title"><?php echo wp_get_nav_menu_name('footer-menu-2'); ?></span>
          <?php wp_nav_menu(array('theme_location' => 'footer-menu-2', 'depth' => 1)); ?>
        </div>
      </div>

      <?php if (get_field('logo_alt', 'option')) : ?>
        <div class="copyrights">
          <?php echo "© 2015 - " .  date('Y') . " <a href=\"" . esc_html(get_home_url()) . "\">" . esc_html(get_bloginfo('name')) . "</a>, " . __("Tous droits réservés", "prezevolve"); ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('footer_social', 'option')) : ?>
        <div class="socials">
          <?php while (have_rows('footer_social', 'option')) : the_row();
            $icon = get_sub_field('icon');
            $url = get_sub_field('url'); ?>
            <a href="<?php echo $url; ?>" target="_blank">
              <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/socials/' .  $icon . '.svg'); ?>
            </a>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php if (get_field('footer_sub_footer', 'option') && get_field('footer_sub_footer_cta_content', 'option')["title"]) : ?>
    <a href="<?php echo get_field('footer_sub_footer_cta_content', 'option')["url"]; ?>" target="<?php echo get_field('footer_sub_footer_cta_content', 'option')["target"]; ?>" class="sub-footer">
      <div class="container">
        <p><?php echo get_field('footer_sub_footer_cta_content', 'option')["title"]; ?></p>
      </div>
    </a>
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>