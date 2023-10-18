<?php
    include("database.php");
    $resenias = new Database();
    if(isset($_POST) && !empty($_POST)){
        $idprod = $resenias->sanitize($_POST['id']);
        $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $tipoproducto = $resenias->sanitize($_POST['tipoproducto']);
        $nombreprod = $resenias->sanitize($_POST['nombre']);
        $tiempouso = $resenias->sanitize($_POST['tiempouso']);
        $marca = $resenias->sanitize($_POST['marca']);
        $lugarcompra = $resenias->sanitize($_POST['lugarcompra']);
        $descripcion = $resenias->sanitize($_POST['descripcion']);

        $res = $resenias->actualizarReseña($idprod, $img, $tipoproducto, $nombreprod, $tiempouso, $marca, $lugarcompra, $descripcion);
        if($res){
            header("Location: ../mostrarReseñas.php?msg=2");
        }else{
            header("Location: ../mostrarReseñas.php?msg=5");
        }
    }
?>