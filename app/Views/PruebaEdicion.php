<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Data Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla2 as $record): ?>
                <tr id="row-<?= $record['id_otros_t'] ?>">
                    <td><?= $record['id_otros_t'] ?></td>
                    <td class="val"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle"><?= $record['detalle_otros_titulos'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-id="<?= $record['id_otros_t'] ?>" data-name="<?= $record['val'] ?>" data-name="<?= $record['detalle'] ?>" data-email="<?= $record['fecha'] ?>">Edit</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editDetalle" class="form-label">Detalle</label>
                            <input type="text" class="form-control" id="editDetalle" name="detalle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFecha" class="form-label">Fecha</label>
                            <input type="text" class="form-control" id="editFecha" name="fecha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.btn-edit').on('click', function () {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const email = $(this).data('email');

                $('#editId').val(id);
                $('#editName').val(name);
                $('#editEmail').val(email);

                $('#editModal').modal('show');
            });

            $('#editForm').on('submit', function (e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.post('<?= base_url("DataController/update") ?>', formData, function (response) {
                    if (response.status === 'success') {
                        const id = $('#editId').val();
                        $('#row-' + id + ' .name').text(response.data.name);
                        $('#row-' + id + ' .email').text(response.data.email);
                        $('#editModal').modal('hide');
                    }
                }, 'json');
            });
        });
    </script>
</body>
</html>
