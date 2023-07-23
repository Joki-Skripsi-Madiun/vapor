<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div id="content">
    <!-- topbar -->



    <!-- end topbar -->
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Transaksi</h2>
                    </div>
                </div>
            </div>
            <div class="row column4 graph">
                <!-- Gallery section -->
                <div class="col-md-6">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Barang</h2>
                            </div>
                        </div>
                        <div class="full gallery_section_inner padding_infor_info">
                            <div class="row">
                                <?php foreach ($joinbarang as $a) : ?>
                                    <div class="col-sm-6 col-md-6 margin_bottom_30">
                                        <div class="column">
                                            <a data-fancybox="gallery" href="<?php echo base_url(); ?>/img/<?= $a['foto']; ?>"><img class="img-responsive" src="<?php echo base_url(); ?>/img/<?= $a['foto']; ?>" alt="#" /></a>
                                        </div>
                                        <div class="heading_section">
                                            <h4><?= $a['nama_barang']; ?></h4>
                                        </div>
                                    </div>
                                <?php endforeach ?>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dark_bg full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Tambah Transaksi</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content testimonial">
                                        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                            <form class="row g-3" action="<?= base_url(); ?>/barang/save" method="post" enctype="multipart/form-data">
                                                <div class="col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                                                    <select class="form-control" name="id_user">
                                                        <option selected>Open this select menu</option>
                                                        <?php foreach ($user as $k) : ?>
                                                            <option value="<?= $k['id_user'] ?>"><?= $k['nama'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 col-md-3 margin_bottom_30">


                                                </div>

                                                <div class="col-12">
                                                    <table id="data1" class="table">
                                                        <thead>

                                                            <tr>
                                                                <th>No</th>

                                                                <th>Nama Barang</th>
                                                                <th>Harga</th>
                                                                <th>Jumlah</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="col-12 mt-5">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                                                    <input class="btn btn-danger" type="reset" value="X Batal">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end graph -->
                <div class="row column3">
                    <!-- testimonial -->

                </div>
                <!-- end testimonial -->
                <!-- progress bar -->
                <div class="col-md-8">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Data Barang</h2>
                            </div>
                        </div>
                        <div class="full progress_bar_inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="progress_bar">
                                        <!-- Skill Bars -->
                                        <table id="data1" class="table table-avatar bg-grey text-black" style="width:100%">
                                            <thead>

                                                <tr>
                                                    <th>No</th>
                                                    <th>Kategori</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end progress bar -->
            </div>

        </div>
        <!-- footer -->
        <div class="container-fluid">
            <div class="footer">
                <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                    Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>
<?= $this->endSection(); ?>