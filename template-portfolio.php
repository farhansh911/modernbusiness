<?php /* Template Name: Portfolio Page */ ?>
<?php get_header(); // load header ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<!-- Header-->
<?php if (pods_field_display('enable_header_1') == 'Yes') : ?>
<header class="bg-dark py-5">
	<div class="container px-5">
		<div class="row gx-5 align-items-center justify-content-center">
			<div class="col-lg-8 col-xl-7 col-xxl-6">
				<div class="my-5 text-center text-xl-start">
					<?php if (pods_field_display('heading')) : ?><h1 class="display-5 fw-bolder text-white mb-2"><?php echo pods_field_display('heading'); ?></h1><?php endif; ?>
					<?php if (pods_field_display('subheading')) : ?><p class="lead fw-normal text-white-50 mb-4"><?php echo pods_field_display('subheading'); ?></p><?php endif; ?>
					<div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
						<?php if (pods_field_display('button_1_text')) : ?><a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?php echo pods_field_display('button_1_url'); ?>"><?php echo pods_field_display('button_1_text'); ?></a><?php endif; ?>
						<?php if (pods_field_display('button_2_text')) : ?><a class="btn btn-outline-light btn-lg px-4" href="<?php echo pods_field_display('button_2_url'); ?>"><?php echo pods_field_display('button_2_text'); ?></a><?php endif; ?>
					</div>
				</div>
			</div>
			<?php if (pods_image_url(pods_field('right_image'))) : ?><div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="<?php echo pods_image_url(pods_field('right_image')); ?>" alt="..." /></div><?php endif; ?>
		</div>
	</div>
</header>
<?php endif; ?>

<?php if (pods_field_display('enable_header_2') == 'Yes') : ?>
<header class="py-5">
	<div class="container px-5">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-xxl-6">
				<div class="text-center my-5">
					<?php if (pods_field_display('heading_2')) : ?><h1 class="fw-bolder"><?php echo pods_field_display('heading_2'); ?></h1><?php endif; ?>
					<?php if (pods_field_display('subheading_2')) : ?><p class="lead fw-normal text-muted mb-0"><?php echo pods_field_display('subheading_2'); ?></p><?php endif; ?>
					<?php if (pods_field_display('button_text')) : ?><a class="btn btn-primary btn-lg" href="<?php echo pods_field_display('button_url'); ?>"><?php echo pods_field_display('button_text'); ?></a><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
<?php endif; ?>
<section class="mb-5">
    <div class="container px-5 my-0">
        <div class="row gx-5">
            <?php
            $mb_portfolio_post = new WP_Query(array(
                'post_type' => 'portfolio',
				'posts_per_page' => -1, 
            ));

            while ($mb_portfolio_post->have_posts()) : $mb_portfolio_post->the_post();
            ?>
                <div class="col-lg-6">
                    <div class="position-relative mb-5">
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="img-fluid rounded-3 mb-3" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'mb-portfolio-hero-medium')); ?>" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                        <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

            <?php the_content(); ?>
            
	
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); // load footer ?>
