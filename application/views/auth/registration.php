<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Registration</b>page</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Create an Account!</p>

            <form class="user" method="post" action="<?= base_url('auth/Registration'); ?>">
                <div class="input-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Full name" value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', ' <small class="text-danger" >', '</small>'); ?>
                <div class="input-group mt-3">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', ' <small class="text-danger" >', '</small>'); ?>
                <div class="input-group mt-3">
                    <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', ' <small class="text-danger" >', '</small>'); ?>
                <div class="input-group mt-3 mb-3">
                    <input type="password" id="password2" name="password2" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="<?= base_url('auth'); ?>" class="text-center">Already have an account? Login!</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->