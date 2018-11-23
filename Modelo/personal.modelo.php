<?php
    include_once 'conexion.php';
    
    class PersonalModelo{
        /*
        *
        * return @PersonalModelo
         */
        public static function mdlMostrarPersonal(){
            $consulta = "SELECT * FROM PERSONAL";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            
            return $statement->fetchAll();
            
            $statement->close();
            $statement = null;
        }
        
        public static function mdlUltimoPersonal(){
            $consulta = "SELECT MAX(id_personal) FROM PERSONAL";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
        
//        public static function devolverNumeroMesa($tabla){
//            $ultimo_nroMesa = MesaModelo::ultimaMesaAgregada($tabla);
//            $consulta = "SELECT numero_mesa FROM $tabla WHERE numero_mesa = $ultimo_nroMesa";
//            $statement = Conexion::Conectar()->prepare($consulta);
//            $statement->execute();
//            return $statement->fetch()[0];
//        }

        public static function mdlMostrarPersonalPerfil(){
            
           $consulta = "SELECT * FROM personal_perfil 
                     JOIN perfil 
                     ON personal_perfil.PERFIL_id_perfiL = perfil.id_perfil
                     JOIN personal
                     ON personal_perfil.personal_id_personal = personal.id_personal
                     JOIN area
                     ON personal_perfil.area_id_area = area.id_area
                     ORDER BY id_personal asc;";

            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();

            return $statement->fetchAll(); 
            
                
            $statement->close();
            $statement = null;
        }
        
        
        public function mdlMostrarPersonalPerfilEditar($id){                
            $consulta = "SELECT * FROM personal_perfil 
                        JOIN perfil 
                        ON personal_perfil.PERFIL_id_perfiL = perfil.id_perfil
                        JOIN personal
                        ON personal_perfil.personal_id_personal = personal.id_personal
                        JOIN area
                        ON personal_perfil.area_id_area = area.id_area
                        WHERE id_personal = '$id'";

            $statement = Conexion::Conectar()->prepare($consulta);                    
            $statement->execute();

            return $statement->fetch();                
           
            $statement->close();
            $statement = null;
        }
        
        
        
        
        
        
        
        
        public static function mdlCrearPersonal($dni,$nombre,$telefono,$direccion){
            $consulta = "INSERT INTO PERSONAL (id_personal, dni_personal,nombre_personal, telefono, foto, direccion, fecha_creacion, fecha_modificacion) VALUES (null,'$dni','$nombre','$telefono',null,'$direccion',null,null)";
            $statement = Conexion::Conectar()->prepare($consulta);
            if($statement->execute()){
                return "ok";
            }else{
                return "error";
            }
            $statement->close();
            $statement = null;
        }
        
        public static function mdlCrearPersonalPerfil($id_personal, $id_perfil, $id_area){
            $consulta = "INSERT INTO PERSONAL_PERFIL (id_personal_perfil, turno_entrada, turno_salida, PERSONAL_id_personal, PERFIL_id_perfil, AREA_id_area) VALUES (null, null, null, '$id_personal', '$id_perfil', '$id_area')";
            $statement = Conexion::Conectar()->prepare($consulta);
            if($statement->execute()){
                return "ok";
            }else{
                return "error";
            }
            $statement->close();
            $statement = null;
        }
        
        /*PERFILES Y CARGOS DEL PERSONAL*/
        public static function mdlMostrarCargos(){
            $consulta = "SELECT * FROM PERFIL";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            
            return $statement->fetchAll();
            
            $statement->close();
            $statement = null;
        }
        
        public static function mdlMostrarArea(){
            $consulta = "SELECT * FROM AREA";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            
            return $statement->fetchAll();
            
            $statement->close();
            $statement = null;
        }
    }
?>
