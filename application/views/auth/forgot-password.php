<div class="login-box">
    <div class="login-logo">
        <a><b>ForgotPassword</b>Page</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
                <div class="input-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', ' <small class="text-danger" >', '</small>'); ?>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3">Request new password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?= base_url('auth'); ?>">Login</a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->