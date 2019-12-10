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


                    <?php if ($this->session->flashdata('message')) : ?>

                        <div class="flash-role" data-role="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php endif; ?>


            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <a href="" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
                            <div class="table-responsive">
                                <table id="dataTable" class="table  table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($role as $r) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $r['role']; ?> </td>
                                                <td>
                                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-users-cog"></i></a>
                                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editRoleModal<?= $r['id']; ?>"><i class="fas fa-edit"></i></a>

                                                    <div class="modal fade" id="editRoleModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="newRoleModalLabel">Edit Role</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="<?= base_url('admin/editrole'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $r['id'] ?>">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="roleedit" name="roleedit" value="<?= $r['role']; ?>" required>
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


                                                    <a href="" class="btn  btn-sm btn-danger" data-toggle="modal" data-target="#hapusRoleModal<?= $r['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    <div class="modal fade" id="hapusRoleModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Role</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('admin/hapusrole'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                                                    <div class="modal-body">Apakah ingin menghapus <?= $r['role']; ?> ?</div>
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
        <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/role'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="role" name="role" placeholder="Role name" required>
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