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
                        <h2>User</h2>
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
                                            <div class="card-body">
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
                                                <form class="row g-3" action="/user/update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="col-12">
                                                        <label for="merk" class="form-label">Nama</label>
                                                        <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>" class="form-control" id="inputAddress" placeholder="Nama">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="merk" class="form-label">No Telepon</label>
                                                        <input type="text" name="tlp" value="<?= (old('tlp')) ? old('tlp') : $user['tlp']; ?>" class="form-control" id="inputAddress" placeholder="No Telepon">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="merk" class="form-label">Username</label>
                                                        <input type="text" name="username" value="<?= (old('username')) ? old('username') : $user['username']; ?>" class="form-control" id="inputAddress" placeholder="Username">
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="merk" class="form-label">Role</label>
                                                        <select class="form-control " id="floatingSelect" aria-label="Floating label select example" name="role">
                                                            <option selected value="<?= (old('role')) ? old('role') : $user['role']; ?>"><?= $user['role'] == 1 ? 'Admin' : 'Pembeli'; ?></option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Pembeli</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-12">
                                                        <label for="merk" class="form-label">Password</label>
                                                        <input type="password" name="password" class="form-control" id="inputAddress" value="<?= (old('password')) ? old('password') : $user['password']; ?>" placeholder="Password">
                                                    </div>


                                                    <div class="col-12 mt-5">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Edit</button>

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


<?= $this->endSection(); ?>