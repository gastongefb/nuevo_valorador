<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>Vista validación</h1>
    <?php 
     
     foreach($testos as $t):

        echo $t->dni;


     endforeach
    
    ?>

<?php 
     
     foreach($testos2 as $t2):
        

        echo $t2->nombre_materia;
        

     endforeach
    
    ?>

<form method="POST" action="<?php echo base_url();?>busca2">
    <label> Dni:</label>
    <input type="text" name="dni">
    <button type="submit">Enviar</button>
    </form>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>