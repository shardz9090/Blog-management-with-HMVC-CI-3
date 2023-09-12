<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php echo form_open_multipart('loginreg/Dbwork/reg_form', array('id' => "registerform")); ?>
                <h5 class="card-title fw-400">Sign Up</h5>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="fname" type="text" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="uname" type="text" placeholder="UserName">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="conpassword" type="password" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="status" name="status">
                            <option value="" disabled selected>Signup as</option>
                            <option value="0">Enduser</option>
                            <option value="1">Blogger</option>
                            <option value="2">Editor</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>

                    <button class="btn btn-block btn-bold btn-primary">Sign Up</button>
                </div>
                <?php form_close(); ?>
                <a href="<?= base_url('login'); ?>">Login</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#registerform').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "ID Registered!",
                            text: response.message,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo base_url('login'); ?>";
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title: "Empty Credentials.",
                            text: response.message,
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OK"
                        });
                    }
                }
            });
        });
    });
</script>