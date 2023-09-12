<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.png" type="image/gif" />

    <title>Shapel</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

    <!-- lightbox Gallery-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/ekko-lightbox.css" />

    <!-- font awesome style -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery-3.4.1.min.js"></script>

    <script src="<?= base_url('assets/frontend/js/swal.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="" id="">

                    <div class="custom_menu-btn">
                        <button onclick="openNav()">
                            <span class="s-1"> </span>
                            <span class="s-2"> </span>
                            <span class="s-3"> </span>
                        </button>
                        <div id="myNav" class="overlay">
                            <div class="overlay-content">
                                <a href="<?= base_url(); ?>">Home</a>
                                <?php if ($this->session->userdata('log') === 'logged') { ?>
                                    <a>
                                        Hi! <?php echo $this->session->userdata('uname'); ?>
                                    </a>
                                    <?php if ($this->session->userdata('status') === '0') { ?>
                                    <?php } elseif ($this->session->userdata('status') === '1') { ?>
                                        <a href="<?= base_url('post'); ?>">Create Blogs</a>
                                        <a href="<?= base_url('onlyme/' . $this->session->userdata('uname')); ?>">My Blogs</a>
                                    <?php } elseif ($this->session->userdata('status') === '2') { ?>
                                        <a href="<?= base_url('delete'); ?>">Edit/Delete Blogs</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('post'); ?>">Create Blogs</a>
                                        <a href="<?= base_url('onlyme/' . $this->session->userdata('uname')); ?>">My Blogs</a>
                                        <a href="<?= base_url('delete'); ?>">Edit/Delete Blogs</a>
                                    <?php } ?>


                                    <a onclick="showLogoutConfirmation()" class="nav-item nav-link">Sign Out</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('login'); ?>">Sign In</a>
                                    <a href="<?= base_url('register'); ?>">Register</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <script>
        function showLogoutConfirmation() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "<?= base_url('logout'); ?>";
            }
        }
    </script>