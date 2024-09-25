<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!--header sction-->
  <header class="main-header">
    <div class="container">
      <div class="navigation-bar">
        <?php

        ?>
        <div class="logo-block">
          <?php
          $logo = get_theme_value('driverite_header_logo');
          if (empty($logo)) {
            $logo = get_template_directory_uri() . '/asset/images/no-image.png';
          }
          ?>
          <a href="<?php echo home_url(); ?>"> <img src="<?php echo $logo; ?>" alt=""></a>
        </div>
        <div class="main-menu">
          <div class="nav_close" onclick="menu_close()">
            <i class="far fa-times-circle"></i>
          </div>
         

          <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav')); ?>
        </div>
        <div class="header-right-btn d-flex align-items-center">
          <div class="nav_btn" onclick="menu_open()">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--header sction-->