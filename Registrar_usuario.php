<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>


    <link rel="stylesheet" href="css/Registro.css">
</head>
<body>
    
    <h1>ingrese los datos que se le solicitan a continuación</h1>

            <form class="datos" action="upload.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="idusuario">nombre de usuario</label>
                    <input id="idusuario" name="idusuario" type="text" required="required" class="form-control">
                </div>

                <label class="btn" for="custom-file-input">seleccione una imagen:</label>
                <input id="custom-file-input" name="file" type="file" class="form-control" required="required">

                <div class="form-group">
                    <label for="contra">Contraseña</label>
                    <input id="contra" name="contra" type="password" class="form-control" required="required">
                </div>

                <div class="form-group">
                    <label for="tipousuario">tipo de usuario:</label>
                    <div>
                        <select id="tipousuario" name="tipousuario" class="custom-select" required="required">
                            <option>Administrador</option>
                            <option>Usuario</option>
                        </select>
                    </div>
                </div>

                <input type="submit" class="btn" name="upload" value="upload">
            </form>
</body>
</html>