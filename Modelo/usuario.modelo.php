<?php
    
    require_once 'conexion.php';
    
    class UsuarioModelo{
        static public function mdlMostrarUsuarios($tabla, $columna, $dato){
            if($dato != null){
                $consulta = "SELECT * FROM $tabla WHERE $columna =:id";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->bindParam(":id", $dato, PDO::PARAM_STR);
                $statement->execute();
                return $statement->fetch();
            }else{
                $consulta = "SELECT * FROM $tabla";
                $statement = Conexion::Conectar()->prepare($consulta);                
                $statement->execute();
                return $statement->fetchAll();
            }
            $statement->close();
            $statement = null;
        }
    }
    
?>
