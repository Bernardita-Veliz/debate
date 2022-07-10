<?php
    include("conexion.php");
    $db = new conexion();

    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];
    $categoria=$_POST['categoria'];
    $estado=$_POST['estado'];
 

    $sql="INSERT INTO tema (titulo,descripcion,categoria,estado) VALUES (:titulo,:descripcion,:categoria,:estado)";
    $sql = $db->connect()->prepare($sql);
    $sql->bindParam(':titulo',$titulo,PDO::PARAM_STR, 25);
    $sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR, 25);
    $sql->bindParam(':categoria',$categoria,PDO::PARAM_STR, 25);
    $sql->bindParam(':estado',$estado,PDO::PARAM_STR, 25);
    $sql -> execute();

    if($sql){
         header("Location: tema.php");
    }else{
        echo ("");
    }

?>
