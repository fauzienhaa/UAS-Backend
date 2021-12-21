<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4"><?= lang('Auth.loginTitle') ?></h3>
                </div>
                <div class="card-body">

                <?= view('Myth\Auth\Views\_message_block') ?>

					<form action="<?= route_to('login') ?>" method="post">
						<?= csrf_field() ?>

                        <?php if ($config->validFields === ['email']) : ?>
                        <div class="form-floating mb-3">
                            <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" type="email" placeholder="<?= lang('Auth.email') ?>" />
                            <label for="login"><?= lang('Auth.email') ?></label>
                            <div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
                        </div>
                        <?php else : ?>
                            
                        <div class="form-floating mb-3">
                            <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" type="text" placeholder="<?= lang('Auth.email') ?>" >
                            <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                            <div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php endif; ?>

                        <div class="form-floating mb-3">
                            <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                name="password" type="password" placeholder="<?= lang('Auth.password') ?>" >
                                <label for="password"><?= lang('Auth.password') ?></label>
                                <div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

                        <!-- <?php if ($config->allowRemembering) : ?>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="remembering" type="checkbox"
                            <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                        </div>
                        <?php endif; ?> -->

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">
                                <?= lang('Auth.loginAction') ?>
                            </button>
                        </div>
                    </form>
                </div>


                <?php if ($config->activeResetter) : ?>
                <div class="card-footer text-center py-3">
                <div class="small">
                    <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                    </div>
                <?php endif; ?>
                   
                <hr>
                <div class="text-center">
                <?php if ($config->allowRegistration) : ?>
                    <div class="small">
                    <p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                    </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>