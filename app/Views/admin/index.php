<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">User List</h1>

    <div class="row">
        <div class="col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->name; ?></td>
                        <td>
                            <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-primary">
                                detail
                            </a>
                        </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>