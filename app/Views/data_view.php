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
                <?php foreach ($records as $record): ?>
                <tr id="row-<?= $record['id'] ?>">
                    <td><?= $record['id'] ?></td>
                    <td class="name"><?= $record['name'] ?></td>
                    <td class="email"><?= $record['email'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-id="<?= $record['id'] ?>" data-name="<?= $record['name'] ?>" data-email="<?= $record['email'] ?>">Edit</button>
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
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
    // Al hacer clic en el botón de edición
    $('.btn-edit').on('click', function () {
        const id = $(this).data('id');
        
        // Obtener los valores actualizados directamente desde la fila de la tabla
        const row = $('#row-' + id);
        const name = row.find('.name').text();
        const email = row.find('.email').text();

        // Pasar los valores actualizados al modal
        $('#editId').val(id);
        $('#editName').val(name);
        $('#editEmail').val(email);

        $('#editModal').modal('show');
    });

    // Al enviar el formulario del modal
    $('#editForm').on('submit', function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        // Realizar la solicitud POST
        $.post('<?= base_url("DataController/update") ?>', formData, function (response) {
            if (response.status === 'success') {
                const id = $('#editId').val();

                // Actualizar los valores directamente en la tabla
                const row = $('#row-' + id);
                row.find('.name').text(response.data.name);
                row.find('.email').text(response.data.email);

                // Cerrar el modal
                $('#editModal').modal('hide');
            }
        }, 'json');
    });
});
    </script>
</body>
</html>
