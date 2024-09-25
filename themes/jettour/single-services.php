<?php get_header(); ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post();

        // Get featured image
        if (has_post_thumbnail()) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            // Default image if no featured image is set
            if (empty($img[0])) {
                $img[0] = get_template_directory_uri() . '/asset/images/no-image.png';
            }
        } else {
            // Fallback image if no thumbnail exists
            $img[0] = get_template_directory_uri() . '/asset/images/no-image.png';
        }

        $visa_id = get_the_ID();
        ?>
        <?php if ($visa_id == 61) {

            if (have_rows('add_country')) {
                ?>
                <section class="tab-section common-padding">
                    <div class="container">
                        <div class="tab-list">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php
                                    $i = 0;
                                    while (have_rows('add_country')) {
                                        the_row();
                                        $country_name = get_sub_field('country_name');
                                        $country_flag = get_sub_field('country_flag');
                                        $country_slug = sanitize_title($country_name);
                                        ?>
                                        <button class="nav-link <?php echo $i === 0 ? 'active' : ''; ?>" id="nav-<?= $country_slug; ?>-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-<?= $country_slug; ?>" type="button" role="tab"
                                            aria-controls="nav-<?= $country_slug; ?>"
												aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"><img class="flag-img" src="<?php echo $country_flag; ?>"><p><?php echo $country_name ?></p></button>
                                        <?php $i++;
                                    } ?>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <?php
                            $i = 0;
                            while (have_rows('add_country')) {
                                the_row();
                                $country_name = get_sub_field('country_name');
                                $country_slug = sanitize_title($country_name);
                                $content = get_sub_field('content_section');
                                $country_image = get_sub_field('counrty_image_section');
                                if (empty($country_image)) {
                                    $country_image = get_template_directory_uri() . '/asset/images/no-image.png';
                                }
                                ?>
                                <div class="tab-pane fade <?php echo $i === 0 ? 'show active' : ''; ?>" id="nav-<?= $country_slug ?>"
                                    role="tabpanel" aria-labelledby="nav-<?= $country_slug ?>-tab">
                                    <div class="doc-visa">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="visa-text">
                                                    <?php if (!empty($content)) { ?>
                                                        <?= $content; ?>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="country-img">
                                                    <img src="<?php echo $country_image; ?>" alt="Sydney">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php $i++;
                            } ?>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <h2>No Content Avaialable</h2>
            <?php }
        } else { ?>
            <section class="info-blog common-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog-content">
                                <h1><?php the_title(); ?></h1>
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog-img">
                                <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" />
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        <?php } ?>


    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>