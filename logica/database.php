<?php
    class Database{
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "proyecto_resenias";

        public function conectar(){
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if(mysqli_connect_error()){
                die("Conexion a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
            }
        }

        public function sanitize($var){
            $this->conectar();
            $varlimpia = mysqli_real_escape_string($this->con, $var);
            mysqli_close($this->con);
            return $varlimpia;
        }

        public function insertarResenia($idprod, $img, $tipoproducto, $nombreprod, $tiempouso, $marca, $lugarcompra, $descripcion){
            $this->conectar();
            $sql = "INSERT INTO `reseñas` (`idprod`,`img`, `tipoproducto`, `nombreprod`, `tiempouso`, `marca`, `lugarcompra`, `descripcion`) 
            VALUES ('$idprod', '$img', '$tipoproducto', '$nombreprod', '$tiempouso', '$marca', '$lugarcompra', '$descripcion')";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
            
        }

        public function insertarUsuario($idusuario, $filename, $contra, $tipousuario){
            $this->conectar();
            $sql = "INSERT INTO `usuario` (`idusuario`, `filename`, `contra`, `tipousuario`) 
            VALUES ('$idusuario', '$filename', '$contra', '$tipousuario')";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
            
        }

        public function actualizarReseña($idprod, $img, $tipoproducto, $nombreprod, $tiempouso, $marca, $lugarcompra, $descripcion){
            $this->conectar();
            $sql = "UPDATE `reseñas` SET `img` = '$img', `tipoproducto` = '$tipoproducto', `nombreprod` = '$nombreprod', `tiempouso` = '$tiempouso', `marca` = '$marca', `lugarcompra` = '$lugarcompra', `descripcion` = '$descripcion' WHERE `reseñas`.`idprod` = '$idprod';";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarResenia($idprod){
            $this->conectar();
            $sql = "DELETE FROM `reseñas` WHERE `reseñas`.`idprod` = '$idprod'";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function mostrarResenias(){
            $this->conectar();
            $sql = "SELECT * FROM reseñas";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            return $res;
        }

        public function validarUsuario($idusuario, $contra){
            $this->conectar();
            $sql = "SELECT * FROM usuario WHERE idusuario='$idusuario' AND contra = '$contra'";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            return $res;
        }

        public function buscarResenias($idprod){
            $this->conectar();
            $sql = "SELECT * FROM reseñas WHERE idprod = '$idprod'";
            $res = mysqli_query($this->con, $sql);
            $res2 = mysqli_fetch_object($res);
            mysqli_close($this->con);
            return $res2;
        }
    }
?>