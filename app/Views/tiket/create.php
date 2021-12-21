<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2 text-center">Tambah Tiket</h1>

            <a href="/tiket" class="mb-3 btn btn-primary">Kembali ke daftar tiket</a>


            <div class="card ">

                <form action="/tiket/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row mt-3">
                        <label for="id_kereta" class="col-sm-3 col-form-label text-center">
                            Id Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('id_kereta')) ? 'is-invalid' : ''; ?> " 
                            id="id_kereta" name="id_kereta" autofocus value="<?= old('id_kereta'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_kereta'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="tujuan" class="col-sm-3 col-form-label text-center">
                            Tujuan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" 
                            id="tujuan" name="tujuan" value="<?= old('tujuan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tujuan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="waktu_berangkat" class="col-sm-3 col-form-label text-center">
                            Waktu Berangkat</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control <?= ($validation->hasError('waktu_berangkat')) ? 'is-invalid' : ''; ?>" 
                            id="waktu_berangkat" name="waktu_berangkat" value="<?= old('waktu_berangkat'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('waktu_berangkat'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="waktu_tiba" class="col-sm-3 col-form-label text-center">
                            Waktu Tiba</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control <?= ($validation->hasError('waktu_tiba')) ? 'is-invalid' : ''; ?>" 
                            id="waktu_tiba" name="waktu_tiba" value="<?= old('waktu_tiba'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('waktu_tiba'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="jumlah_tiket" class="col-sm-3 col-form-label text-center">
                            Jumlah Bangku Kosong</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control <?= ($validation->hasError('jumlah_tiket')) ? 'is-invalid' : ''; ?>" 
                            id="jumlah_tiket" name="jumlah_tiket" value="<?= old('jumlah_tiket'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_tiket'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="harga" class="col-sm-3 col-form-label text-center">
                            Harga Tiket (Rp)</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" 
                            id="harga" name="harga" value="<?= old('harga'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
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