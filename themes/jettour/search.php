<?php get_header(); ?>
<section class="common-padd">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
				if (have_posts()): ?>
                <?php while (have_posts()):
						the_post(); ?>

                <div class="srch-list">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn">Continue Reading</a>
                </div>
                <?php endwhile; else: ?>
                <h2><?php _e('Not Found') ?></h2>
                <p><?php _e('Sorry,no posts matched your criteria.'); ?></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>