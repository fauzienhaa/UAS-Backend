<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2 text-center">Tambah Kereta</h1>

            <a href="/kereta" class="mb-3 btn btn-primary">Kembali ke daftar kereta</a>


            <div class="card ">

                <form action="/kereta/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row mt-3">
                        <label for="kode_kereta" class="col-sm-3 col-form-label text-center">
                            Kode Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('kode_kereta')) ? 'is-invalid' : ''; ?> " 
                            id="kode_kereta" name="kode_kereta" autofocus value="<?= old('kode_kereta'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_kereta'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="nama" class="col-sm-3 col-form-label text-center">
                            Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" 
                            id="nama" name="nama" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="jurusan" class="col-sm-3 col-form-label text-center">
                            Jurusan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>" 
                            id="jurusan" name="jurusan" value="<?= old('jurusan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jurusan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="kelas" class="col-sm-3 col-form-label text-center">
                            Kelas</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" 
                            id="kelas" name="kelas" value="<?= old('kelas'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kelas'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="jumlah_kursi" class="col-sm-3 col-form-label text-center">
                            Jumlah Kursi</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control <?= ($validation->hasError('jumlah_kursi')) ? 'is-invalid' : ''; ?>" 
                            id="jumlah_kursi" name="jumlah_kursi" value="<?= old('jumlah_kursi'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_kursi'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col card-header text-center mt-4">
                        <button type="submit" class="btn btn-success ">Tambah Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>