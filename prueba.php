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
    <title>Ticket de Información</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .content-info {
            background-color: #fff;
            border: 2px solid #ccc;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Ancho del ticket */
            margin: 0 auto; /* Centrar en la página */
        }

        .content-info p {
            font-size: 16px;
            margin: 0;
        }

        .content-info p:first-child {
            font-weight: bold;
        }
    </style>
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
