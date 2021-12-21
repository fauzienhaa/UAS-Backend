<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2 text-center">Tambah Data Pemesanan</h1>

            <a href="/ticket" class="mb-3 btn btn-primary">Kembali ke Data Pemesanan</a>


            <div class="card ">

            <!-- <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode ticket</th>
                        <th scope="col">Nama Kereta</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Waktu Berangkat</th>
                        <th scope="col">Waktu Tiba</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">ِAksi</th>
                    </tr> -->

                <form action="/ticket/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row mt-3">
                        <label for="kode_ticket" class="col-sm-3 col-form-label text-center">
                            Kode ticket</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('kode_ticket')) ? 'is-invalid' : ''; ?> " 
                            id="kode_ticket" name="kode_ticket" autofocus value="<?= old('kode_ticket'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_ticket'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="nama" class="col-sm-3 col-form-label text-center">
                            Nama Kereta</label>
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