<?php
    include("database.php");
    $resenias = new Database();
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $idprod = $resenias->sanitize($_GET["id"]);
        $res = $resenias->eliminarResenia($idprod);
        if(res){
            header("Location: ../mostrarReseñas.php?msg=3");
        }else{
            header("Location: ../mostrarReseñas.php?msg=6");
        }
    }
?>