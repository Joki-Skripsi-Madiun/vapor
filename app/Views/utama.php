<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Trator</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/home/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/home/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url(); ?>/home/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url(); ?>/home/images/fevicon.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/home/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- <a class="navbar-brand" href="index.html"><img src="<?= base_url(); ?>/home/images/logo.png"></a> -->
                <h1 class="text-white"> Keluarga Vapor Store Magetan</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>/register">Register</a>
                        </li>
                        <!--  <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gallery.html">Vehicles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="client.html">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="banner_taital_main">
                                <h1 class="banner_taital"> <br><span style="color: #fe5b29;">Keluarga Vapor <br>Store Magetan</span></h1>

                                <div class="btn_main">
                                    <div class="contact_bt"><a href="<?= base_url(); ?>/login">Login</a></div>
                                    <div class="contact_bt active"><a href="<?= base_url(); ?>/register">Register</a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- gallery section start -->
    <div class="gallery_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="gallery_taital">Produk</h1>
                </div>
            </div>

            <div class="gallery_section_2">

                <div class="row">
                    <?php foreach ($barang as $a) : ?>
                        <div class="col-md-4">
                            <div class="gallery_box">
                                <div class="gallery_img"><img src="<?php echo base_url(); ?>/img/<?= $a['foto']; ?>"></div>
                                <h3 class="types_text"><?= $a['nama_barang']; ?></h3>
                                <p class="looking_text"><?= $a['harga_barang']; ?></p>
                                <div class="read_bt"><a href="<?= base_url(); ?>/login">Book Now</a></div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>

        </div>
    </div>


    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright_text">2023 All Rights Reserved. Design by Keluarga Vapor Store Magetan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="<?= base_url(); ?>/home/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/home/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/home/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/home/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url(); ?>/home/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url(); ?>/home/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url(); ?>/home/js/custom.js"></script>
</body>

</html>