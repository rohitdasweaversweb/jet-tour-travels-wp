<?php get_header(); ?>
<section class="common-pg-sec common-padding"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);">
    <div class="container">
        <div class="row">
        <div class="col-lg-6">
                <div class="cntct-box">
                    <?php if(have_posts()): while(have_posts()): the_post(); $cn_id=get_the_ID();?>
                    <h3><?php the_title(); ?></h3>
                    <?php if($cn_id==144){?>
                    <div class="contct-frm">
                        <?php the_content(); ?>
                    </div>
                    <?php } else {?>
                    <?php the_content(); ?>
                    <?php } ?>
                    <?php endwhile; else: ?>
                    <h1><?php _e('Not Found')?></h1>
                    <p><?php _e('Sorry,no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-cols">
                    <?php if (get_theme_value('bc_footer_getin_title') != "") { ?>
                    <h4>
                        <?php echo get_theme_value('bc_footer_getin_title'); ?>
                    </h4>
                    <?php } if (get_theme_value('bc_footer_location_title') != "") { ?>
                    <p><strong>Address:</strong> <?php echo get_theme_value('bc_footer_location_title'); ?></p>
                    <?php } if (get_theme_value('bc_phone_number') != "") { ?>
                    <p><a href="tel:<?php echo get_theme_value('bc_phone_number'); ?>"><strong>Telephone:</strong>
                            <?php echo get_theme_value('bc_phone_number'); ?></a></p>
                    <?php } if (get_theme_value('bc_email_address') != "") { ?>
                    <p><a href="mailto:<?php echo get_theme_value('bc_email_address'); ?>"><strong>Email:</strong>
                            <?php echo get_theme_value('bc_email_address'); ?></a></p>
                    <?php } ?>
                    <ul class="scl-icon">
                        <?php if (get_theme_value('driverite_facebook_link') != "") { ?>
                        <li><a href="<?php echo get_theme_value('driverite_facebook_link'); ?>" target="blank"><i
                                    class="fab fa-facebook-square"></i></a></li>
                        <?php } if (get_theme_value('driverite_instagram_link') != "") { ?>
                        <li><a href="<?php echo get_theme_value('driverite_instagram_link'); ?>" target="blank"><i
                                    class="fab fa-instagram"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            
        </div>

    </div>
</section>
<?php get_footer(); ?>