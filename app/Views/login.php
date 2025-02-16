
<?= $this->extend('layout/layout2') ?>

<?= $this->section('content') ?>

   <div class="container">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <h1>Inicio de sesión Sistema Valorador</h1>
            <form action="<?php echo base_url('/login')?>" method="POST">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class= "form-control"  require="">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contrasena" class="form-control"   required="">
                <br>
                <button class="btn btn-primary">Entrar</button>
                
                
        </form>
        </div>
        <div class="col-sm-4"></div>
     </div>
   </div>
  
   <?= $this->endSection() ?>