<?php

include("logica/database.php");

if (isset($_FILES['file'])) {

    $file = $_FILES['file'];
    $filename = $file['name'];
    $nimetype = $file['type'];

    $allowed_types = array("image/jpg", "image/jpeg", "image/png");
    if (!in_array($nimetype, $allowed_types)) {
        header("location:index.php");
    }

    //crear directorio uploads
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777);
    }
    //mover archivo a uploads
    move_uploaded_file($file['tmp_name'], 'uploads/'.$filename);

}else {
    header("location:index.php");
}

    $resenias = new Database();
    if(isset($_POST) && !empty($_POST)){
        $idusuario = $resenias->sanitize($_POST['idusuario']);
        $contra = $resenias->sanitize($_POST['contra']);
        $tipousuario = $resenias->sanitize($_POST['tipousuario']);

        $res = $resenias->insertarUsuario($idusuario, $filename, $contra, $tipousuario);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/upload.css">
    <title>Todo salio bien</title>
</head>
<body>
    <?php include("admin.html"); ?>
    <div class="container">
        <h1>registro cargado con exito</h1> <br><br>
        <h2> bienvenido <?php echo $idusuario?></h2>
        <img height="100px" src="uploads/<?= $filename ?> ">
        <br><br><a href="index.php"> iniciar sesión</a>
    </div>
</body>
</html>