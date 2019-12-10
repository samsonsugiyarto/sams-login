        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="flash-userpass" data-userpass="<?= $this->session->flashdata('message'); ?>"></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('messageerror')) : ?>
                    <div class="flash-usererror" data-usererror="<?= $this->session->flashdata('messageerror'); ?>"></div>
                <?php endif; ?>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', ' <small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', ' <small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', ' <small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->