<html data-bs-theme="light" lang="en" style>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>tugas</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/icons/bs-icons/bootstrap-icons.min.css') ?>">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span>Akmal Yusuf Abiyoga</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-1" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'home' ? 'active' : '' ?>"
                            href="<?= $page == 'home' ? '#' : '/' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'about' ? 'active' : '' ?>"
                            href="<?= $page == 'about' ? '#' : 'about' ?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'services' ? 'active' : '' ?>"
                            href="<?= $page == 'services' ? '#' : 'services' ?>">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'portfolio' ? 'active' : '' ?>"
                            href="<?= $page == 'portfolio' ? '#' : 'portfolio' ?>">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'staffs' ? 'active' : '' ?>"
                            href="<?= $page == 'staffs' ? '#' : 'staffs' ?>">Staffs</a>
                    </li>
                </ul><a class="btn btn-primary" type="button" href="contact">Contact</a>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('content') ?>
    <footer class="text-center bg-body" data-bs-theme="dark">
        <div class="container py-4 py-lg-5">
            <p class="text-body mb-0">Copyright © 2025 Brand</p>
        </div>
    </footer>

    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
</body>

</html>