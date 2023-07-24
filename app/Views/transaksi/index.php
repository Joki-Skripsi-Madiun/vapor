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

                <!-- progress bar -->
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="row">
                                <div class="col-9">
                                    <div class="heading1 margin_0">
                                        <h2>Data Transaksi

                                        </h2>
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="/transaksi/create" class="btn btn-dark text-white float-end" style="flex: right;">Buat Transaksi</a>

                                </div>

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
                                                    <th>Tanggal</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Pembayaran</th>
                                                    <th>Keterangan</th>
                                                    <th style="text-align: center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($jointransaksi as $t) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $t['tgl']; ?></td>
                                                        <td><?= $t['nama']; ?></td>
                                                        <td><?= $t['nama_pembayaran']; ?></td>
                                                        <td><?= $t['keterangan']; ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="/transaksi/edit/<?= $t['id_transaksi']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-edit"></i> Ubah</a>
                                                            <a href="/transaksi/detail/<?= $t['id_transaksi']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa fa-eye text-white"></i> Detail</a>
                                                            <form action="/transaksi/<?= $t['id_transaksi']; ?>" method="post" class="d-inline">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fa fa-trash fa-sm text-white-50"></i> Hapus</a> </button>
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