<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos POO</title>
</head>
<body>

    <h1>Lista de alumnos</h1>
    <?php
    require_once 'Conexion.php';
    require_once 'Alumno.php';
    $conexion = new Conexion();
    if (class_exists('Alumno')) 
        {
            $alumno = new Alumno('A2021006','jose martinez','karla@gmail.com',35,6);
            $alumno->guardar();
            echo $alumno->getNombreCompleto() . ' se ha guardado correctamente con el id: ' . $alumno->getId();
        }
        else
        {
            echo "La clase no se ha cargado correctamente";
        die;
        }

    ?>
</body>
</html>