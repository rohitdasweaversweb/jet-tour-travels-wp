<?php get_header(); ?>

<section class="banner-wrap custom-container-fluid inner-page-banner"
  style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/inner-banner-bg.jpg); background-repeat: no-repeat; background-size: cover;">

  <div class="container">

    <div class="row">

      <div class="col-md-12 content-holder">

        <div class="content-wrap">

          <h1 data-aos="fade-up" data-aos-duration="3000"><?php the_title(); ?></h1>

        </div>

      </div>

    </div>

  </div>

</section>



<section class="common-padd">

  <div class="container">

    <h3><?php the_title(); ?></h3>

    <?php the_content(); ?>

  </div>

</section>



<!--content sction-->





<?php get_footer(); ?>