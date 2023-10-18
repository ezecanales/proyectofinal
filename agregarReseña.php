<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/agregarReseña.css">

</head>

<body>
    <?php 
        include("admin.html");
        include("logica/database.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Nueva Reseña</h3>
                <br>
                <a href="mostrarReseñas.php">volver</a>
                <br>
               
                <form action="logica/proceso_agregar_reseña.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID del producto</label>
                        <input id="id" name="id" type="text" required="required" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="img">seleccione una imagen:</label>
                        <input id="img" name="img" type="file" class="form-control" required="required">
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
                        <input id="nombre" name="nombre" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="tiempouso">cuanto tiempo lo ha utilizado:</label>
                        <input id="tiempouso" name="tiempouso" type="text" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="marca">marca que lo distribuye:</label>
                        <input id="marca" name="marca" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="lugarcompra">lugar de venta:</label>
                        <input id="lugarcompra" name="lugarcompra" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">¿esta satisfecho?</label>
                        <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>