<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-4 ">Jadwal Kereta</h1>

            <a href="/kereta" class="mt-3 mb-4 btn btn-primary">Kembali ke detail kereta</a>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kereta</th>
                        <th scope="col">Stasiun</th>
                        <th scope="col">Datang</th>
                        <th scope="col">Berangkat</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <tr>
                    <?php foreach ($jadwal as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['nama']; ?></td>
                            <td><?= $j['stasiun']; ?></td>
                            <td><?= $j['datang']; ?></td>
                            <td><?= $j['berangkat']; ?></td>
                            <!-- <td>
                                <a href="<?= base_url('jadwal/edit/' . $j['kodker']); ?>" class="btn btn-info">Edit</a>
                                <a href="<?= base_url('jadwal/delete/'.$j['kodker']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>