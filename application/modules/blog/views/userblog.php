<link href="<?php echo base_url(); ?>assets/frontend/css/viewblog.css" rel="stylesheet" />

<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Blogs</h6>
            <h1 class="mb-5">Explore The Blogs</h1>
        </div>
        <div class="row g-4">
            <?php $countblog = count($blogs) ?>
            <?php if ($countblog > 0) { ?>
                <?php foreach ($blogs as $blog) : ?>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4 h-100">
                            <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/blogimg/' . $blog->b_image); ?>" alt="Blog Image">
                            </div>
                            <h4 class="mb-3"><?= $blog->b_title; ?></h4>
                            <a class="btn-slide mt-2" href="<?php echo base_url('read_more/' . $blog->bid); ?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
                <h1> You have not posted any BLOG.</h1>
            <?php } ?>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('success_blog')) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Blog Published!",
            text: "<?php echo $this->session->flashdata('success_blog'); ?>",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.close();
            }
        });
    </script>

<?php endif; ?>