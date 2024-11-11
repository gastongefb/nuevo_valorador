<?php echo $this->extend('layaout'); ?>
<?php echo $this->section('contenido'); ?>

<h1>Listado Docentes</h1>

<div class="card-body d-flex justify-content-between align-items-center">
						 
                        

					</div>

                    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<div class="card-body d-flex justify-content-between align-items-center">
						Si no se encuentra el docente ->
						<a class="btn btn-primary btn-sm" href="<?= base_url('/Docente/create') ?>">AGREGAR DOCENTE</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<br><br>
<table>
    <thead>
        <tr>
        <th></th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th></th>
            
<!-- DEBUG-VI 
            <th>Email</th>
            <th>Estado</th>
            <th>Usuario</th>
            -->
            <th>Acciones</th>
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
                <td> </td>
                
<!-- DEBUG-V 
                <td><?= $Docente["mail"] ?></td>
                <td><?= $Docente["estado"] ?></td>
                <td><?= $Docente["usuario"] ?></td>
                -->
                <td>
                    <a href="<?= base_url('Docente/') ?><?= $Docente["id"]?>  "> Detalle </a> 
                  
                    <!-- <a href="<?= route_to('Docente.edit', $Docente["id"]) ?>">Editar</a> --> 

                    <form  action="<?= base_url() ?><?= route_to('Docente.destroy', $Docente["id"]) ?>" method="post" style="display: inline-block;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $Docente['id'] ?>">
                        <input type="hidden" name="_method" value="delete">
                        <button   type="submit" id="enviar<?= $Docente['id'] ?>" >Baja</button>  
                    </form>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<br>

<?php echo $this->endSection() ;?>