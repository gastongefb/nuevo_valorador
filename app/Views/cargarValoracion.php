<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>
<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
-->
<h1>Nueva Valoración</h1>

<form action="<?php echo base_url('cargarValoracion2') ?>" method="post" autocomplete="off">



    <select name="id_materia" class="form-control" autofocus>
        <option disabled selected>Seleccione la materia</option>
        <?php foreach ($materias as $ci) : ?>
            <option value="<?= $ci['id_materia'] ?>"><?= $ci['nombre_materia'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <select name="id_titulo" class="form-control" autofocus>
        <option disabled selected>Seleccione un título</option>
        <?php foreach ($titulos as $c) : ?>
            <option value="<?= $c['id_titulo'] ?>"><?= $c['detalle_titulo'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <select name="id_condicion" class="form-control" autofocus>
        <option disabled selected>Selecciones una condición</option>
        <?php foreach ($condicion as $co) : ?>
            <option value="<?= $co['id_condicion'] ?>"><?= $co['detalle_condicion'] ?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <label for="vehicle1">DNI</label><br>
    <input type="text" name="dni" id="dni" placeholder="Ingrese número de documento" required size="40"><br>
    <br>
    <label for="vehicle1">JURADO 1</label><br>
    <input type="text" name="j1" id="j1" placeholder="Ingrese DNI del jurado Nº1" required size="40"><br>
    <br>
    <label for="vehicle1">JURADO 2</label><br>
    <input type="text" name="j2" id="j2" placeholder="Ingrese DNI del jurado Nº2" required size="40"><br>
    <br>
    <label for="vehicle1">JURADO 3</label><br>
    <input type="text" name="j3" id="j3" placeholder="Ingrese DNI del jurado Nº3" required size="40"><br>

    <br>
    <h1>Agregar Titulo de Postgrado</h1>
    <div id="personContainer">
        <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->
        <div id="personContainer">
            <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->

            <div class="person">
                <h3>Título 1</h3>
                <!-- Nuevo campo de selección -->
                <label for="opciones1">Seleccione opción:</label>
                <select class="form-select" aria-label="Default select example" name="persons[1][opciones]" id="opciones1">
                    <option value="opcion1">Dcotorado</option>
                    <option value="opcion2">Maestría</option>
                    <option value="opcion3">Especialización</option>
                    <option value="opcion4">Diplomatura</option>
                </select><br><br>
                <label for="detalle1">Detalle:</label><br>
                <!--<input type="text" name="persons[1][detalle_valoracion_postgrado]" id="detalle_valoracion_postgrado1" placeholder="Ingrese detalle" required size="40">-->
                <div class="form-floating">
                    <textarea name="persons[1][detalle_valoracion_postgrado]" id="detalle_valoracion_postgrado1" class="form-control" ></textarea>
                    
                </div>
                <br>
                <br>
                <label for="fecha1">Fecha:</label><br>
                <input type="date" name="persons[1][fecha]" id="fecha1"><br>
                <br>
                <button type="button" class="btn btn-primary" class="removePerson">Eliminar Título</button>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="addPerson">Agregar Título</button>


        <script>
            $(document).ready(function() {
                var maxPersons = 50; // Cambia este valor según tus necesidades

                $('#addPerson').click(function() {
                    if ($('.person').length < maxPersons) {
                        var personCount = $('.person').length + 1;
                        var html = `
                    <div class="person">
                        <h3>Titulo ${personCount}</h3>
                        <!-- Nuevo campo de selección -->
                        <label for="opciones${personCount}">Seleccione opción:</label>
                        <select name="persons[${personCount}][opciones]" id="opciones${personCount}">
                          <option value="1">Doctorado</option>
                          <option value="2">Maestría</option>
                          <option value="3">Especialización</option>
                          <option value="4">Diplomatura</option>
                        </select><br><br>
                        <label for="detalle${personCount}">Detalle:</label>
                        <input type="text" name="persons[${personCount}][detalle_valoracion_postgrado]" id="detalle_valoracion_postgrado${personCount}">
                        <br>
                        <br>
                        <label for="fecha${personCount}">Fecha:</label>
                        <input type="text" name="persons[${personCount}][fecha]" id="fecha${personCount}"><br>
                        <br>                        
                        <button type="button" class="removePerson">Eliminar Título</button>
                    </div>
                `;
                        $('#personContainer').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo de personas.');
                    }
                });

                $(document).on('click', '.removePerson', function() {
                    $(this).closest('.person').remove();
                });
            });
        </script>

    </div>

    <br>
    <h1>Agregar Capacitación</h1>
    <div id="capContainer">
        <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->
        <div id="capContainer">
            <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->

            <div class="cap">
                <h3>Capacitación 1</h3>
                <!-- Nuevo campo de selección -->
                <label for="opciones1">Seleccione opción:</label>
                <select class="form-select" aria-label="Default select example" name="cap[1][opciones]" id="opciones1">
                    <option value="opcion1">con evaluación, con un mínimo de 30 hs.</option>
                    <option value="opcion2">con evaluación, con menos de 30 hs.</option>
                    <option value="opcion3">con evaluación, donde se detallan días y no horas.</option>
                    <option value="opcion4">sin evaluación, con un mínimo de 30 hs.</option>
                    <option value="opcion4">sin evaluación, con menos o sin especificar las horas</option>
                    <option value="opcion4">sin evaluación, donde se detallan días y no horas</option>
                </select><br><br>
                <label for="detalle1">Detalle:</label><br>
                <!--<input type="text" name="cap[1][detalle_capacitacion]" id="detalle_capacitacion1" placeholder="Ingrese detalle" required size="40">-->
                <div class="form-floating">
                    <textarea name="cap[1][detalle_capacitacion]" id="detalle_capacitacion1" class="form-control" ></textarea>
                    
                </div>
                <br>
                <br>
                <label for="fecha1">Fecha:</label><br>
                <input type="date" name="cap[1][fecha]" id="fecha1">
                <br>
                <br>
                <label for="cantidad1">Cantidad:</label><br>
                <input type="text" name="cap[1][cantidad]" id="cantidad1" placeholder="Ingrese cantidad" size="15"><br>
                <br>
                <button type="button" class="btn btn-primary" class="removeCap">Eliminar Capacitación</button>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="addCap">Agregar Capacitación</button>



        <script>
            $(document).ready(function() {
                var maxCapacidad = 50; // Cambia este valor según tus necesidades

                $('#addCap').click(function() {
                    if ($('.cap').length < maxCapacidad) {
                        var capCount = $('.cap').length + 1;
                        var html = `
                    <div class="cap">
                        <h3>Capacitación ${capCount}</h3>
                        <!-- Nuevo campo de selección -->
                        <label for="opciones${capCount}">Seleccione opción:</label>
                        <select name="caps[${capCount}][opciones]" id="opciones${capCount}">
                          <option value="1">con evaluación, con un mínimo de 30 hs.</option>
                          <option value="2">con evaluación, con menos de 30 hs.</option>
                          <option value="3">con evaluación, donde se detallan días y no horas.</option>
                          <option value="4">sin evaluación, con un mínimo de 30 hs.</option>
                          <option value="5">sin evaluación, con menos o sin especificar las horas</option>
                          <option value="6">sin evaluación, donde se detallan días y no horas</option>
                        </select><br><br>
                        <label for="detalle${capCount}">Detalle:</label>
                        <input type="text" name="caps[${capCount}][detalle_capacitacion]" id="detalle_capacitacion${capCount}">
                        <br>
                        <br>
                        <label for="fecha${capCount}">Fecha:</label>
                        <input type="text" name="caps[${capCount}][fecha]" id="fecha${capCount}">
                        <br> 
                        <br> 
                        <label for="cantidad${capCount}">Cantidad:</label>
                        <input type="text" name="caps[${capCount}][cantidad]" id="cantidad${capCount}"><br>
                        <br>                       
                        <button type="button" class="removeCap">Eliminar Capacitación</button>
                    </div>
                `;
                        $('#capContainer').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo de personas.');
                    }
                });

                $(document).on('click', '.removeCap', function() {
                    $(this).closest('.cap').remove();
                });
            });
        </script>

    </div>
    <br><br>

    <br>
    <h1>Agregar Antecedentes Docentes</h1>
    <div id="docContainer">
        <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->
        <div id="docContainer">
            <!-- Aquí se agregarán y eliminarán los campos de persona dinámicamente -->

            <div class="doc">
                <h3>Antecedentes 1</h3>
                <!-- Nuevo campo de selección -->
                <label for="opciones1">Seleccione opción:</label>
                <select class="form-select" aria-label="Default select example" name="doc[1][opciones]" id="opciones1">
                    <option value="opcion1">Antiguedad en el espacio curricular o equivalente en el nivel Superior Técnico.</option>
                    <option value="opcion2">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                    <option value="opcion3">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                </select><br><br>
                <label for="detalle1">Detalle:</label>
                <!--<input type="text" name="docs[1][detalle_ant_doc]" id="detalle_ant_doc1">-->
                <div class="form-floating">
                    <textarea name="docs[1][detalle_ant_doc]" id="detalle_ant_doc1" class="form-control"></textarea>
                    
                </div>
                <br>
                <br>
                <label for="fecha1">Fecha:</label>
                <input type="date" name="docs[1][fecha]" id="fecha1"><br>
                <br>
                <button class="btn btn-primary" type="button" class="removeDoc">Eliminar Antecedente</button>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="button" id="addDoc">Agregar Antecedentes Docentes</button>
        <br>

        <script>
            $(document).ready(function() {
                var maxPersons3 = 50; // Cambia este valor según tus necesidades

                $('#addDoc').click(function() {
                    if ($('.doc').length < maxPersons3) {
                        var docCount = $('.doc').length + 1;
                        var html = `
                    <div class="doc">
                        <h3>Titulo ${docCount}</h3>
                        <!-- Nuevo campo de selección -->
                        <label for="opciones${docCount}">Seleccione opción:</label>
                        <select name="docs[${docCount}][opciones]" id="opciones${docCount}">
                          <option value="1">Antiguedad en el espacio curricular o equivalente en el nivel Superior Técnico.</option>
                          <option value="2">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                          <option value="3">Antiguedad en otros espacios curriculares del nivel Superior Técnico.</option>
                        </select><br><br>
                        <label for="detalle${docCount}">Detalle:</label>
                        <input type="text" name="docs[${docCount}][detalle_ant_doc]" id="detalle_ant_doc${docCount}">
                        <br>
                        <br>
                        <label for="fecha${docCount}">Fecha:</label>
                        <input type="text" name="docs[${docCount}][fecha]" id="fecha${docCount}"><br>
                        <br>                        
                        <button type="button" class="removeDoc">Eliminar Título</button>
                    </div>
                `;
                        $('#docContainer').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo de personas.');
                    }
                });

                $(document).on('click', '.removeDoc', function() {
                    $(this).closest('.person').remove();
                });
            });
        </script>

    </div>

    <br>        
    <button type="submit" class="btn btn-secondary">Guardar</button>
    <br>
</form>



<?php echo $this->endSection(); ?>