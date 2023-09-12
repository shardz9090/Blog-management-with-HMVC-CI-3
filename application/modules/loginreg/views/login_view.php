<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php echo form_open_multipart('loginreg/Dbwork/login_form', array('id' => 'loginForm')); ?>
                <h5 class="card-title fw-400">Sign In</h5>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="uname" type="text" placeholder="UserName">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>

                    <button class="btn btn-block btn-bold btn-primary" type="submit">Sign In</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Logged in!",
                            text: response.message,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo base_url(); ?>";
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Wrong Credentials.",
                            text: response.message,
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OKK"
                        });
                    }
                }
            });
        });
    });
</script>