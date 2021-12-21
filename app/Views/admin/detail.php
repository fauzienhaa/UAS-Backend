<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">User Detail</h1>


    <div class="row">
        <div class="col-lg-8">

            <div class="card mt-4 px-3 " style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $user->username ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if ($user->fullname) : ?>
                        <li class="list-group-item"><? $user->fullname; ?></li>
                    <?php endif; ?>
                    <li class="list-group-item"><?= $user->email; ?></li>
                    <li class="list-group-item"><?= $user->name; ?></span></li>
                </ul>
                <div class="card-body text-center">
                    <small href="#" class="card-link"><a href="<?= base_url('admin'); ?>">
                            << back to user list</a></small>
                </div>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>