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
                                <h2>Tambah Data</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content testimonial">
                                        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                            <form class="row g-3" action="<?= base_url(); ?>/barang/save" method="post" enctype="multipart/form-data">
                                                <div class="col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                                    <select class="form-control" name="id_kategori">
                                                        <option selected>Open this select menu</option>
                                                        <?php foreach ($kategori as $k) : ?>
                                                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Nama Barang</label>
                                                    <input type="text" name="nama_barang" value="<?= old('nama_barang') ?>" class="form-control" id="inputAddress" placeholder="Nama Barang">
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Jumlah Barang</label>
                                                    <input type="text" name="jumlah_barang" value="<?= old('jumlah_barang') ?>" class="form-control" id="inputAddress" placeholder="Jumlah Barang">
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Harga Barang</label>
                                                    <input type="text" name="harga_barang" value="<?= old('harga_barang') ?>" class="form-control" id="inputAddress" placeholder="Harga Barang">
                                                </div>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Gambar</label>
                                                    <input type="file" name="foto" value="<?= old('foto') ?>" class="form-control" id="inputAddress" placeholder="Gambar">
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
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($joinbarang as $a) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $a['nama_kategori']; ?></td>
                                                        <td><?= $a['nama_barang']; ?></td>
                                                        <td><?= $a['harga_barang']; ?></td>
                                                        <td><?= $a['jumlah_barang']; ?></td>
                                                        <td><img src="<?php echo base_url(); ?>/img/<?= $a['foto']; ?>" width="50"></td>

                                                        <td>
                                                            <a href="/barang/edit/<?= $a['id_barang']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-edit"></i> </a>
                                                            <!-- <a href="/data-akun/detail/<?= $a['id_barang']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a> -->
                                                            <form action="/barang/<?= $a['id_barang']; ?>" method="post" class="d-inline">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fa fa-trash fa-sm text-white-50"></i> </a> </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
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
                <p>Copyright © 2023 Designed by html.design. All rights reserved.<br><br>
                    Distributed By: Keluarga Vapor Store Magetan
                </p>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>
<?= $this->endSection(); ?>