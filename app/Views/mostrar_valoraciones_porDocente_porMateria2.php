<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>


<div class="tab-content mt-3" id="myTabContent">
        <!-- Pestaña de Títulos -->
        <div class="tab-pane fade show active" id="titulos" role="tabpanel">
            <form id="form-titulos" action="<?= base_url('mostrar_valoraciones_porDocente_porMateria3') ?>" method="post">
                <!-- Formulario de Títulos -->
                <select name="materia" class="form-control" required>
                    <option disabled selected>Seleccione la materia</option>
                    <?php foreach($materias as $ci): ?>
                    <option value="<?=$ci['id_materia']?>"><?=$ci['nombre_materia']?></option>
                    <?php endforeach; ?>
                </select> 
                <br>

                <select name="dni" class="form-control" required>
                    <option disabled selected>Seleccione un docente</option>
                    <?php foreach($docente as $d): ?>
                    <option value="<?=$d['dni']?>"><?=$d['apellido']?></option>
                    <?php endforeach; ?>
                </select> 
                <br>
                <button type="submit" class="btn btn-primary" id="next-titulos">Buscar</button>
            </form>
        </div>

        <?= $this->endSection() ?>