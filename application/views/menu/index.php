        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                    </div><!-- /.container-fluid -->
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <a href="" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                            <div class="table-responsive">
                                <table id="dataTable" class="table  table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $m['menu']; ?> </td>
                                                <td><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editMenuModal<?= $m['id']; ?>"><i class="fas fa-edit"></i></a>

                                                    <div class="modal fade" id="editMenuModal<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editMenuModal">Edit Menu</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="<?= base_url('menu/editmenu'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $m['id'] ?>">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="menuedit" name="menuedit" value="<?= $m['menu']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">ubah</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <a href="" class="btn  btn-sm btn-danger" data-toggle="modal" data-target="#hapusMenuModal<?= $m['id']; ?>"><i class="fas fa-trash-alt"></i></a>

                                                    <div class="modal fade" id="hapusMenuModal<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusMenuModal" aria-hidden="true">

                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusMenuModal">Hapus Menu</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('menu/hapusmenu'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                                                    <div class="modal-body">Apakah ingin menghapus <?= $m['menu']; ?> ?</div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                        <button class="btn btn-primary">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>