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
                <div class="col-md-5">
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
                                            <form action="/transaksi/save" method="post">
                                                <div class="row d-flex justify-content-center mt-3">
                                                    <div class="col-6 text-center">
                                                        <label for="exampleInputEmail1" class="form-label">Qty</label>
                                                        <input type="hidden" name="id" value="<?php echo $a['id_barang']; ?>" />
                                                        <input type="hidden" name="nama" value="<?php echo $a['nama_barang']; ?>" />
                                                        <input type="hidden" name="harga" value="<?php echo $a['harga_barang']; ?>" />
                                                        <input type="hidden" name="gambar" value="<?php echo $a['foto']; ?>" />
                                                        <input class="form-control" type="number" name="qty" value="1" />
                                                        <button class="btn mt-3 btn-white text-dark" type="submit">Tambah</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <h4><?= $a['nama_barang']; ?></h4>
                                        </div>
                                    </div>
                                <?php endforeach ?>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
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


                                            <div class="col-12">
                                                <form action="<?php echo base_url() ?>/transaksi/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
                                                    <?php
                                                    if ($cart) {
                                                    ?>
                                                        <table id="data1" class="table">
                                                            <thead>

                                                                <tr>
                                                                    <th>No</th>

                                                                    <th>Gambar</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Harga</th>
                                                                    <th>Qty</th>
                                                                    <th>Sub Total</th>
                                                                    <th>Aksi</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                // Create form and send all values in "shopping/update_cart" function.
                                                                $grand_total = 0;
                                                                $i = 1;

                                                                foreach ($cart as $item) :
                                                                    $grand_total = $grand_total + $item['subtotal'];
                                                                ?>
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][gambar]" value="<?php echo $item['gambar']; ?>" />
                                                                    <input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
                                                                    <tr>
                                                                        <td><?php echo $i++; ?></td>
                                                                        <td><img class="img-responsive" src="<?php echo base_url() . '/img/' . $item['gambar']; ?>" /></td>
                                                                        <td><?php echo $item['name']; ?></td>
                                                                        <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                                        <td><input type="text" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
                                                                        <td><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                                                        <td><a href="<?php echo base_url() ?>/transaksi/hapus/<?php echo $item['rowid']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-sm text-white-50"></i></a></td>
                                                                    <?php endforeach; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"><b>Order Total: Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b></td>
                                                                        <td colspan="4" align="right">
                                                                            <a data-toggle="modal" data-target="#myModal" class='btn btn-sm btn-danger' rel="noopener noreferrer">Kosongkan Cart</a>
                                                                            <button class='btn btn-sm btn-success' type="submit">Update Cart</button>

                                                                    </tr>

                                                            </tbody>
                                                        </table>

                                                    <?php
                                                    } else {
                                                        echo "<h3>Keranjang Belanja masih kosong</h3>";
                                                    }
                                                    ?>
                                                </form>
                                                <hr>
                                                <form action="<?php echo base_url() ?>/transaksi/checkout" method="post" enctype="multipart/form-data">
                                                    <?php if (session()->get('role') == 1) { ?>
                                                        <div class="col-12">
                                                            <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                                                            <select class="form-control" name="id_user">
                                                                <option selected>Open this select menu</option>
                                                                <?php foreach ($user as $k) : ?>
                                                                    <option value="<?= $k['id_user'] ?>"><?= $k['nama'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                                                    <?php } ?>
                                                    <div class="col-12">
                                                        <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
                                                        <select class="form-control" name="id_pembayaran">
                                                            <option selected>Open this select menu</option>
                                                            <?php foreach ($pembayaran as $p) : ?>
                                                                <option value="<?= $p['id_pembayaran'] ?>"><?= $p['nama_pembayaran'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>

                                                    </div>
                                                    <div class="col-12 mt-5">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-cart"></i> Cek Out</button>
                                                        <a href="/transaksi/batal" class="btn btn-danger">Batal</a>
                                                    </div>
                                                </form>

                                                <div class="col-sm-4 col-md-3 margin_bottom_30">


                                                </div>
                                            </div>

                                            <!-- Modal Penilai -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <form method="post" action="<?php echo base_url() ?>/transaksi/hapus/all">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"></button>
                                                                <h4 class="modal-title">Konfirmasi</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda yakin mau mengosongkan Shopping Cart?

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-sm btn-default">Ya</button>
                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--End Modal-->
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