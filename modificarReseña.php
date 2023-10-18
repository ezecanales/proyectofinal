<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/modificarReseña.css">

</head>

<body>
    <?php 
        include("admin.html");
        include("logica/database.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>modificar Reseña</h3>
                <br>
                <a href="mostrarReseñas.php">volver</a>
                <br><br>
                <?php
                    $resenias = new Database();
                    if(isset($_GET["id"]) && !empty($_GET["id"])){
                        $idprod = $resenias->sanitize($_GET["id"]);
                        $res = $resenias->buscarResenias($idprod);
                        if($res){
                ?>
               
                <form action="logica/proceso_modificar_reseña.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID del producto</label>
                        <input id="id" name="id" type="text" value="<?php echo $res->idprod; ?>" required="required" readonly="" class="form-control" >
                    </div>

                    <img height="100px" src="data:image/jpeg;base64,<?php echo base64_encode($res->img); ?>" />
                    <div class="form-group">
                        <label for="img">inserte nueva imagen: </label>
                        <input id="img" name="img" type="file">
                    </div>


                    <div class="form-group">
                        <label for="tipoproducto">tipo de producto:</label>
                        <div>
                        <select id="tipoproducto" name="tipoproducto" class="custom-select" required="required">
                            <option>electrodomesticos</option>
                            <option>articulos de limpieza</option>
                            <option>inmobiliario</option>
                            <option>productos de cocina</option>
                            <option>dispositivos electronicos</option>
                            <option>producto de convicción</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del producto:</label>
                        <input id="nombre" name="nombre" type="text" value="<?php echo $res->nombreprod; ?>" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="tiempouso">cuanto tiempo lo ha utilizado:</label>
                        <input id="tiempouso" name="tiempouso" type="text" value="<?php echo $res->tiempouso; ?>" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="marca">marca que lo distribuye:</label>
                        <input id="marca" name="marca" type="text" value="<?php echo $res->marca; ?>" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="lugarcompra">lugar de venta:</label>
                        <input id="lugarcompra" name="lugarcompra" type="text" value="<?php echo $res->lugarcompra; ?>" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">¿esta satisfecho?</label>
                        <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"><?php echo $res->descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </form>

                <?php
                        } else {
                            echo "<div class='alert alert-danger'>reseña no encontrado</div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>