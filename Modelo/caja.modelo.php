<?php
    require_once 'conexion.php';
    
    class CajaModelo{
        public static function cerrarMesa($nro_mesa){
            $consulta = "CALL sp_cerrar_mesa('$nro_mesa')";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch();
            
            $statement->close();
            $statement = null;
        }
    }
?>