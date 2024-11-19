<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>


<br>
<h2 class="text-center">Listado de Valoraciones</h2>
<br>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function submitFormViaAjax(x) {
        // Obtener los datos del formulario específico mediante su ID
        var formData = $('#updateFormTabla1' + x).serialize();
        console.log(formData); // Verificar qué datos se están enviando

        // Enviar los datos del formulario con AJAX
        $.ajax({
            url: '<?= base_url('actualizarValoracion'); ?>',  // Ruta para guardar los cambios
            type: 'POST',
            data: formData,
            success: function(response) {
                // Cuando la actualización sea exitosa, recargar la tabla o la página
                alert('Registro actualizado correctamente.');
                window.location.reload();  // Recarga la página
            },
            error: function(xhr, status, error) {
                // En caso de error
                alert('Error al actualizar el registro: ' + error);
            }
        });
    }
</script>

<script>
    // Función AJAX para actualizar los datos de la tabla 2 (Otros Títulos)
    function submitFormViaAjaxTabla2(y) {
        var formData = $('#updateFormTabla2' + y).serialize();  // Serializa el formulario correspondiente
        $.ajax({
            url: '<?= base_url('actualizarOtrosTitulos'); ?>',  // Ruta para actualizar el registro
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Registro actualizado correctamente.');

                    // Actualizar los datos en la tabla (sin recargar la página)
                    var fila = $('#fila' + y);  // Obtenemos la fila que corresponde a este registro
                    fila.find('.detalle-otros').text($('#updateFormTabla2' + y + ' input[name="detalle"]').val());  // Actualizamos el detalle
                    fila.find('.fecha-otros').text($('#updateFormTabla2' + y + ' input[name="fecha"]').val());  // Actualizamos la fecha

                    // Cierra el modal después de actualizar
                    $('#detalleModalTabla2' + y).modal('hide');
                } else {
                    alert('Error al actualizar el registro.');
                }
            },
            error: function(xhr, status, error) {
                alert('Error al actualizar el registro: ' + error);
            }
        });
    }
</script>

<script>
    // Función AJAX para actualizar los datos de la tabla 2 (Otros Títulos)
    function submitFormViaAjaxTabla3(z) {
        var formData = $('#updateFormTabla3' + z).serialize();  // Serializa el formulario correspondiente
        $.ajax({
            url: '<?= base_url('actualizarPosFormacion'); ?>',  // Ruta para actualizar el registro
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Registro actualizado correctamente.');

                    // Actualizar los datos en la tabla (sin recargar la página)
                    var fila = $('#fila' + z);  // Obtenemos la fila que corresponde a este registro
                    fila.find('.detalle-pos').text($('#updateFormTabla3' + z + ' input[name="detalle"]').val());  // Actualizamos el detalle
                    fila.find('.fecha-pos').text($('#updateFormTabla3' + z + ' input[name="fecha"]').val());  // Actualizamos la fecha

                    // Cierra el modal después de actualizar
                    $('#detalleModalTabla3' + z).modal('hide');
                } else {
                    alert('Error al actualizar el registro.');
                }
            },
            error: function(xhr, status, error) {
                alert('Error al actualizar el registro: ' + error);
            }
        });
    }
</script>



<!-- Tabla 1 -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código val.</th>
            <th scope="col">DNI</th>
            <th scope="col">Título</th>
            <th scope="col">Jurado 1</th>
            <th scope="col">Jurado 2</th>
            <th scope="col">Jurado 3</th>
            <th scope="col">Materia</th>
            <th scope="col">Detalle</th>
        </tr>
    </thead>
    <tbody>
        <?php $x = 1; ?>
        <?php foreach ($datosTabla1 as $registro): ?>
            <?php if (is_array($registro)): ?>
                <tr>
                    <th scope="row"><?php echo $x; ?></th>
                    <td><?= $registro['id_va']; ?></td>
                    <td><?= $registro['dni']; ?></td>
                    <td><?= $registro['titulo_det']; ?></td>
                    <td><?= $registro['j1']; ?></td>
                    <td><?= $registro['j2']; ?></td>
                    <td><?= $registro['j3']; ?></td>
                    <td><?= $registro['materia']; ?></td>
                    <td>
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleModalTabla1<?= $x; ?>">Detalle</button>
                    </td>
                </tr>
                <?php $x++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para la Tabla 1 -->
