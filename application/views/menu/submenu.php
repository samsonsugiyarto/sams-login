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
                        <div class="flash-menu" data-menu="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php endif; ?>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg">
                            <a href="" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered  table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Menu</th>
                                            <th>Url</th>
                                            <th>Icon</th>
                                            <th>Active</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($subMenu as $sm) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $sm['title']; ?> </td>
                                                <td><?= $sm['menu']; ?> </td>
                                                <td><?= $sm['url']; ?> </td>
                                                <td><?= $sm['icon']; ?> </td>
                                                <td><?= $sm['is_active']; ?> </td>
                                                <td><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id']; ?>"><i class="fas fa-edit"></i></a>

                                                    <div class="modal fade" id="editSubMenuModal<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editSubMenuModalLabel">Edit Sub Menu</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $sm['id'] ?>">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">

                                                                            <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select name="menu_id" id="menu_id" class="form-control">
                                                                                <?php foreach ($menu as $m) : ?>
                                                                                    <?php if ($m['menu'] == $sm['menu']) : ?>
                                                                                        <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                                                                                    <?php else : ?>
                                                                                        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <?php
                                                                                $aktif = $sm['is_active']; ?>
                                                                            <div class="form-check form-check-inline pl-3">
                                                                                <?php if ($aktif == '1') : ?>
                                                                                    <input type="hidden" name="cek" value="0" />
                                                                                    <input type="checkbox" name="cek" value="1" checked />
                                                                                <?php elseif ($aktif == '0') : ?>
                                                                                    <input type="hidden" name="cek" value="0" />
                                                                                    <input type="checkbox" name="cek" value="1" />
                                                                                <?php endif; ?>

                                                                                <label class="form-check-label" for="aktif">&nbsp;AKtif ?</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="" class="btn  btn-sm btn-danger" data-toggle="modal" data-target="#hapusSubMenuModal<?= $sm['id']; ?>"><i class="fas fa-trash-alt"></i></a>

                                                    <div class="modal fade" id="hapusSubMenuModal<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusSubMenuModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusSubMenuModalLabel">Hapus SubMenu</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('menu/hapussubmenu'); ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $sm['id'] ?>">
                                                                    <div class="modal-body">Apakah ingin menghapus sub menu <?= $sm['title'] ?>?</div>
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
        <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/submenu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" required>
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">

                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active ?
                                    </label>
                                </div>
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