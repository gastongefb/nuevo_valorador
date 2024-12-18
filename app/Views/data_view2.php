<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Tables with Dynamic Fields</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <!-- Tabla 1 -->
        <h5>Tabla Otros Títulos</h5>
        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla2 as $record): ?>
                <tr id="table1-row-<?= $record['id_otros_t'] ?>">
                    <td><?= $record['id_otros_t'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_otros_titulos"><?= $record['detalle_otros_titulos'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table1" data-id="<?= $record['id_otros_t'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table1" data-id="<?= $record['id_otros_t'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tabla 2 -->
        <h5>Tabla Postgrado</h5>
        <table class="table table-bordered" id="table2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla3 as $record): ?>
                <tr id="table2-row-<?= $record['id_postgrado'] ?>">
                    <td><?= $record['id_postgrado'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_valoracion_postgrado"><?= $record['detalle_valoracion_postgrado'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table2" data-id="<?= $record['id_postgrado'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table2" data-id="<?= $record['id_postgrado'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   

    <!-- Tabla 3 -->
    <h5>Tabla Antiguedad</h5>
        <table class="table table-bordered" id="table3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla4 as $record): ?>
                <tr id="table3-row-<?= $record['id_ant_doc'] ?>">
                    <td><?= $record['id_ant_doc'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_ant_doc"><?= $record['detalle_ant_doc'] ?></td>
                    <td class="cantidad"><?= $record['cantidad'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table3" data-id="<?= $record['id_ant_doc'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table3" data-id="<?= $record['id_ant_doc'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    

     <!-- Tabla 4 -->
     <h5>Tabla Formación Recibida</h5>
        <table class="table table-bordered" id="table4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla5 as $record): ?>
                <tr id="table4-row-<?= $record['id_capacitacion'] ?>">
                    <td><?= $record['id_capacitacion'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_capacitacion"><?= $record['detalle_capacitacion'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table4" data-id="<?= $record['id_capacitacion'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table4" data-id="<?= $record['id_capacitacion'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

     <!-- Tabla 5 -->
     <h5>Tabla Formación Ofrecida</h5>
        <table class="table table-bordered" id="table5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla6 as $record): ?>
                <tr id="table5-row-<?= $record['id_formacion'] ?>">
                    <td><?= $record['id_formacion'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_formacion"><?= $record['detalle_formacion'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table5" data-id="<?= $record['id_formacion'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table5" data-id="<?= $record['id_formacion'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

     <!-- Tabla 6 -->
     <h5>Tabla Investigación</h5>
        <table class="table table-bordered" id="table6">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla7 as $record): ?>
                <tr id="table6-row-<?= $record['id_investigacion'] ?>">
                    <td><?= $record['id_investigacion'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_investigacion"><?= $record['detalle_investigacion'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table6" data-id="<?= $record['id_investigacion'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table6" data-id="<?= $record['id_investigacion'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <!-- Tabla 7 -->
     <h5>Tabla Otros Antecedentes</h5>
        <table class="table table-bordered" id="table7">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla8 as $record): ?>
                <tr id="table7-row-<?= $record['id_detalle_ant'] ?>">
                    <td><?= $record['id_detalle_ant'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_otros_ant_doc"><?= $record['detalle_otros_ant_doc'] ?></td>
                    <td class="fecha"><?= $record['fecha'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table7" data-id="<?= $record['id_detalle_ant'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table7" data-id="<?= $record['id_detalle_ant'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

         <!-- Tabla 8 -->
     <h5>Tabla Antecedentes Laborales</h5>
        <table class="table table-bordered" id="table8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valoracion</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosTabla9 as $record): ?>
                <tr id="table8-row-<?= $record['id_ant_lab'] ?>">
                    <td><?= $record['id_ant_lab'] ?></td>
                    <td class="valoracion"><?= $record['id_valoracion'] ?></td>
                    <td class="detalle_ant_lab"><?= $record['detalle_ant_lab'] ?></td>
                    <td class="cantidad"><?= $record['cantidad'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-edit" data-table="table8" data-id="<?= $record['id_ant_lab'] ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-table="table8" data-id="<?= $record['id_ant_lab'] ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal dinámico -->
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
                        <input type="hidden" id="editTable" name="table">
                        <div id="dynamicFields"></div>
                        <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Configurar modal dinámico
            $('.btn-edit').on('click', function () {
                const table = $(this).data('table');
                const id = $(this).data('id');
                const row = $('#' + table + '-row-' + id);
                const fields = row.find('td').not(':last'); // Excluye la columna de acciones

                $('#editId').val(id);
                $('#editTable').val(table);

                // Generar campos dinámicos
                let dynamicFields = '';
                fields.each(function (index) {
                    const fieldName = $(this).attr('class') || 'field' + index;
                    const fieldValue = $(this).text();
                    const label = fieldName.charAt(0).toUpperCase() + fieldName.slice(1);
                    dynamicFields += `
                        <div class="mb-3">
                            <label for="${fieldName}" class="form-label">${label}</label>
                            <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" value="${fieldValue}">
                        </div>
                    `;
                });
                $('#dynamicFields').html(dynamicFields);

                $('#editModal').modal('show');
            });

            // Enviar datos al servidor
            $('#editForm').on('submit', function (e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.post('<?= base_url("NuevoController/updateDynamic") ?>', formData, function (response) {
                    if (response.status === 'success') {
                        const table = $('#editTable').val();
                        const id = $('#editId').val();
                        const row = $('#' + table + '-row-' + id);

                        // Actualizar los valores en la tabla
                        $.each(response.data, function (field, value) {
                            row.find('.' + field).text(value);
                        });

                        $('#editModal').modal('hide');
                    }
                }, 'json');
            });
        });
        
    </script>

    <script>
    $(document).on('click', '.btn-delete', function () {
    const table = $(this).data('table');
    const id = $(this).data('id');
    const row = $('#' + table + '-row-' + id);

    if (confirm('Seguro que quiere elimiar este registro??')) {
        $.post('<?= base_url("NuevoController/deleteRecord") ?>', { table: table, id: id }, function (response) {
            if (response.status === 'success') {
                row.remove(); // Eliminar la fila de la tabla
                alert('Registro eliminado satisfactoriamente!');
            } else {
                alert('Error deleting record: ' + response.message);
            }
        }, 'json');
    }
});

    </script>
</body>
</html>
