<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            
            <h1 class="mt-4 mb-3">Daftar Kereta</h1>


            <a href="/kereta/create" class="btn btn-success mb-4">Tambah Kereta</a>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kereta</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">ِAksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kereta as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k->kode_kereta; ?></td>
                            <td><?= $k->nama; ?></td>
                            <td><?= $k->jurusan ?></td>
                            <td><?= $k->kelas ?></td>
                            <td><?= $k->jumlah_kursi ?></td>
                            <td>
                                <a href="<?= base_url('kereta/' . $k->id); ?>" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>