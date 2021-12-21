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
            
            <h1 class="mt-4 mb-3">Daftar Tiket</h1>


            <a href="/tiket/create" class="btn btn-success mb-4">Tambah Tiket</a>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Kereta</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu Berangkat</th>
                        <th scope="col">Waktu Tiba</th>
                        <th scope="col">Jumlah Bangku Kosong</th>
                        <th scope="col">Harga per Tiket</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tiket as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['id_kereta']; ?></td>
                            <td><?= $t['tujuan']; ?></td>
                            <td><?= $t['waktu_berangkat']; ?></td>
                            <td><?= $t['waktu_tiba']; ?></td>
                            <td><?= $t['jumlah_tiket']; ?></td>
                            <td><?= " Rp" . number_format($t['harga'], 0, ".", "."); ?></td>
                            <td>
                                <a href="/tiket/<?= $t['kode_kereta']; ?>" class="btn btn-info">Detail</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>