<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container py-4 py-xl-5">
    <div class="row mb-4 mb-lg-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Tim Kami</h2>
            <p>Perkenalkan tim profesional Kami</p>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-3">
        <?php foreach ($staffs as $staff): ?>
            <div class="col">
                <div class="card border-0 shadow-none">
                    <div class="card-body text-center d-flex flex-column align-items-center p-0"><img
                            class="rounded-circle object-fit-cover mb-3" width="130" height="130"
                            src="<?= $staff['image_url'] ?>" />
                        <h5 class="fw-bold text-primary mb-0 card-title"><strong><?= $staff['nama'] ?></strong></h5>
                        <p class="text-muted mb-2 card-text"><?= $staff['peran'] ?></p>
                        <ul class="list-inline fs-6 text-muted w-100 mb-0">
                            <li class="list-inline-item text-center">
                                <i class="bi bi-instagram"></i>
                            </li>
                            <li class="list-inline-item text-center">
                                <i class="bi bi-twitter-x"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection() ?>