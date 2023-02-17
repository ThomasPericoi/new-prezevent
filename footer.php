</main>

<!-- Footer -->
<footer id="footer">
  <div class="main-footer">
    <div class="container">
      <?php if (get_field('footer_copyrights', 'option')) : ?>
        <div class="copyrights">
          <?php echo "© " .  date('Y') . " <a href=\"" . esc_html(get_home_url()) . "\">" . esc_html(get_bloginfo('name')) . "</a>, " . __("Tous droits réservés", "prezevolve"); ?>
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