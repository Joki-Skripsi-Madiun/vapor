<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data</h1>
        </div>
        <div class="row">


            <!-- Card Body -->
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
                <form class="row g-3" action="/tambahAkun/saveAkun" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="merk" class="form-label">Nama</label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control" id="inputAddress" placeholder="Nama">
                    </div>
                    <div class="col-12">
                        <label for="merk" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= old('username') ?>" class="form-control" id="inputAddress" placeholder="Username">
                    </div>
                    <div class="col-12">
                        <label for="merk" class="form-label">Role</label>
                        <select class="form-select px-3" style="border-radius: 10rem;  font-size: 0.8rem;" id="floatingSelect" aria-label="Floating label select example" name="role">
                            <option selected>Open this select menu</option>
                            <option value="1">Admin</option>
                            <option value="2">Pengguna</option>

                        </select>

                    </div>
                    <div class="col-12">
                        <label for="merk" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputAddress" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <label for="merk" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="confpassword" class="form-control" id="inputAddress" placeholder="Konfirmasi Password">
                    </div>

                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
                        <input class="btn btn-danger" type="reset" value="X Batal">
                    </div>
                </form>
            </div>
        </div>


    </main>
</div>
<?= $this->endSection(); ?>