<?php get_header(); // load header ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder"><?php the_title(); ?></h1>
                    <div class="lead fw-normal text-muted mb-0"><?php echo wp_kses_post(get_the_content()); ?></div>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col-12">
                
                <?php
                if (has_post_thumbnail()) :
                ?>
                    <img class="img-fluid rounded-3 mb-5" src="<?php the_post_thumbnail_url(); ?>" alt="" />
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                
                <?php
                $medium_image_1 = get_post_meta(get_the_ID(), 'medium_image_1', true);
                if (!empty($medium_image_1)) :
                    $medium_image_1_url = wp_get_attachment_image_src($medium_image_1, 'full');
                    if (!empty($medium_image_1_url)) :
                ?>
                        <img class="img-fluid rounded-3 mb-5" src="<?php echo esc_url($medium_image_1_url[0]); ?>" alt="" />
                <?php endif;
                endif; ?>
            </div>
            <div class="col-lg-6">
                
                <?php
                $medium_image_2 = get_post_meta(get_the_ID(), 'medium_image_2', true);
                if (!empty($medium_image_2)) :
                    $medium_image_2_url = wp_get_attachment_image_src($medium_image_2, 'full');
                    if (!empty($medium_image_2_url)) :
                ?>
                        <img class="img-fluid rounded-3 mb-5" src="<?php echo esc_url($medium_image_2_url[0]); ?>" alt="" />
                <?php endif;
                endif; ?>
            </div>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <p class="lead fw-normal text-muted"><?php echo wp_kses_post(get_post_meta(get_the_ID(), 'description', true)); ?></p>
                    <a class="text-decoration-none" href="<?php echo wp_kses_post(get_post_meta(get_the_ID(), 'project_link', true)); ?>">
                        View project
                        <i class="bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); // load footer ?>
