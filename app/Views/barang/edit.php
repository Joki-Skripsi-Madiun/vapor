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
                        <h2>Barang</h2>
                    </div>
                </div>
            </div>
            <!-- end graph -->
            <div class="row column3">
                <!-- testimonial -->
                <div class="col-md-4">
                    <div class="dark_bg full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Edit Data</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content testimonial">
                                        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                            <form class="row g-3" action="<?= base_url(); ?>/barang/update/<?= $joinbarang[0]['id_barang']; ?>" method="post" enctype="multipart/form-data">
                                                <div class="col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                                    <select class="form-control" name="id_kategori">
                                                        <option selected value="<?= $joinbarang[0]['id_kategori']; ?>"><?= $joinbarang[0]['nama_kategori']; ?></option>
                                                        <?php foreach ($kategori as $k) : ?>
                                                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Nama Barang</label>
                                                    <input type="text" name="nama_barang" value="<?= $joinbarang[0]['nama_barang']; ?>" class="form-control" id="inputAddress" placeholder="Nama Barang">
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Jumlah Barang</label>
                                                    <input type="text" name="jumlah_barang" value="<?= $joinbarang[0]['jumlah_barang']; ?>" class="form-control" id="inputAddress" placeholder="Jumlah Barang">
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Harga Barang</label>
                                                    <input type="text" name="harga_barang" value="<?= $joinbarang[0]['harga_barang']; ?>" class="form-control" id="inputAddress" placeholder="Harga Barang">
                                                </div>
                                                <br>
                                                <div class="col-12">

                                                    <label for="merk" class="form-label">Gambar</label>

                                                    <br>
                                                    <input type="file" name="foto" value="<?= $joinbarang[0]['foto']; ?>" class="form-control" id="inputAddress" placeholder="Gambar">
                                                </div>

                                                <div class="col-sm-4 col-md-3 margin_bottom_30">


                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Gambar</label>
                                                    <img src="<?php echo base_url(); ?>/img/<?= (old('foto') ? old('foto') : $joinbarang[0]['foto']); ?>" width="100">
                                                    <div class="col-12 mt-5">
                                                    </div>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Edit</button>
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