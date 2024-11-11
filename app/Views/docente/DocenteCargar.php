
<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>



    <h1>Agregar Docente</h1>

   <form action="<?php echo base_url('Docente') ?>" method="post" autocomplete="off">

   

   <label fro="nombre" class="col-sm-2 form-label">Nombre Docente (*)</label>
   <input type="text" class="form-control" name="nombre" required autofocus>

  <label fro="apellido" class="col-sm-2 form-label">Apellido Docente (*)</label>
   <input type="text" class="form-control" name="apellido" required autofocus>

   <label fro="dni" class="col-sm-2 form-label">DNI (*)</label>
   <input type="text" class="form-control" name="dni" required autofocus>

   <label fro="mail" class="col-sm-2 form-label">Mail (*)</label>
   <input type="text" class="form-control" name="mail" required autofocus>

  <label fro="usuario" class="col-sm-2 form-label">Usuario</label>
   <input type="text" class="form-control" name="usuario" autofocus>
  <label fro="clave" class="col-sm-2 form-label">Contraseña</label>
   <input type="text" class="form-control" name="clave" autofocus>



     <br>


   
     <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<div class="card-body d-flex justify-content-between align-items-center">
          <button type="submit" class="btn btn-secondary">Guardar</button>
						<a href="<?php echo base_url('Docente') ?>"class="btn btn-primary btn-sm">Volver</a>
					</div>
				</div>
			</div>
		</div>
	</div>

   </form>
   <?php echo $this->endSection() ;?>