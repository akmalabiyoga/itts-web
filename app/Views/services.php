<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Layanan</h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php foreach ($services as $service): ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="col d-flex mb-2">
                                <i class="bi <?= $service['icon'] ?> d-flex bg-primary text-white p-2 rounded fs-3"></i>
                            </div>
                            <h4 class="card-title"><?= esc($service['title']) ?></h4>
                            <p class="card-text"><?= esc($service['description']) ?></p>
                            <?php if (!empty($service['contact'])): ?>
                                <a href="mailto:<?= esc($service['contact']) ?>" class="btn btn-primary">Contact</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?= $this->endSection() ?>