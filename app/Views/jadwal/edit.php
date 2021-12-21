<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2 text-center">Edit Jadwal</h1>

            <a href="/jadwal" class="mb-3 btn btn-primary">Kembali ke daftar jadwal</a>


            <div class="card ">

                <form action="/jadwal/update/<?= $jadwal['id']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $jadwal['id']; ?>">


                    <div class="form-group row mt-3">
                        <label for="stasiun" class="col-sm-3 col-form-label text-center">
                            Stasiun</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('stasiun')) ? 'is-invalid' : ''; ?>" 
                            id="stasiun" name="stasiun" value="<?= $jadwal['stasiun']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('stasiun'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="waktu_datang" class="col-sm-3 col-form-label text-center">
                            Waktu Datang</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control <?= ($validation->hasError('waktu_datang')) ? 'is-invalid' : ''; ?>" 
                            id="waktu_datang" name="waktu_datang" value="<?= $tiket['waktu_datang']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('waktu_datang'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="waktu_berangkat" class="col-sm-3 col-form-label text-center">
                            Waktu Berangkat</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control <?= ($validation->hasError('waktu_berangkat')) ? 'is-invalid' : ''; ?>" 
                            id="waktu_berangkat" name="waktu_berangkat" value="<?= $tiket['waktu_berangkat']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('waktu_berangkat'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="tujuan" class="col-sm-3 col-form-label text-center">
                            Tujuan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" 
                            id="tujuan" name="tujuan" value="<?= $jadwal['tujuan']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tujuan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col card-header text-center mt-4">
                        <button type="submit" class="btn btn-success ">Edit Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>