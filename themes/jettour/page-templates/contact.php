<section class="contact-section"
        style="background-image: url(<?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);"
        id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php
                        $Page_id=get_the_ID();
                        $contact_heading=get_field('contact_heading',$Page_id);
                        $contact_img=get_field('contact_image');

                        if(empty($contact_img)){
                            $contact_img= get_template_directory_uri().'/asset/images/no-image.png';
                        }
                    ?>
                    <div class="contact-img">
                        <img src="<?php echo $contact_img; ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="touch-sec">
                        <?php if(!empty($contact_heading)){?>
                        <div class="common-heading-part middile-part ">
                            <!-- <h2 class="abs-title">Let's talk</h2> -->
                            <h2><?= $contact_heading;?></h2>
                        </div>
                        <?php } ?>
                        <div class="">
                            <ul>
                                <?php if (get_theme_value('bc_footer_location_title') != "") { ?>
                                    <li><strong>Address:</strong> <?php echo get_theme_value('bc_footer_location_title'); ?></li>
                                <?php } if (get_theme_value('bc_phone_number') != "") { ?>
                                    <li><a href="tel:<?php echo get_theme_value('bc_phone_number'); ?>"><strong>Telephone:</strong> <?php echo get_theme_value('bc_phone_number'); ?></a></li>
                                <?php } if (get_theme_value('bc_email_address') != "") { ?>
                                    <li><a href="mailto:<?php echo get_theme_value('bc_email_address'); ?>"><strong>Email:</strong> <?php echo get_theme_value('bc_email_address'); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="contct-frm">
                            <?php echo do_shortcode('[contact-form-7 id="58ee5c8" title="Contact Form"]'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>