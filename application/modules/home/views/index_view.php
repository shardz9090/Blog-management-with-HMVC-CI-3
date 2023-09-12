<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<link href="<?php echo base_url(); ?>assets/frontend/css/viewblog.css" rel="stylesheet" />
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Blogs</h6>
            <h1 class="mb-5">Explore The Blogs</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($blogs as $blog) : ?>
                <?php if ($blog->visibility === '0') { ?>

                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4 h-100">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/blogimg/' . $blog->b_image); ?>" alt="Blog Image">
                            </div>
                            <h4 class="mb-3"><?= $blog->b_title; ?></h4>
                            <a class="btn-slide mt-2" href="<?php echo base_url('read_more/' . $blog->bid); ?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                <?php } else {
                    continue;
                } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>