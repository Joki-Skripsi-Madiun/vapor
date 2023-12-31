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
    <title>Keluarga Vapor Store Magetan</title>
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
    <!-- calendar file css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/js/semantic.min.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">

                        <div class="center">
                            <h1 class="text-white">Register</h1>
                            <!-- <img width="210" src="<?= base_url(); ?>/template/images/logo/logo.png" alt="#" /> -->
                        </div>
                    </div>

                    <div class="login_form">
                        <form action="/register/save" method="post">

                            <div class="field">
                                <label class="label_field">Nama</label>
                                <input type="text" name="nama" placeholder="Nama" />
                            </div>
                            <div class="field">
                                <label class="label_field">No Telepon</label>
                                <input type="text" name="tlp" placeholder="no Telepon" />
                            </div>
                            <div class="field">
                                <label class="label_field">Alamat</label>
                                <input type="text" name="alamat" placeholder="alamat" />
                            </div>
                            <input type="hidden" name="role" value="2">
                            <!-- <div class="field">
                                <label class="label_field">Role</label>
                                <select name="role">
                                    <option selected>Open this select menu</option>

                                    <option value="1">Admin</option>
                                    <option value="2">Pembeli</option>

                                </select>
                            </div> -->
                            <div class="field">
                                <label class="label_field">Username</label>
                                <input type="text" name="username" placeholder="Username" />
                            </div>
                            <div class="field">
                                <label class="label_field">Password</label>
                                <input type="password" name="password" placeholder="Password" />
                            </div>

                            <div class="field margin_0">
                                <label class="label_field hidden">hidden label</label>
                                <button type="submit" class="main_bt">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
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
    <!-- nice scrollbar -->
    <script src="<?= base_url(); ?>/template/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>