<?php $x = 1; ?>
<?php foreach ($datosTabla1 as $registro): ?>
    <?php if (is_array($registro)): ?>
        <div class="modal fade" id="detalleModalTabla1<?= $x; ?>" tabindex="-1" role="dialog" aria-labelledby="detalleModalLabelTabla1<?= $x; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detalleModalLabelTabla1<?= $x; ?>">Detalles del Registro</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateFormTabla1<?= $x; ?>" method="post" onsubmit="submitFormViaAjaxTabla3(<?= $x; ?>); return false;">
                        <div class="modal-body">
                        <div class="form-group">
                                <label for="id_va">Val</label>
                                <input type="text" class="form-control" name="id_va" value="<?= $registro['id_va']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" name="dni" value="<?= $registro['dni']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="titulo_det">Título</label>
                                <input type="text" class="form-control" name="titulo_det" value="<?= $registro['titulo_det']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="j1">Jurado 1</label>
                                <input type="text" class="form-control" name="j1" value="<?= $registro['j1']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="j2">Jurado 2</label>
                                <input type="text" class="form-control" name="j2" value="<?= $registro['j2']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="j3">Jurado 3</label>
                                <input type="text" class="form-control" name="j3" value="<?= $registro['j3']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <input type="text" class="form-control" name="materia" value="<?= $registro['materia']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar cambios</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $x++; ?>
    <?php endif; ?>
<?php endforeach; ?>


<!-- Otros Títulos -->
<h4>Otros Títulos</h4>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Detalle</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $x = 1; ?>
        <?php foreach ($datosTabla2 as $dato): ?>
            <tr id="fila<?= $x; ?>"> <!-- Añadimos un id único a cada fila -->
                <td><?= $dato['id_otros_t']; ?></td>
                <td class="detalle-otros"><?= $dato['detalle_otros_titulos']; ?></td> <!-- Clase para actualizar el detalle -->
                <td class="fecha-otros"><?= $dato['fecha']; ?></td> <!-- Clase para actualizar la fecha -->
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleModalTabla2<?= $x; ?>">Detalle</button>
                </td>
            </tr>
            <?php $x++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para la Tabla 2 -->
<?php $y = 1; ?>
<?php foreach ($datosTabla2 as $dato): ?>
    <div class="modal fade" id="detalleModalTabla2<?= $y; ?>" tabindex="-1" aria-labelledby="detalleModalLabelTabla2<?= $y; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabelTabla2<?= $y; ?>">Detalles del Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateFormTabla2<?= $y; ?>" method="post" onsubmit="submitFormViaAjaxTabla2(<?= $y; ?>); return false;">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id">Detalle</label>
                            <input type="text" class="form-control" name="id" value="<?= $dato['id_otros_t']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <input type="text" class="form-control" name="detalle" value="<?= $dato['detalle_otros_titulos']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?= $dato['fecha']; ?>">
                        </div>

                        <input type="hidden" name="id_va" value="<?= $dato['id_valoracion']; ?>">
                        <input type="hidden" name="id_otros" value="<?= $dato['id_otros_titulos']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $y++; ?>
<?php endforeach; ?>


<h4>Postgrado</h4>
<!-- Tabla 3 -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Detalle</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $z = 1; ?>
        <?php foreach ($datosTabla3 as $dato): ?>
            <tr id="fila<?= $z; ?>"> <!-- Añadimos un id único a cada fila -->
                <td><?= $dato['id_postgrado']; ?></td>
                <td class="detalle-pos"><?= $dato['detalle_valoracion_postgrado']; ?></td> <!-- Clase para actualizar el detalle -->
                <td class="fecha-pos"><?= $dato['fecha']; ?></td> <!-- Clase para actualizar la fecha -->
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleModalTabla3<?= $z; ?>">Detalle</button>
                </td>
            </tr>
            <?php $z++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para la Tabla 3 -->
<?php $z = 1; ?>
<?php foreach ($datosTabla3 as $dato): ?>
    <div class="modal fade" id="detalleModalTabla3<?= $z; ?>" tabindex="-1" aria-labelledby="detalleModalLabelTabla3<?= $z; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabelTabla3<?= $z; ?>">Detalles del Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateFormTabla3<?= $z; ?>" method="post" onsubmit="submitFormViaAjaxTabla3(<?= $z; ?>); return false;">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id">Detalle</label>
                            <input type="text" class="form-control" name="id" value="<?= $dato['id_postgrado']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <input type="text" class="form-control" name="detalle" value="<?= $dato['detalle_valoracion_postgrado']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?= $dato['fecha']; ?>">
                        </div>

                        <input type="hidden" name="id_va" value="<?= $dato['id_valoracion']; ?>">
                        <input type="hidden" name="id_tit" value="<?= $dato['id_titulo_postgrado']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $y++; ?>
<?php endforeach; ?>





<?php echo $this->endSection() ;?>