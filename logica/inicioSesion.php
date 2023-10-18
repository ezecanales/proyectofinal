<?php

    session_start();
    include("database.php");
    $resenias = new Database();

    if (isset($_POST['idusuario']) && isset($_POST['contra'])) {
        
        /*function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }*/

        $idusuario = $resenias->sanitize($_POST['idusuario']);
        $contra = $resenias->sanitize($_POST['contra']);

        if (empty($idusuario)) {
            header("location: ../inicio_sesion.php?error=El usuario es requerido");
            exit();
        }elseif (empty($contra)) {
            header("location: ../inicio_sesion.php?error=La contraseña es requerido");
            exit();
        }else {
            
            $res = $resenias->validarUsuario($idusuario, $contra);
            
            if (mysqli_num_rows($res) === 1) {
                $row = mysqli_fetch_assoc($res);
                if ($row['idusuario'] === $idusuario && $row['contra'] === $contra) {
                    $_SESSION['idusuario'] = $row['idusuario'];
                    $_SESSION['tipousuario'] = $row['tipousuario'];
                    header('location: ../principal.php');
                    exit();
                }else {
                    header('location: ../inicio_sesion.php?error=El usuario o la contraseña no son validos');
                    exit();
                }

            }else {
                header('location: ../inicio_sesion.php?error=El usuario o la contraseña no son validos');
                exit();
            }

        }

    }else {
        header('location: ../inicio_sesion.php');
        exit();
    }

?>