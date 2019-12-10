        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <?php if ($this->session->flashdata('message')) : ?>

                    <div class="flash-user" data-user="<?= $this->session->flashdata('message'); ?>"></div>
                <?php endif; ?>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title profile-username"><?= $user['name']; ?></h3>
                                    <p class="card-text text-muted"><?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->