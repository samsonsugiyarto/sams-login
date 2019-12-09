<div class="login-box">
    <div class="login-logo">
        <a><b>ChangePassword</b>Page</a>
        <h5 class="text-warning"><?= $this->session->userdata('reset_email'); ?></h5>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth/changepassword'); ?>" method="post">
                <div class="input-group">
                    <input type="password" id="password1" name="password1" class="form-control" placeholder="New password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas  fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', ' <small class="text-danger" >', '</small>'); ?>
                <div class="input-group mt-3">
                    <input type="password" id="password2" name="password2" class="form-control" placeholder="Repeat password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas  fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', ' <small class="text-danger" >', '</small>'); ?>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block mt-3">Change password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->