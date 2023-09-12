<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <img src="<?php echo base_url('assets/blogimg/' . $blog['b_image']); ?>" class="card-img-top" alt="Blog Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blog['b_title']; ?></h5>
                    <p class="card-text"><?php echo $blog['b_description']; ?></p>
                    <p class="card-text"><small class="text-muted">By <?php echo $blog['uname']; ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>