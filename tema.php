<?php

  include_once 'conexion.php';


    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }


    $db = new conexion();
    $sql = $db->connect()->prepare('SELECT * FROM categoria'); 
    $queryCategoria = $sql; 
    $queryCategoria -> execute(); 
    $resultsCategoria = $queryCategoria -> fetchAll(PDO::FETCH_OBJ);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page HTML | AlexCG Design</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- formulario -->
    <link rel="stylesheet" href="css/estilosformulario.css">


    
</head>

<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <a class="navbar-brand" href="#">Lircay Hub</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button><!-- boton nav -->

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="admin.php">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="resultados.php">Resultados</a>
          </li>
      
          <li class="nav-item">
          <a class="nav-link text-white" href="logout.php?cerrar_session=1">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <header class="hero">
        <div class="textos-hero">
            <h1>Temas</h1>
        </div>
    </header>



    <footer id="contacto">
    
    <div class="wrapper">
    <div class="title">
      Ingreso de Nuevo Tema
    </div>

    <form action="insertema.php" method="POST">
      <div class="form">
       <div class="inputfield">
          <label>Titulo</label>
          <input type="text" class="input" name="titulo">
       </div>
       <div class="inputfield">
          <label>Descripción</label>
          <textarea class="textarea" name="descripcion"></textarea>
       </div>  
       <div class="inputfield">
          <label>Categoría</label>
          <div class="custom_select ">
            <select name="categoria">
            <?php
              foreach($resultsCategoria as $categorias){
        
                echo   '<option value="'.$categorias->id.'">'.$categorias->descripcion.'</option>';
}
?>
            </select>
          </div>
       </div>   
       <div class="inputfield">
          <label>Estado</label>
          <div class="custom_select">
            <select name="estado">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
       </div>
        
      <div class="inputfield">
        <input type="submit" value="Guardar" class="btn">
      </div>
    </div>
    </form>
</div>	


    </footer>

    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
        } else {
            nav.classList.remove('bg-dark', 'shadow');
        }
        });
    </script>
</body>

</html>