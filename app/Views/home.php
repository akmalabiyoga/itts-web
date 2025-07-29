<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 gy-md-0">
            <div
                class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div style="max-width: 350px;">
                    <h2 class="text-uppercase fw-bold"><?= $main_title ?></h2>
                    <p class="my-3"><?= $main_subtitle ?></p>
                    <a class="btn btn-primary btn-lg me-2" role="button" href="about">Kenali Saya</a>
                    <a class="btn btn-outline-primary btn-lg" role="button" href="portfolio">Portofolio</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="m-xl-5 p-xl-5"><img class="rounded img-fluid object-fit-cover w-100" style="min-height: 300px; max-height: 300px;"
                        src="<?= $main_image_url ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Layanan Unggulan</h2>
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
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Portofolio</h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php foreach ($portfolios as $portfolio): ?>
                <div class="col">
                    <div>
                        <img class="rounded img-fluid object-fit-cover d-block w-100" style="height: 200px;"
                        src="<?= esc($portfolio['image_url']) ?>" />
                        <div class="py-4">
                            <h4><?= esc($portfolio['title']) ?></h4>
                            <p><?= esc($portfolio['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?= $this->endSection() ?>