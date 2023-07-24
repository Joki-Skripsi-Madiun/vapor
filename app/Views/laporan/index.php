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
                        <h2>Laporan</h2>
                    </div>
                </div>
            </div>
            <div class="row column4 graph">
                <!-- end testimonial -->
                <!-- progress bar -->
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Cetak Laporan</h2>
                            </div>
                        </div>
                        <div class="full progress_bar_inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="progress_bar">
                                        <h5>Laporan Bulanan Toko Vapor</h5>
                                        <p>Silahkan pilih bulan laporan Toko Vapor</p>
                                        <br>
                                        <div class="d-flex justify-content-center mb-5">
                                            <form action="/laporan/print" method="post">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <label for="inputPassword6" class="col-form-label">Pilih Bulan</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <select name="bulan" class="form-control" aria-label="Default select example">
                                                            <option selected>Pilih . . .</option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                        <input type="hidden" name="tahun" value="<?= date('Y'); ?>">
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary">Cari</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end progress bar -->
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