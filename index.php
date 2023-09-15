<?php include 'config.php'; 
session_start();
    $atencionCliente = ['Juan Perez', 'Sofia Alvarez', 'Felipe Ribon ', 'Jorge Rodriguez'];
    $soporteTecnico = ['Ana Martínez', 'Carlos López', 'Luisa García', 'Pedro Ramírez'];
    $facturacion = ['Laura González', 'Andrés Sánchez', 'María Rodríguez', 'Raúl Fernández'];

    if(ISSET($_POST['btnSiguiente'])){

        
        
        $nombre = mysqli_real_escape_string($config, $_POST["nombre"]);
        $correo = mysqli_real_escape_string($config, $_POST["correo"]);
        $departamento = mysqli_real_escape_string($config, $_POST["departamento"]);
        $mensaje = mysqli_real_escape_string($config, $_POST["mensaje"]);
        $empleadoSeleccionado = mysqli_real_escape_string($config, $_POST["empleado"]);

      
        if (empty($nombre) || empty($correo) || empty($departamento) || empty($mensaje)) {
        echo "<script>
            alert('Por favor, completa todos los campos.');
        </script>";

        
     } else {
        if ($config->connect_error) {
            die("La conexión ha fallado: " . $config->connect_error);
        }
        switch ($departamento) {
            case 'atencioncliente':
                $empleadoSeleccionado = $atencionCliente[array_rand($atencionCliente)];
                break;
            case 'soportetecnico':
                $empleadoSeleccionado = $soporteTecnico[array_rand($soporteTecnico)];
                break;
            case 'facturacion':
                $empleadoSeleccionado = $facturacion[array_rand($facturacion)];
                break;
         }
           $sql = "INSERT INTO formulario (nombre, correo, departamento, mensaje, empleado) VALUES ('$nombre', '$correo', '$departamento', '$mensaje','$empleadoSeleccionado')";

           if (mysqli_query($config, $sql)) {

            $empleadoSeleccionado = '';

              echo "<script>

                window.location.href = 'thankyou.php';

            </script>";
           } else {
              echo "Error: " . $sql . "" . mysqli_error($config);
           }
           $config->close();
       
     }
}
      


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Servify</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body>

    <div class="containerRegister">

        <div class="formContainer">
            <div class="titleRegister">
                <h2>REGISTRO</h2>
            </div>
            <div class="form-1">
                <form method="POST" action="">
                    <!-- inicio form-->
                    <div class="form-registro">
                        <p>Nombre</p>
                        <input type="text" name="nombre" id="nombre" class="inpForm" />



                        <p>Correo electrónico</p>
                        <input type="email" name="correo" id="correo" class="inpForm" />

                        <p>Departamento</p>
                        <select name="departamento" id="dep" class="inpForm">
                            <option value="atencioncliente">Atencion Cliente</option>
                            <option value="soportetecnico">Soporte Tecnico</option>
                            <option value="facturacion">Facturacion</option>
                        </select>

                        <p>Mensaje</p>
                        <input type="text" name="mensaje" id="mensaje" class="inpFormMessage" />

                        <input type="hidden" name="empleado"
                            value="<?php echo htmlspecialchars($empleadoSeleccionado); ?>">



                        <div>
                            <button id="btnSiguiente" name="btnSiguiente" type="submit" class="btnNext"
                                onclick="clickForm()">
                                Finalizar</button>
                        </div>


                </form><!-- cierre form-->
            </div>

        </div>

    </div>
</body>

</html>