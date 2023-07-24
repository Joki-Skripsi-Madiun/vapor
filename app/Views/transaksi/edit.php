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
                        <h2>Pembayaran</h2>
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
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h5>Periksa Entrian Form</h5>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="full graph_revenue">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content testimonial">
                                        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                            <form class="row g-3" action="/transaksi/update/<?= $transaksi['id_transaksi']; ?>" method="post" enctype="multipart/form-data">
                                                <div class="col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
                                                    <select class="form-control" name="id_pembayaran">
                                                        <option value="<?= (old('id_pembayaran')) ? old('id_pembayaran') : $jointransaksi[0]['id_pembayaran']; ?>" selected><?= (old('nama_pembayaran')) ? old('nama_pembayaran') : $jointransaksi[0]['nama_pembayaran']; ?></option>
                                                        <?php foreach ($pembayaran as $p) : ?>
                                                            <option value="<?= $p['id_pembayaran'] ?>"><?= $p['nama_pembayaran'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <?php if (session()->get('role') == 1) { ?>
                                                    <div class="col-12">
                                                        <label for="exampleInputEmail1" class="form-label">Pembeli</label>
                                                        <select class="form-control" name="id_user">
                                                            <option value="<?= (old('id_user')) ? old('id_user') : $jointransaksi[0]['id_user']; ?>" selected><?= (old('nama')) ? old('nama') : $jointransaksi[0]['nama']; ?></option>
                                                            <?php foreach ($user as $u) : ?>
                                                                <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                <?php } else { ?>
                                                    <input type="hidden" name="id_user" value="<?= $jointransaksi[0]['id_user']; ?>">
                                                <?php } ?>
                                                <div class="col-12">
                                                    <label for="merk" class="form-label">Nama Pembayaran</label>
                                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"><?= (old('keterangan')) ? old('keterangan') : $transaksi['keterangan']; ?></textarea>

                                                </div>


                                                <div class="col-12 mt-5">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button>
                                                    <a href="/transaksi" class="btn btn-danger">Kembali</a>
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