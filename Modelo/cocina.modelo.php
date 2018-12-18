<?php
    require_once 'conexion.php';
    
    class CocinaModelo{
        public static function mdlMostrarCocina(){
            $consulta = "SELECT id_pedido_producto,id_personal,nombre_personal,id_personal_perfil,estado,detalle,numero_mesa, cantidad, nombre_producto, descripcion_producto FROM PERSONAL
                        JOIN PERSONAL_PERFIL
                        ON personal.id_personal = personal_perfil.PERSONAL_id_personal
                        JOIN PERFIL
                        ON perfil.id_perfil = personal_perfil.PERFIL_id_perfil
                        JOIN PEDIDO
                        ON PEDIDO.PERSONAL_PERFIL_id_personal_perfil = personal_perfil.id_personal_perfil
                        JOIN MESA
                        ON MESA.id_mesa = PEDIDO.MESA_id_mesa
                        JOIN  PEDIDO_PRODUCTO
                        ON PEDIDO_PRODUCTO.PEDIDO_id_pedido = PEDIDO.id_pedido
                        JOIN PRODUCTO
                        ON PRODUCTO.id_producto = PEDIDO_PRODUCTO.PRODUCTO_id_producto
                        JOIN CATEGORIA_PRODUCTO
                        ON CATEGORIA_PRODUCTO.id_categoria_producto = PRODUCTO.CATEGORIA_PRODUCTO_id_categoria_producto
                        WHERE estado = 'EN ESPERA' AND estado_pedido_producto = 1
                        ORDER BY id_personal;";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetchAll();
            
            $statement->close();
            $statement = null;
        }
        
        public static function mdlAtenderPedido($numPedido){
            $consulta = "CALL sp_atenderPedido('$numPedido')";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
            
            $statement->close();
            $statement = null;
        }
    }
?>