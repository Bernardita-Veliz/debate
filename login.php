<?php
    include_once 'conexion.php';

    

    // if(isset($_SESSION['rol'])){
    //     switch($_SESSION['rol']){
    //         case 1:
    //             header('location: admin.php');
    //         break;

    //         case 2:
    //         header('location: cliente.php');
    //         break;

    //         default:
    //     }
    // }
    
    if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
        session_start();
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $db = new conexion();
        $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena');
        $query->execute(['usuario' => $usuario, 'contrasena' => $contrasena]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[3];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('location: admin.php');
                break;
    
                case 2:
                header('location: cliente.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }

    }


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- iconos font-awesome -->
    <script src="https://kit.fontawesome.com/9d0ecd6d4d.js" crossorigin="anonymous"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css"> 
    
</head>

<body>

    <div class="container">
        <h1>Acceso</h1>
        <form action="#" method="POST">
            <div class="form__group form__div">
                <span><i class="fa-solid fa-envelope"></i></span>
                <input class="campo" type="text" name="usuario" style="height: 36px; width: 210px;" placeholder="Ingrese su usuario">
            </div>
            <div class="form__group form__div">
                <span><i class="fa-solid fa-lock"></i></span>
                <input class="campo" type="password" name="contrasena" placeholder="Ingrese su contraseña">
            </div>
            <div class="form__group">
                <button type="submit">Acceso</button>
            </div>
            <div class="form__group__enlace">
                <a class="enlace" href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
        <hr>
        
        <div class="form__group">
            <a type="submit" class="nav-link text-white" href="index.php">Volver</a>
            </div>
    </div>


    <script src="js/login.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/popper.min.js"></script>    
            
    <script src="js/sweetalert2.all.min.js"></script> 
    <script src="js/codigo.js"></script> 
</body>

</html>

<?php
function cerrar_sesion(){

if(isset($_GET['cerrar_sesion'])){

    session_destroy();
    unset($_SESSION["id"]);
    unset($_SESSION['usuario']);
    unset($_SESSION['contraseña']);

    header('location: login.php?cerrar_session=1');
}
}

cerrar_sesion();
if (cerrar_sesion()) {
    echo "Sesión destruida correctamente";
}
?>