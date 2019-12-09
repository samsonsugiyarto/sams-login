<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <!-- <img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->

        <i class="pl-3 fas fa-code"></i>

        <span class="brand-text font-weight-light">SAMS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- Query Menu -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                                FROM `user_menu` JOIN `user_access_menu`
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`. `menu_id` ASC";

                $menu = $this->db->query($queryMenu)->result_array();
                // var_dump($menu);
                // die;

                ?>
                <!-- LOPPING MENU -->
                <?php
                $i = 0;
                $len = count($menu); ?>

                <?php foreach ($menu as $m) : ?>

                    <?php if ($i == 0) : ?>
                        <li class="nav-header pl-3"><?= $m['menu']; ?></li>

                    <?php else : ?>
                        <li class="nav-header"><?= $m['menu']; ?></li>


                    <?php endif; ?>


                    <!-- SIAPKAN SUBMENU SESUAI MENU -->
                    <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                        FROM `user_sub_menu`     
                       WHERE `menu_id` = $menuId
                       AND `is_active` = 1";

                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                    <?php foreach ($subMenu as $sm) : ?>

                        <li class="nav-item ">
                            <?php if ($title == $sm['title']) : ?>
                                <a href="<?= base_url($sm['url']); ?>" class="nav-link active ">
                                <?php else : ?>
                                    <a href="<?= base_url($sm['url']); ?>" class="nav-link  ">
                                    <?php endif; ?>
                                    <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                    <p>
                                        <?= $sm['title']; ?>
                                    </p>
                                    </a>
                        </li>
                    <?php endforeach; ?>
                    <?php $i++; ?>
                <?php endforeach; ?>


                <li class="nav-item mt-5">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link" data-toggle="modal" data-target=" #modal-default">
                        <i class=" nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>