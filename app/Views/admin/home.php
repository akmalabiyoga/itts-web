<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h3 class="text-dark mb-1">Config Web</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= site_url('admin/web_config') ?>" method="post">
                <?php foreach ($web_config as $config): ?>
                    <div class="mb-3">
                        <label for="<?= $config['item'] ?>" class="form-label"><?= ucfirst(str_replace('_', ' ', $config['item'])) ?></label>
                        <?php if (in_array($config['item'], ['about_text'])): ?>
                            <textarea class="form-control" id="<?= $config['item'] ?>" name="<?= $config['item'] ?>" rows="3"><?= $config['long_value'] ?></textarea>
                        <?php else:?>
                            <input type="text" class="form-control" id="<?= $config['item'] ?>" name="<?= $config['item'] ?>" value="<?= $config['value'] ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>