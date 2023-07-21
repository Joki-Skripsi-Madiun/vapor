<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="<?= base_url(); ?>/template/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php if (session()->get('role') == 1) { ?>
                <!-- Sidebar -->
                <?= $this->include('layout/sidebar1'); ?>
                <!-- End of Sidebar -->
            <?php } elseif (session()->get('role') == 2) { ?>

                <!-- Sidebar -->
                <?= $this->include('layout/sidebar2'); ?>
                <!-- End of Sidebar -->
            <?php } elseif (session()->get('role') == 3) { ?>

                <!-- Sidebar -->
                <?= $this->include('layout/sidebar3'); ?>
                <!-- End of Sidebar -->
            <?php } else { ?>

                <!-- Sidebar -->
                <?= $this->include('layout/sidebar'); ?>
                <!-- End of Sidebar -->
            <?php } ?>






            <!-- Begin Page Content -->
            <?= $this->rendersection('content'); ?>

            <!-- /.container-fluid -->



        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/template/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/template/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/template/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="<?= base_url(); ?>/template/js/animate.js"></script>
    <!-- select country -->
    <script src="<?= base_url(); ?>/template/js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="<?= base_url(); ?>/template/js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="<?= base_url(); ?>/template/js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/template/js/Chart.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/template/js/utils.js"></script>
    <script src="<?= base_url(); ?>/template/js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="<?= base_url(); ?>/template/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="<?= base_url(); ?>/template/js/custom.js"></script>
    <script src="<?= base_url(); ?>/template/js/chart_custom_style1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data1').DataTable();
        });
    </script>
</body>

</html>