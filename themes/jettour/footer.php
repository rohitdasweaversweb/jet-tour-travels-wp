<footer class="main-footer"
  style="background: #febf6121 url(<?php echo get_template_directory_uri(); ?>/asset/images/footer-layer.png) ;">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <div class="ftr-contact">
            <div class="footer-cols">
              <?php
              $footer_logo_url = get_theme_value('bc_footer_logo');
              if ($footer_logo_url == "") {
                $footer_logo_url = get_template_directory_uri() . '/asset/images/no-image.png';
              }
              ?>
              <div class="footer-logo">
                <a href="<?php echo site_url(); ?>">
                  <img src="<?php echo $footer_logo_url; ?>" alt="">
                </a>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-cols">
            <?php if (get_theme_value('bc_footer_menu_title') != "") { ?>
              <h4><?php echo get_theme_value('bc_footer_menu_title'); ?></h4>
            <?php } 
			  wp_nav_menu(array('theme_location' => 'secondary')); ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="footer-cols">
            <?php if (get_theme_value('bc_footer_getin_title') != "") { ?>
              <h4>
                <?php echo get_theme_value('bc_footer_getin_title'); ?>
              </h4>
            <?php } if (get_theme_value('bc_footer_location_title') != "") { ?>
              <p><strong>Address:</strong> <?php echo get_theme_value('bc_footer_location_title'); ?></p>
            <?php } if (get_theme_value('bc_phone_number') != "") { ?>
              <p><a href="tel:<?php echo get_theme_value('bc_phone_number'); ?>"><strong>Telephone:</strong> <?php echo get_theme_value('bc_phone_number'); ?></a></p>
            <?php } if (get_theme_value('bc_email_address') != "") { ?>
              <p><a href="mailto:<?php echo get_theme_value('bc_email_address'); ?>"><strong>Email:</strong> <?php echo get_theme_value('bc_email_address'); ?></a></p>
            <?php } ?>
            <ul class="scl-icon">
              <?php if (get_theme_value('driverite_facebook_link') != "") { ?>
                <li><a href="<?php echo get_theme_value('driverite_facebook_link'); ?>" target="blank"><i class="fab fa-facebook-square"></i></a></li>
              <?php } if (get_theme_value('driverite_instagram_link') != "") { ?>
                <li><a href="<?php echo get_theme_value('driverite_instagram_link'); ?>" target="blank"><i class="fab fa-instagram"></i></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <?php if (get_theme_value('driverite_copyright_text') != "") { ?>
          <div class="col-lg-12">
            <div class="footer-copy">
              <p> © Copyright <?php echo date('Y'); ?> <?php echo get_theme_value('driverite_copyright_text'); ?></p>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>