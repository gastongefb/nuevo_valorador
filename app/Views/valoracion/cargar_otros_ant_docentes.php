<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<h2>Otros Antecedentes Docentes</h2>

<form action="<?php echo base_url('guardarOtrosAntDocentes') ?>" method="post" autocomplete="off">

    <br>
    <h3>Agregar Antecedente Docente</h3>
    <div id="personContainer">
        <!-- Tabla para mostrar los títulos -->
        <table id="personTable" border="1">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Detalle</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="person7">
                    <td>
                        <select name="persons7[1][id_detalle_otros_ant]" id="opciones1">
                          <option value="1">Expositor y/o autor de trabajos presentados en congresos, simposios,etc..</option>
                          <option value="2">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Con referato.</option>
                          <option value="3">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Sin referato.</option>
                          <option value="4">Participación en la elaboración de diseños curriculares de carreras de Nivel Superior Técnico en los.</option>
                        </select>
                    </td>
                    <td><input type="text" name="persons7[1][detalle_otros_ant_doc]" id="detalle_otros_ant_doc1"></td>
                    <td><input type="date" name="persons7[1][fecha]" id="fecha1"></td>
                    <td>
                        <button type="button" class="removePerson7">Eliminar</button>
                        <button type="button" class="editPerson7">Modificar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <button type="button" id="addPerson7">Agregar Antecedente Docente</button>
    <br>
    <br>
    <button type="submit" class="btn btn-secondary">Siguiente</button>
    <br>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Antecedente Docente</h5>
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
                                <option value="1">Expositor y/o autor de trabajos presentados en congresos, simposios,etc..</option>
                                <option value="2">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Con referato.</option>
                                <option value="3">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Sin referato.</option>
                                <option value="4">Participación en la elaboración de diseños curriculares de carreras de Nivel Superior Técnico en los.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editDetalle">Detalle</label>
                            <input type="text" class="form-control" id="editDetalle" name="editDetalle">
                        </div>
                        <div class="form-group">
                            <label for="editFecha">Años</label>
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

            $('#addPerson7').click(function() {
                if ($('#personTable tbody tr').length < maxPersons) {
                    personCount++;
                    var html = `
                        <tr class="person7">
                            <td>
                                <select name="persons7[${personCount}][id_detalle_otros_ant]" id="opciones${personCount}">
                                    <option value="1">Expositor y/o autor de trabajos presentados en congresos, simposios,etc..</option>
                                    <option value="2">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Con referato.</option>
                                    <option value="3">Publicaciones relacionadas al espacio curricular a la carrera, de los últimos 5 años.Sin referato.</option>
                                    <option value="4">Participación en la elaboración de diseños curriculares de carreras de Nivel Superior Técnico en los.</option>
                                </select>
                            </td>
                            <td><input type="text" name="persons7[${personCount}][detalle_otros_ant_doc]" id="detalle_otros_ant_doc${personCount}"></td>
                            <td><input type="date" name="persons7[${personCount}][fecha]" id="fecha${personCount}"></td>
                            <td>
                                <button type="button" class="removePerson7">Eliminar</button>
                                <button type="button" class="editPerson7">Modificar</button>
                            </td>
                        </tr>
                    `;
                    $('#personTable tbody').append(html);
                } else {
                    alert('Se ha alcanzado el límite máximo de personas.');
                }
            });

            $(document).on('click', '.removePerson7', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('click', '.editPerson7', function() {
                var row = $(this).closest('tr');
                var rowIndex = row.index();

                var options = row.find('select').val();
                var detalle = row.find('input[name$="[detalle_otros_ant_doc]"]').val();
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
                row.find('input[name$="[detalle_otros_ant_doc]"]').val(detalle);
                row.find('input[name$="[fecha]"]').val(fecha);

                $('#editModal').modal('hide');
            });
        });
    </script>

    
</form>

<?php echo $this->endSection(); ?>
