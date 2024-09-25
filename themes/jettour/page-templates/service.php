<?php
/*
Template Name: Layout: Service-Listing
*/
get_header(); ?>

<main>

    <!-- <section class="zigzag-wrap common-padding"
        style="background-image: url(<//?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);"> -->
    <section class="zigzag-wrap common-padding">
        <div class="container">
            <div class="posts">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $page_id = get_the_ID();

                $args = array(
                    'post_type' => 'services',
                    'order' => 'DESC',
                    'posts_per_page' => 3,
                    'paged' => $paged,
                    'post_status' => 'publish',
                );
                $query = new WP_Query($args);
                // echo"<pre>";
                // print_r($query);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        if (empty($img[0])) {
                            $img[0] = get_template_directory_uri() . '/asset/images/no-image.png';
                        }
                        $visa_id = get_the_ID();
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="zigzag-info">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <?php if ($visa_id == 61) { ?>
                                        <a href="<?php the_permalink(); ?>" class="btn ">View More</a>
                                    <?php } else { ?>
                                        <a href="<?php the_permalink(); ?>" class="btn ">View More</a>

                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="srv-img">
                                    <img src="<?php echo $img[0]; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>No posts found.</p>';
                }

                wp_reset_postdata();
                ?>
            </div>

            <div class="paginate">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <?php
                        $pageinate = paginate_links(
                            array(
                                'total' => $query->max_num_pages,
                                'current' => max(1, get_query_var('paged')),
                                'prev_text' => '&laquo;',
                                'next_text' => '&raquo;',
                                'format' => '?paged=%#%',
                                'type' => 'array',
                                'add_args' => false,
                            )
                        );
                        // echo "<pre>";
                        // print_r($pageinate);
                        foreach ($pageinate as $pag) {
                            ?>
                            <li class="page-item"><?php echo $pag; ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>


    </section>



</main>

<?php get_footer(); ?>