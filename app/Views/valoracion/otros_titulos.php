<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<h2>Otros Títulos</h2>

<form action="<?php echo base_url('guardarOtrosTitulos') ?>" method="post" autocomplete="off">

    <br>
    <h3>Agregar Otros Títulos</h3>
    <div id="personContainer">
        <!-- Tabla para mostrar los títulos -->
        <table id="personTable" border="1">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Detalle</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="person6">
                    <td>
                        <select name="persons6[1][id_otros_titulos]" id="opciones1">
                            <option value="1">Títulos de grado universitario relacionado con la educación.</option>
                            <option value="2">Títulos universitario de Profesor, asociado al título universitario e base.</option>
                            <option value="3">Título de Técnico Superior relacionado a la carrera y al espacio curricular.</option>
                            <option value="4">Título de Técnico de Nivel Secundario relacionado a la carrera y al espacio curricular.</option>
                        </select>
                    </td>
                    <td><input type="text" name="persons6[1][detalle_otros_titulos]" id="detalle_otros_titulos1"></td>
                    <td><input type="date" name="persons6[1][fecha]" id="fecha1"></td>
                    <td>
                        <button type="button" class="removePerson6">Eliminar</button>
                        <button type="button" class="editPerson6">Modificar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <button type="button" id="addPerson6">Agregar Título</button>
    <br>
    <br>
    <button type="submit" class="btn btn-secondary">Siguiente</button>
    <br>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Título</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editRowId">
                        <div class="form-group">
                            <label for="editTitulo">Título</label>
                            <select class="form-control" id="editTitulo" name="editTitulo">
                                <option value="1">Títulos de grado universitario relacionado con la educación.</option>
                                <option value="2">Títulos universitario de Profesor, asociado al título universitario e base.</option>
                                <option value="3">Título de Técnico Superior relacionado a la carrera y al espacio curricular.</option>
                                <option value="4">Título de Técnico de Nivel Secundario relacionado a la carrera y al espacio curricular.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editDetalle">Detalle</label>
                            <input type="text" class="form-control" id="editDetalle" name="editDetalle">
                        </div>
                        <div class="form-group">
                            <label for="editFecha">Fecha</label>
                            <input type="date" class="form-control" id="editFecha" name="editFecha">
                        </div>
                        <button type="button" class="btn btn-primary" id="saveEdit">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            var maxPersons = 50; // Cambia este valor según tus necesidades
            var personCount = 1;

            $('#addPerson6').click(function() {
                if ($('#personTable tbody tr').length < maxPersons) {
                    personCount++;
                    var html = `
                        <tr class="person6">
                            <td>
                                <select name="persons6[${personCount}][id_otros_titulos]" id="opciones${personCount}">
                                    <option value="1">Títulos de grado universitario relacionado con la educación.</option>
                                    <option value="2">Títulos universitario de Profesor, asociado al título universitario e base.</option>
                                    <option value="3">Título de Técnico Superior relacionado a la carrera y al espacio curricular.</option>
                                    <option value="4">Título de Técnico de Nivel Secundario relacionado a la carrera y al espacio curricular.</option>
                                </select>
                            </td>
                            <td><input type="text" name="persons6[${personCount}][detalle_otros_titulos]" id="detalle_otros_titulos${personCount}"></td>
                            <td><input type="date" name="persons6[${personCount}][fecha]" id="fecha${personCount}"></td>
                            <td>
                                <button type="button" class="removePerson6">Eliminar</button>
                                <button type="button" class="editPerson6">Modificar</button>
                            </td>
                        </tr>
                    `;
                    $('#personTable tbody').append(html);
                } else {
                    alert('Se ha alcanzado el límite máximo de personas.');
                }
            });

            $(document).on('click', '.removePerson6', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('click', '.editPerson6', function() {
                var row = $(this).closest('tr');
                var rowIndex = row.index();

                var options = row.find('select').val();
                var detalle = row.find('input[name$="[detalle_otros_titulos]"]').val();
                var fecha = row.find('input[name$="[fecha]"]').val();

                $('#editRowId').val(rowIndex);
                $('#editTitulo').val(options);
                $('#editDetalle').val(detalle);
                $('#editFecha').val(fecha);

                $('#editModal').modal('show');
            });

            $('#saveEdit').click(function() {
                var rowIndex = $('#editRowId').val();
                var titulo = $('#editTitulo').val();
                var detalle = $('#editDetalle').val();
                var fecha = $('#editFecha').val();

                var row = $('#personTable tbody tr').eq(rowIndex);
                row.find('select').val(titulo);
                row.find('input[name$="[detalle_otros_titulos]"]').val(detalle);
                row.find('input[name$="[fecha]"]').val(fecha);

                $('#editModal').modal('hide');
            });
        });
    </script>

    
</form>

<?php echo $this->endSection(); ?>
