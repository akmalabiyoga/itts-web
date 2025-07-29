<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <h3>Past Projects</h3>
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