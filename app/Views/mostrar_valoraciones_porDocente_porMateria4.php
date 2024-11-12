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
    function submitFormViaAjaxTabla2(x) {
        var formData = $('#updateFormTabla2' + x).serialize();  // Serializa el formulario correspondiente
        $.ajax({
            url: '<?= base_url('actualizarOtrosTitulos'); ?>',  // Ruta para actualizar el registro
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Registro actualizado correctamente.');
                $('#detalleModalTabla2' + x).modal('hide'); // Cierra el modal después de actualizar
                // Si deseas recargar la tabla o solo la fila específica, usa algo como esto:
                // window.location.reload(); // Recarga la página, o puedes actualizar la tabla sin recargar la página
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateFormTabla1<?= $x; ?>" method="post" onsubmit="submitFormViaAjax(<?= $x; ?>); return false;">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
            <th scope="col">Puntaje</th>
            <th scope="col">Detalle</th>
        </tr>
    </thead>
    <tbody>
        <?php $x = 1; ?>
        <?php foreach ($datosTabla2 as $dato): ?>
            <tr>
                <th scope="row"><?php echo $x; ?></th>
                <td><?= $dato['detalle']; ?></td>
                <td><?= $dato['fecha']; ?></td>
                <td><?= $dato['puntaje']; ?></td>
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleModalTabla2<?= $x; ?>">Detalle</button>
                </td>
            </tr>
            <?php $x++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para la Tabla 2 -->
<?php $x = 1; ?>
<?php foreach ($datosTabla2 as $dato): ?>
    <div class="modal fade" id="detalleModalTabla2<?= $x; ?>" tabindex="-1" aria-labelledby="detalleModalLabelTabla2<?= $x; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabelTabla2<?= $x; ?>">Detalles del Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateFormTabla2<?= $x; ?>" method="post" onsubmit="submitFormViaAjaxTabla2(<?= $x; ?>); return false;">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <input type="text" class="form-control" name="detalle" value="<?= $dato['detalle']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?= $dato['fecha']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="puntaje">Puntaje</label>
                            <input type="number" class="form-control" name="puntaje" value="<?= $dato['puntaje']; ?>">
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
<?php endforeach; ?>







<?php echo $this->endSection() ;?>