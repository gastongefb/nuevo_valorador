<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valorador v0.2</title>
  <link rel="icon" href="icono8.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

  

  <style>
        /* Estilo para centrar el texto en las celdas */
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    
    
</head>

<body>

  <?= $this->include('menu') ?>

  <div class="container-xl">
    <div class="car-body">
      <p></p>
      <?php echo $this->renderSection("contenido"); ?>
    </div>

    <?= $this->include('ayuda') ?>
  </div>

  <script src="<?= base_url() ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/bootstrap/js/jquery_v3.7.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#peques img").hover(function() {
        var imagen = $(this).attr("src");
        $("#grande").attr("src", imagen);
      });
    })
  </script>
</body>

</html>