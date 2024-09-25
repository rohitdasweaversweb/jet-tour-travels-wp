<?php get_header(); ?>
<section class="err common-padding" style="background-image: url(<?php echo get_template_directory_uri(); ?>/asset/images/we-do-bg.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1><?php _e('Error') ?></span>404 - <?php _e('Not Found') ?></h1>
				<a href="<?php echo site_url(); ?>" class="btn">Back To Home</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>