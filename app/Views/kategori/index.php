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
                        <h2>Kategori</h2>
                    </div>
                </div>
            </div>
            <!-- end graph -->
            <div class="full graph_revenue">
                <div class="row">
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
                                                        <label for="merk" class="form-label">Nama Kategori</label>
                                                        <input type="text" name="nama_kategori" value="<?= old('nama_kategori') ?>" class="form-control" id="inputAddress" placeholder="Nama Kategori">
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

                    <div class="col-md-8">
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2>Data Kategori</h2>
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

                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($kategori as $a) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $a['nama_kategori']; ?></td>


                                                            <td>
                                                                <a href="/kategori/edit/<?= $a['id_kategori']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-edit"></i> </a>
                                                                <!-- <a href="/data-akun/detail/<?= $a['id_kategori']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a> -->
                                                                <form action="/kategori/<?= $a['id_kategori']; ?>" method="post" class="d-inline">
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