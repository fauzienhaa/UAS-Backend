<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-4 ">Detail ticket</h1>

            <a href="/ticket" class="mt-3 mb-4 btn btn-primary">Kembali ke daftar ticket</a>

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
                            <td><?= $ticket['id_ticket']; ?></td>
                            <td><?= $ticket['nama']; ?></td>
                            <td><?= $ticket['jurusan']; ?></td>
                            <td><?= $ticket['kelas']; ?></td>
                            <td><?= $ticket['jumlah_kursi']; ?></td>
                            <td>
                            <a href="/ticket/jadwal/<?= $ticket['id_ticket']; ?>" class="btn btn-warning">Jadwal</a>
                            </td>
                            <td>
                            <a href="/ticket/edit/<?= $ticket['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('Ticket/delete/'.$ticket['id_ticket']); ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>