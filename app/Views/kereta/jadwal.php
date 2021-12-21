<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-4 ">Detail Tiket</h1>

            <a href="/kereta" class="mt-3 mb-4 btn btn-primary">Kembali ke daftar kereta</a>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Kereta</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                            <td><?= $kereta['id']; ?></td>
                            <td><?= $kereta['nama']; ?></td>
                            <td><?= $kereta['jurusan']; ?></td>
                            <td><?= $kereta['kelas']; ?></td>
                            <td><?= $kereta['jumlah_kursi']; ?></td>
                            <td>
                            <a href="/kereta/jadwal/<?= $kereta['id']; ?>" class="btn btn-warning">Jadwal</a>
                            </td>
                            <td>
                            <a href="/kereta/edit/<?= $kereta['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('Kereta/delete/'.$kereta['id']); ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>