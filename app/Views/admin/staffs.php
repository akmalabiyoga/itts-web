<?php echo $this->extend('admin/layout') ?>
<?php echo $this->section('content') ?>
<section id="mainSect">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col d-flex justify-content-between">
                <h3 class="text-dark mb-1">Config Staffs</h3>
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
                                <th>Name</th>
                                <th>Role</th>
                                <th>Description</th>
                                <th>Image URL</th>
                                <th>Hidden?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($staffs as $staff): ?>
                                <tr>
                                    <td><?php echo $staff['id'] ?></td>
                                    <td><?php echo $staff['nama'] ?></td>
                                    <td><?php echo $staff['peran'] ?></td>
                                    <td><?php echo $staff['deskripsi'] ?></td>
                                    <td><?php echo $staff['image_url'] ?></td>
                                    <td><?php echo $staff['is_hidden'] ? 'Yes' : 'No'?></td>
                                    <td>
                                        <button onclick="switchSection('form',<?= $staff['id'] ?>)" class="btn btn-warning btn-sm">Edit</button>
                                        <a href="<?php echo site_url('admin/staffs/delete/' . $staff['id']) ?>"
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
                <h3 class="text-dark mb-1">Add/Edit Staff</h3>
                <button onclick="switchSection('main')" class="btn btn-primary" type="button">Kembali</button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form>
                    <input type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Role</label>
                        <input type="text" class="form-control" id="peran" name="peran" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Description</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image_url" name="image_url" value="">
                    </div>
                    <div class="mb-3">
                        <label for="is_hidden" class="form-label">Hidden?</label>
                        <select class="form-control" id="is_hidden" name="is_hidden">
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
        $('#staffsTable').DataTable();

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
            form.attr('action', `/admin/staffs/update/${id}`);
            form.attr('method', 'POST');
            $.ajax({
                url: `/admin/staffs/edit/${id}`,
                method: 'GET',
                success: function (staff) {
                    $('#nama').val(staff.nama);
                    $('#peran').val(staff.peran);
                    $('#deskripsi').val(staff.deskripsi);
                    $('#image_url').val(staff.image_url);
                    $('#is_hidden').val(staff.is_hidden ? '1' : '0');
                    $('input[name="id"]').val(staff.id);
                },
                error: function () {
                    alert('Error loading staff data');
                }
            });
        } else {
            form.attr('action', '/admin/staffs/store');
            form.attr('method', 'POST');
            // Clear form fields for new entry
            $('#nama').val('');
            $('#peran').val('');
            $('#deskripsi').val('');
            $('#image_url').val('');
            $('#is_hidden').val('0');
            $('input[name="id"]').val('');
        }
    }
</script>
<?php echo $this->endSection() ?>