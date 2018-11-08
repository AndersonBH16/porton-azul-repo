<?php
    require_once "conexion.php";
    
    class GestionUsuarioModelo{
        
        public static function mdlMostrarGestionUsuarios($tabla, $columna, $dato){
            if($columna==null){
                $consulta = "SELECT * FROM $tabla ORDER BY id_user_system ASC";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->execute();
                return $statement->fetchAll();
            }else{                      
                $statement = Conexion::Conectar()->prepare("SELECT * FROM user_system WHERE $columna = :id");
                $statement -> bindParam(":id",$dato,PDO::PARAM_STR);
                $statement->execute();
                return $statement->fetch();
            }
            $statement->close();
            $statement = null;
        }        
        
        public static function mdlCrearUsuarioSistema($tabla, $dato1, $dato2, $dato3, $dato4){   
            $consulta = "INSERT INTO $tabla (user, password, persona, rol) VALUES ('$dato1', '$dato2', '$dato3', '$dato4')";
            $statement = Conexion::Conectar()->prepare($consulta);
            
            if($statement->execute()){
                return "ok";
            }else{
                return "error";
            }            
            
            $statement->close();
            $statement = null;
        }
        
        public static function mdlActivarUsuarioSistema($tabla, $columna, $nuevoEstado, $id_usuario){            
            $consulta = "UPDATE $tabla set $columna = '$nuevoEstado' where id_user_system ='$id_usuario'";
            $statement = Conexion::Conectar()->prepare($consulta);
            if($statement->execute()){
                return "ok";
            }else{
                return "error";
            }
        }
    }
    
?>