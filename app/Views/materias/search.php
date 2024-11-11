<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

 
    <form action="<?php echo base_url('search') ?>" method="get">
        <label for="search">Buscar Materia:</label>
        <input type="text" name="search" id="search">
        <button type="submit">Buscar</button>
    </form>

    
<?php echo $this->endSection() ;?>