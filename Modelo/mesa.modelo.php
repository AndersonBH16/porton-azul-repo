<?php
    include_once "conexion.php";
    
    class MesaModelo{
        public function mdlMostrarMesas($tabla){
            $consulta = "SELECT * FROM $tabla";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement -> execute();
            
            return $statement->fetchAll();
            
            $statement -> close();
            $statement = null;
        }
        
        public static function ultimaMesaAgregada($tabla){
            $consulta = "SELECT MAX(id_mesa) FROM $tabla";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
        
        public static function devolverNumeroMesa($tabla){
            $ultimo_nroMesa = MesaModelo::ultimaMesaAgregada($tabla);
            $consulta = "SELECT numero_mesa FROM $tabla WHERE numero_mesa = $ultimo_nroMesa";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
        
        public static function devolverEstadoMesa($tabla){
            $consulta = "SELECT estado FROM $tabla";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
        
        public function agregarMesa($tabla){
            $ultimaMesa = MesaModelo::ultimaMesaAgregada($tabla) + 1;
            $consulta = "INSERT INTO $tabla(numero_mesa) values($ultimaMesa)";
            $statement = Conexion::Conectar()->prepare($consulta);            
            $statement->execute();      
            //$statement -> close();
            //$statement = null;
        }
    }
    
?>
