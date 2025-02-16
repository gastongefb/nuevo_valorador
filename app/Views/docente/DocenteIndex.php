<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>


<br>   
<h3 class="text-center">Listado de docentes</h3>

<style>
        /* Estilos para la tabla */
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

<br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th scope="row">Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>

        <?php 
       $i=0;
        foreach ($Docentes as $Docente): 
           // var_dump($Docente);
            //exit;
            $i=$i+1;
        ?>
            <tr>
            <td><?=$i ?>) </td>
            <td><?= $Docente["apellido"] ?></td>
            <td><?=$Docente["nombre"] ?></td>
            <td><?= $Docente["dni"] ?></td>
  
                <td>
                    <a class="btn btn-warning" href="<?= base_url('Docente/') ?><?= $Docente["id"]?>  "> Detalle </a> 
                  
                    <!-- <a href="<?= route_to('Docente.edit', $Docente["id"]) ?>">Editar</a> --> 

                    <form  action="<?= base_url() ?><?= route_to('Docente.destroy', $Docente["id"]) ?>" method="post" style="display: inline-block;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $Docente['id'] ?>">
                        <input type="hidden" name="_method" value="delete">
                        <button  class="btn btn-danger btn-delete" type="submit" id="enviar<?= $Docente['id'] ?>" >Baja</button>  
                    </form>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<br>

<?= $this->endSection() ?>