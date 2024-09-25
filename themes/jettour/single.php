<?php get_header(); ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <?php if (has_post_thumbnail($post->ID)) { ?>
            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'larger'); ?>
            <!-- <img src="<?php echo $image[0]; ?>"  />      -->
        <?php } ?>

        <section class="team-member-details common-padding" style="background-image: url(<?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="meta-info">
                            <!-- <ul>
                        <li><?php ?></li>
                        <li><?php echo $postdate; ?></li>
                    </ul> -->
                        </div>
                        <div class="comm-content-wrapper">
                            <div class="team-image">
                                <img src="<?php echo $image[0]; ?>" alt="" />
                            </div>
                            <h1>
                                <?php the_title(); ?>
                            </h1>

                            <?php the_content(); ?>
                        </div>

                    </div>

                <?php endwhile; else: ?>
            <?php endif; ?>


            <?php
            $related_args = array(
                'posts_per_page' => 3,
                'post__not_in' => array($post->ID),
                'orderby' => 'date'
            );
            $related = get_posts($related_args);
            if ($related) {
                ?>
                <div class="col-lg-12 mt-3">
                    <h3>Related Post</h3>
                </div>
                <?php
                foreach ($related as $rel_post) {
                    $postdate = get_the_date("M d, Y");
                    $is_newsweek = get_field('is_newsweek', $rel_post->ID);
                    ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($rel_post->ID), 'full'); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card common-card">
                            <div class="card-image-wrapper">
                                <a href="<?php echo get_the_permalink($rel_post->ID); ?>">
                                    <img src="<?php echo $image[0]; ?>" class="card-img-top"
                                        alt="<?php echo $rel_post->post_title; ?>" />
                                    <!-- <?php
                                    if ($is_newsweek) {
                                        ?> 
                                    <span class="tag">Newsweek</span>
                                    <?php } ?> -->
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="name">
                                    <?php echo $rel_post->post_title; ?>
                                </h4>
                                <p>
                                    <?php echo strip_tags(substr($rel_post->post_content, 0, 150)); ?>
                                </p>
                                <a href="<?php echo get_permalink($rel_post->ID); ?>" class="link-btn">Read More <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>