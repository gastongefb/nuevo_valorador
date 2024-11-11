<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<h2>Antecedentes Docentes</h2>

<form action="<?php echo base_url('guardarAntDocentes') ?>" method="post" autocomplete="off">

    <br>
    <h3>Agregar Antecedente Docente</h3>
    <div id="personContainer">
        <!-- Tabla para mostrar los títulos -->
        <table id="personTable" border="1">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="person3">
                    <td>
                        <select name="persons3[1][id_detalle_doc]" id="opciones1">
                          <option value="1">Antiguedad en el espacio curricular o equivalente en el nivel Superior Técnico.</option>
                          <option value="2">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                          <option value="3">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                        </select>
                    </td>
                    <td><input type="text" name="persons3[1][detalle_ant_doc]" id="detalle_ant_doc1"></td>
                    <td><input type="text" name="persons3[1][fecha]" id="fecha1"></td>
                    <td>
                        <button type="button" class="removePerson3">Eliminar</button>
                        <button type="button" class="editPerson3">Modificar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <button type="button" id="addPerson3">Agregar Antecedente Docente</button>
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
                               <option value="1">Antiguedad en el espacio curricular o equivalente en el nivel Superior Técnico.</option>
                               <option value="2">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                               <option value="3">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editDetalle">Detalle</label>
                            <input type="text" class="form-control" id="editDetalle" name="editDetalle">
                        </div>
                        <div class="form-group">
                            <label for="editFecha">Años</label>
                            <input type="text" class="form-control" id="editFecha" name="editFecha">
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

            $('#addPerson3').click(function() {
                if ($('#personTable tbody tr').length < maxPersons) {
                    personCount++;
                    var html = `
                        <tr class="person3">
                            <td>
                                <select name="persons3[${personCount}][id_detalle_doc]" id="opciones${personCount}">
                                    <option value="1">Antiguedad en el espacio curricular o equivalente en el nivel Superior Técnico.</option>
                                    <option value="2">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                                    <option value="3">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                                </select>
                            </td>
                            <td><input type="text" name="persons3[${personCount}][detalle_ant_doc]" id="detalle_ant_doc${personCount}"></td>
                            <td><input type="text" name="persons3[${personCount}][fecha]" id="fecha${personCount}"></td>
                            <td>
                                <button type="button" class="removePerson3">Eliminar</button>
                                <button type="button" class="editPerson3">Modificar</button>
                            </td>
                        </tr>
                    `;
                    $('#personTable tbody').append(html);
                } else {
                    alert('Se ha alcanzado el límite máximo de personas.');
                }
            });

            $(document).on('click', '.removePerson3', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('click', '.editPerson3', function() {
                var row = $(this).closest('tr');
                var rowIndex = row.index();

                var options = row.find('select').val();
                var detalle = row.find('input[name$="[detalle_ant_doc]"]').val();
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
                row.find('input[name$="[detalle_ant_doc]"]').val(detalle);
                row.find('input[name$="[fecha]"]').val(fecha);

                $('#editModal').modal('hide');
            });
        });
    </script>

    
</form>

<?php echo $this->endSection(); ?>
