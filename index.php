<?php
 require_once 'Alumno.php';
 $alumnos = Alumno::recuperarTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Alumnos POO</title>
</head>
<body>
    <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Nosotros</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Inventario</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Galeria</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Contacto</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
    </header>
    <section>
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
    $alumno = Alumno::buscarPorId(1);
        if($alumno){
            echo $alumno->getMatricula();
            echo '<br />';
            echo $alumno->getNombreCompleto();
        }else{
            echo 'El alumno no ha sido encontrado';
        }
    ?>
     <ul>
      <?php foreach($alumnos as $item): ?>
      <li> <?php echo $item['Matricula'] . ' - ' . $item['NombreCompleto']; ?> </li>
      <?php endforeach; ?>
      </ul>
    </section>
    <footer>

    </footer>
    
</body>
</html>