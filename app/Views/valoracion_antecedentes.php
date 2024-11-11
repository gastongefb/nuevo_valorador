<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valoración de Antecedentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="postgrado-tab" data-toggle="tab" href="#postgrado" role="tab">Títulos de Postgrado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="otros-titulos-tab" data-toggle="tab" href="#otros-titulos" role="tab">Otros Títulos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="capacitacion-tab" data-toggle="tab" href="#capacitacion" role="tab">Capacitación</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="postgrado" role="tabpanel">
                <form id="postgrado-form">
                    <div class="form-group">
                        <label for="detalle_postgrado">Detalle del Postgrado</label>
                        <input type="text" class="form-control" id="detalle_postgrado" name="detalle_postgrado" required>
                    </div>
                    <div class="form-group">
                        <label for="puntaje_postgrado">Puntaje</label>
                        <input type="number" class="form-control" id="puntaje_postgrado" name="puntaje_postgrado" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar y Continuar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="otros-titulos" role="tabpanel">
                <form id="otros-titulos-form">
                    <div class="form-group">
                        <label for="detalle_otros_titulos">Detalle de Otros Títulos</label>
                        <input type="text" class="form-control" id="detalle_otros_titulos" name="detalle_otros_titulos" required>
                    </div>
                    <div class="form-group">
                        <label for="puntaje_otros_titulos">Puntaje</label>
                        <input type="number" class="form-control" id="puntaje_otros_titulos" name="puntaje_otros_titulos" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar y Continuar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="capacitacion" role="tabpanel">
                <form id="capacitacion-form">
                    <div class="form-group">
                        <label for="detalle_capacitacion">Detalle de Capacitación</label>
                        <input type="text" class="form-control" id="detalle_capacitacion" name="detalle_capacitacion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_capacitacion">Fecha de Capacitación</label>
                        <input type="date" class="form-control" id="fecha_capacitacion" name="fecha_capacitacion" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar y Continuar</button>
                </form>
            </div>
        </div>
        <button id="guardar-todo" class="btn btn-success mt-3">Guardar Todos los Datos</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Postgrado
            $('#postgrado-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/guardarPostgrado') ?>',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#otros-titulos-tab').removeClass('disabled');
                            var tab = new bootstrap.Tab(document.querySelector('#otros-titulos-tab'));
                            tab.show(); // Activar la pestaña de Otros Títulos
                        } else {
                            alert('Error al guardar los datos.');
                        }
                    },
                    error: function() {
                        alert('Error de comunicación con el servidor.');
                    }
                });
            });

            // Otros Títulos
            $('#otros-titulos-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/guardarOtrosTitulos') ?>',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#capacitacion-tab').removeClass('disabled');
                            var tab = new bootstrap.Tab(document.querySelector('#capacitacion-tab'));
                            tab.show(); // Activar la pestaña de Capacitación
                        } else {
                            alert('Error al guardar los datos.');
                        }
                    },
                    error: function() {
                        alert('Error de comunicación con el servidor.');
                    }
                });
            });

            // Capacitación
            $('#capacitacion-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/guardarCapacitacion') ?>',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            alert('Datos de Capacitación guardados.'); // Muestra un mensaje de éxito
                        } else {
                            alert('Error al guardar los datos.');
                        }
                    },
                    error: function() {
                        alert('Error de comunicación con el servidor.');
                    }
                });
            });

            // Guardar todo
            $('#guardar-todo').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/guardarTodo') ?>',
                    success: function(response) {
                        if (response.success) {
                            alert('Todos los datos guardados correctamente.');
                        } else {
                            alert('Error al guardar todos los datos.');
                        }
                    },
                    error: function() {
                        alert('Error de comunicación con el servidor.');
                    }
                });
            });
        });
    </script>
</body>
</html>
