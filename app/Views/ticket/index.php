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
            
            <h1 class="mt-4 mb-3">Data Pemesanan</h1>


            <a href="/ticket/create" class="btn btn-success mb-4">Tambah Pemesanan</a>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID Pemesanan</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu Berangkat</th>
                        <!-- <th scope="col">Waktu Tiba</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">ِAksi</th> -->
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ticket as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t->id_ticket; ?></td>
                            <td><?= $t->id_user; ?></td>
                            <td><?= $t->tujuan; ?></td>
                            <td><?= $t->berangkat ?></td>
                            <!-- <td>
                                <a href="/tiket/<?= $t->id_user; ?>" class="btn btn-info">Detail</a>
                                
                            </td>
                            <td>
                                <a href="<?= base_url('ticket/' . $t->id_user); ?>" class="btn btn-info">Detail</a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>