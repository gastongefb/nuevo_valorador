<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

 
    <form action="<?php echo base_url('search') ?>" method="get">
        <label for="search">Buscar Materia:</label>
        <input type="text" name="search" id="search">
        <button type="submit">Buscar</button>
    </form>

    
    <?= $this->endSection() ?>