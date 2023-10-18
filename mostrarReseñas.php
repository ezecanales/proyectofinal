<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de reseñas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mostrarReseñas.css">

</head>
<body>
    <?php include("admin.html"); ?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de reseñas</h2></div>
                </div>

        <br>
        <a href="agregarReseña.php">Agregar reseña</a>
        <br><br>
        <a href="buscador/buscador.php">Buscar registro</a>
        <br><br>

                <?php include("logica/msg.php"); ?>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>tipo de producto</th>
                        <th>Nombre</th>
                        <th>Tiempo de uso</th>
                        <th>marca</th>
                        <th>lugar de compra</th>
			            <th>satisfecho</th>
                        <th>imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                 
                <tbody>    
                <?php
                    include("logica/database.php");
                    $resenias = new Database();
                    $listado = $resenias->mostrarResenias();

                    while($row=mysqli_fetch_object($listado)){
                        $idprod = $row->idprod;
                        $tipoproducto = $row->tipoproducto;
                        $nombreprod = $row->nombreprod;
                        $tiempouso = $row->tiempouso;
                        $marca=$row->marca;
                        $lugarcompra=$row->lugarcompra;
                        $descripcion=$row->descripcion;
                        $img=$row->img;


                ?>
                    <tr>
                        <td><?php echo $idprod; ?></td>
                        <td><?php echo $tipoproducto; ?></td>
                        <td><?php echo $nombreprod; ?></td>
                        <td><?php echo $tiempouso; ?></td>
                        <td><?php echo $marca; ?></td>
                        <td><?php echo $lugarcompra; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td><?php echo "<img height='50px' src='data:image/jpeg;base64,".base64_encode($img)."' />"; ?></td>
                        <td>
                            <a href="modificarReseña.php?id=<?php echo $idprod;?>&mod"><i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="logica/proceso_eliminar.php?id=<?php echo $idprod;?>"><i class="fa fa-trash" style="font-size:24px"></i></a>

                        </td>
                    </tr>
                    <?php

                    }

                ?>
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>