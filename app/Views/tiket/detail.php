<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-4 ">Detail Tiket</h1>

            <a href="/tiket" class="mt-3 mb-4 btn btn-primary">Kembali ke daftar tiket</a>

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
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $tiket['id_kereta']; ?></td>
                        <td><?= $tiket['tujuan']; ?></td>
                        <td><?= $tiket['waktu_berangkat']; ?></td>
                        <td><?= $tiket['waktu_tiba']; ?></td>
                        <td><?= $tiket['jumlah_tiket']; ?></td>
                        <td><?=" Rp". number_format($tiket['harga'], 0, ".", "."); ?></td>
                        <td>
                            <a href="/tiket/edit/<?= $tiket['kode_kereta']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('Tiket/delete/'.$tiket['kode_kereta']); ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>