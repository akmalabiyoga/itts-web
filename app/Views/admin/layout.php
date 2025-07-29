<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blasnk Page - admins</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/Nunito.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bss-overrides.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/icons/bs-icons/bootstrap-icons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/datatables.min.css') ?>">
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start p-0 sidebar sidebar-dark accordion bg-gradient-primary navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center m-0 sidebar-brand" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="bi bi-emoji-smile-upside-down-fill"></i></div>
                    <div class="mx-3 sidebar-brand-text"><span>admin</span></div>
                </a>
                <hr class="my-0 sidebar-divider">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <?php foreach ([
                            ['label'=> 'Home', 'url'=> '/admin', 'icon' => 'bi bi-house-fill', 'active' => $page == 'home'],
                            ['label'=> 'Services', 'url'=> '/admin/services', 'icon' => 'bi bi-briefcase', 'active' => $page == 'services'],
                            ['label'=> 'Portfolios', 'url'=> '/admin/portfolios', 'icon' => 'bi bi-images', 'active' => $page == 'portfolios'],
                            ['label'=> 'Staffs', 'url'=> '/admin/staffs', 'icon' => 'bi bi-people', 'active' => $page == 'staffs'],
                        ] as $nav): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $nav['active'] ? 'active' : '' ?>" href="<?= $nav['url'] ?>">
                                <i class="<?= $nav['icon'] ?>"></i>
                                <span><?= $nav['label'] ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
                    <div class="container-fluid"><button class="btn btn-link d-md-none me-3 rounded-circle"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                                        href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?= $nama ?? 'Akmal Yusuf'?></span>
                                        <img class="border rounded-circle img-profile"
                                        src="<?php echo base_url('assets/admin/img/avatars/avatar1.jpeg') ?>">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-user me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-cogs me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Settings</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-list me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                                class="fas fa-sign-out-alt me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?= $this->renderSection('content') ?>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © admin 2025</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="<?php echo base_url('assets/admin/js/bs-init.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/theme.js') ?>"></script>
</body>

</html>