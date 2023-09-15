<?php
include 'config.php'; 

$consulta = mysqli_query($config ,"SELECT  id_registro,nombre,departamento,empleado from formulario order by  id_registro desc limit 1;");
$datos = mysqli_fetch_array($consulta);

$id = $datos["id_registro"];
$nombre = $datos["nombre"];
$empleado = $datos["empleado"];
$departamento = $datos["departamento"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thankyou.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Ticket de Información</title>
    
</head>
<body>
    <div class="content-info">
    
        <p> Estimado cliente
            <?php echo $nombre;?>,
            informamos que su número de caso es:
            <?php echo $id;?> y
            el empleado en cargado de brindar solución es
            <?php echo $empleado;?>
        </p>
    </div>


</html>
