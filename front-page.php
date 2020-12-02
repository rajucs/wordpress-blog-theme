<?php
get_header();
?>
<!-- Slider -->
<section class="slider-section">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol> <!-- End of Indicators -->

        <!-- Carousel Content -->
        <div class="carousel-inner" role="listbox">
            <?php
            $args = array(
                'post_type' => 'gallery',
            );
            $gallery  = new WP_Query($args);
            // var_dump($gallery);
            if ($gallery->have_posts()) {
                while ($gallery->have_posts()) {
                    $gallery->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    var_dump($featured_img_url);
            ?>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="carousel-item active">
                            <img src="<?php echo $featured_img_url; ?>" alt="all offer bd">

                            <div class="carousel-caption d-none d-md-block">
                                <h3><?php echo the_title(); ?></h3>
                                <p>Cool description for Amazon Forest.</p>
                            </div>
                        </div> <!-- End of Carousel Item -->
                    </a>
            <?php
                }
            }
            ?>
        </div> <!-- End of Carousel Content -->

        <!-- Previous & Next -->
        <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div> <!-- End of Carousel -->
</section> <!-- End of Slider -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    //
                    // Post Content here
                    //
            ?>
                    <div class="col-12 col-sm-8 col-md-4 col-lg-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-12 post-lists">

                                    <div class="card-body">
                                        <div class="" style="height: 200px;">
                                            <?php echo get_the_post_thumbnail(get_the_id(), 'thumbnail'); ?>

                                        </div>
                                        <h5 class="card-title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a></h5>
                                        <p class="card-text">
                                            <?php echo get_the_excerpt(); ?>
                                        </p>
                                        <div class="card-text d-flex justify-content-space-between">
                                            <?php
                                            $lastmodified = get_the_modified_time('U');
                                            $posted = get_the_time('U');
                                            ?>

                                            <p class="text-muted pr-3">
                                                <?php echo "Posted " . human_time_diff($posted, current_time('U')) . "ago"; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                } // end while
            } // end if

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php the_posts_pagination(array('mid_size' => 2)); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
