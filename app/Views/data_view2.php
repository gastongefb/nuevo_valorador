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
        <h2>Datos Posdato</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla3 as $record): ?>
                <tr id="row-<?= $record['id_postgrado'] ?>">
                    <td><?= $record['id_postgrado'] ?></td>
                    <td class="detalle"><?= $record['detalle_valoracion_postgrado'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-id="<?= $record['id_postgrado'] ?>" data-name="<?= $record['detalle_valoracion_postgrado'] ?>" data-email="<?= $record['fecha'] ?>">Edit</button>
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

                        <input type="hidden" name="id_va" value="<?= $record['id_valoracion']; ?>">
                        <input type="hidden" name="id_ti" value="<?= $record['id_titulo_postgrado']; ?>">

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
        const detalle = row.find('.detalle').text();
        const fecha = row.find('.fecha').text();

        // Pasar los valores actualizados al modal
        $('#editId').val(id);
        $('#editDetalle').val(detalle);
        $('#editFecha').val(fecha);

        $('#editModal').modal('show');
    });

    // Al enviar el formulario del modal
    $('#editForm').on('submit', function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        // Realizar la solicitud POST
        $.post('<?= base_url("DataController/update2") ?>', formData, function (response) {
            if (response.status === 'success') {
                const id = $('#editId').val();

                // Actualizar los valores directamente en la tabla
                const row = $('#row-' + id);
                row.find('.detalle').text(response.data.detalle_valoracion_postgrado);
                row.find('.fecha').text(response.data.fecha);

                // Cerrar el modal
                $('#editModal').modal('hide');
            }
        }, 'json');
    });
});
    </script>
</body>
</html>
