<?php echo $this->extend('admin/layout') ?>
<?php echo $this->section('content') ?>
<section id="mainSect">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col d-flex justify-content-between">
                <h3 class="text-dark mb-1">Config Portfolios</h3>
                <button onclick="switchSection('form')" class="btn btn-primary" type="button">Tambah</button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="table">
                    <table class="table table-striped" id="servicesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image URL</th>
                                <th>Main?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($portfolios as $portfolio): ?>
                                <tr>
                                    <td><?php echo $portfolio['id'] ?></td>
                                    <td><?php echo $portfolio['title'] ?></td>
                                    <td><?php echo $portfolio['description'] ?></td>
                                    <td><?php echo $portfolio['image_url'] ?></td>
                                    <td><?php echo $portfolio['is_main'] ? 'Yes' : 'No' ?></td>
                                    <td>
                                        <button onclick="switchSection('form',<?= $portfolio['id'] ?>)" class="btn btn-warning btn-sm">Edit</button>
                                        <a href="<?php echo site_url('admin/portfolios/delete/' . $portfolio['id']) ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="formSect">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col d-flex justify-content-between">
                <h3 class="text-dark mb-1">Add/Edit Portfolio</h3>
                <button onclick="switchSection('main')" class="btn btn-primary" type="button">Kembali</button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form>
                    <input type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image_url" name="image_url" value="">
                    </div>
                    <div class="mb-3">
                        <label for="is_main" class="form-label">Main Portfolio?</label>
                        <select class="form-control" id="is_main" name="is_main">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#portfoliosTable').DataTable();

        sections = {
            'main': $('#mainSect').html(),
            'form': $('#formSect').html()
        };

        switchSection('main')
    });

    function switchSection(section, id = null) {
        $('#mainSect, #formSect').html('');
        $(`#${section}Sect`).html(sections[section]);

        // Set form action and method
        let form = $('#formSect form');
        if (id) {
            form.attr('action', `/admin/portfolios/update/${id}`);
            form.attr('method', 'POST');
            $.ajax({
                url: `/admin/portfolios/edit/${id}`,
                method: 'GET',
                success: function (portfolio) {
                    $('#title').val(portfolio.title);
                    $('#description').val(portfolio.description);
                    $('#image_url').val(portfolio.image_url);
                    $('#is_main').val(portfolio.is_main ? '1' : '0');
                    $('input[name="id"]').val(portfolio.id);
                },
                error: function () {
                    alert('Error loading portfolio data');
                }
            });
        } else {
            form.attr('action', '/admin/portfolios/store');
            form.attr('method', 'POST');
            // Clear form fields for new entry
            $('#title').val('');
            $('#description').val('');
            $('#image_url').val('');
            $('#is_main').val('0');
            $('input[name="id"]').val('');
        }
    }
</script>
<?php echo $this->endSection() ?>