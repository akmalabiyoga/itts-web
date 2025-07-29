<?php echo $this->extend('admin/layout') ?>
<?php echo $this->section('content') ?>
<section id="mainSect">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col d-flex justify-content-between">
                <h3 class="text-dark mb-1">Config Services</h3>
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
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Contact</th>
                                <th>Main?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?php echo $service['id'] ?></td>
                                    <td><?php echo $service['title'] ?></td>
                                    <td><?php echo $service['description'] ?></td>
                                    <td><?php echo $service['icon'] ?></td>
                                    <td><?php echo $service['contact'] ?></td>
                                    <td><?php echo $service['is_main'] ? 'Yes' : 'No' ?></td>
                                    <td>
                                        <button onclick="switchSection('form',<?= $service['id'] ?>)" class="btn btn-warning btn-sm">Edit</button>
                                        <a href="<?php echo site_url('admin/services/delete/' . $service['id']) ?>"
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
                <h3 class="text-dark mb-1">Add/Edit Service</h3>
                <button onclick="switchSection('main')" class="btn btn-primary" type="button">Kembali</button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form>
                    <input type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="">
                    </div>
                    <div class="mb-3">
                        <label for="is_main" class="form-label">Main Service?</label>
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
        $('#servicesTable').DataTable();

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
            form.attr('action', `/admin/services/update/${id}`);
            form.attr('method', 'POST');
            $.ajax({
                url: `/admin/services/edit/${id}`,
                method: 'GET',
                success: function (service) {
                    $('#title').val(service.title);
                    $('#description').val(service.description);
                    $('#icon').val(service.icon);
                    $('#contact').val(service.contact);
                    $('#is_main').val(service.is_main ? '1' : '0');
                    $('input[name="id"]').val(service.id);
                },
                error: function () {
                    alert('Error loading service data');
                }
            });
        } else {
            form.attr('action', '/admin/services/store');
            form.attr('method', 'POST');
            // Clear form fields for new entry
            $('#title').val('');
            $('#description').val('');
            $('#icon').val('');
            $('#contact').val('');
            $('#is_main').val('0');
            $('input[name="id"]').val('');
        }
        }
</script>
<?php echo $this->endSection() ?>