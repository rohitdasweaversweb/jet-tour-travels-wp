<?php
/*
Template Name: Layout: Home

*/
get_header(); ?>

<main>
    <?php
    $banner_img = get_field('banner_image');
    if (empty($banner_img)) {
        $banner_img = get_template_directory_uri() . '/asset/no-image.png';
    }

    ?>
    <section class="home-banner" style="background-image: url(<?php echo $banner_img; ?>);">
        <?php
        $banner_heading = get_field('banner_heading');
        // $button_text = get_field('buttton_text');
        // $button_link = get_field('button_link');

        ?>
        <div class="container banner-content">
            <?php if (!empty($banner_heading)) { ?>
                <h1><?= $banner_heading; ?></h1>
            <?php } ?>
            
        </div>
        <div class="about-round">
            <a href="#about"><img src="<?php echo get_template_directory_uri(); ?>/asset/images/down-arrw.svg" alt="">
            </a>
        </div>
    </section>

    <section class="about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="abt-cont">
                        <?php
                        $abt_heading = get_field('about_us_heading');
                        if (!empty($abt_heading)) {
                            ?>
                            <div class="common-heading-part">
                                <h2 class="abs-title"><?= $abt_heading; ?></h2>
                                <h2><?= $abt_heading; ?></h2>
                            </div>
                        <?php } ?>

                        <?php
                        $abt_content = get_field('about_us_content');
                        if (!empty($abt_content)) {
                            ?>
                            <?= $abt_content; ?>
                        <?php } ?>

                    </div>
                </div>

                <?php
                $abt_url = get_field('abouts_us_video_link');
                if (!empty($abt_url)) {
                    ?>
                    <div class="col-lg-6">
                        <div class="abt-video">
                            <?php echo $abt_url; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="work-sec common-padding"
        style="background-image: url(<?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);"
        id="service">
        <div class="container">
            <?php
            $services_head = get_field('services_hedaing');
            $services_tittle = get_field('services_short_tittle');

            ?>
            <div class="common-heading-part middile-part text-center">
                <?php if (!empty($services_head)) { ?>

                    <h2><?= $services_head; ?></h2>
                <?php } ?>

            </div>

            <?php
            $args = array(
                'post_type' => 'services',
                'order' => 'DESC',
                'posts_per_page' => '7',
                'post_status' => 'publish',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                ?>
                <div class="work-slider slider">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        if (empty($img[0])) {
                            $img[0] = get_template_directory_uri() . '/asset/images/no-image.png';
                        }
                        ?>
                        <div class="work-box">
                            <figure>
                                <img src="<?php echo $img[0]; ?>" alt="">
                            </figure>

                            <figcaption>
                                <h3><?php the_title(); ?></h3>
                                <!-- <ul>
                                    <li>Capital management</li>
                                    <li>Bankability assessmen</li>
                                    <li>Raising bank loans</li>
                                    <li>Debt Restructuring and rescheduling</li>
                                    <li>Cash management</li>
                                </ul> -->
                                <a href="<?php the_permalink(); ?>" class="btn w-100">View More</a>
                            </figcaption>


                        </div>
                    <?php } ?>

                </div>
            <?php }
            wp_reset_postdata();
            ?>
            <?php
              $ser_btn_text=get_field('service_button_text');
               $ser_btn_link=get_field('button_link');
                if(!empty($ser_btn_link)){
            ?>
            <div class="ser-btn">
                <a href="<?= $ser_btn_link;?>" class="btn "><?= $ser_btn_text;?></a>
            </div>
            <?php  } ?>
        </div>
    </section>

    <section class="gallery-sec common-padding" id="gallery">
        <div class="container">
            <?php
            $gallery_head = get_field('gallery_heading');


            ?>
            <div class="common-heading-part middile-part text-center">
                <?php if (!empty($gallery_head)) { ?>

                    <h2><?= $gallery_head; ?></h2>
                <?php } ?>

            </div>

            <div class="common-heading-part middile-part text-center">
                <?php echo do_shortcode('[gallery_p_gallery id="1"]'); ?>
            </div>

        </div>
    </section>


  <?php get_template_part('page-templates/contact');?>
</main>

<?php get_footer(); ?>