<?php
    require_once 'conexion.php';
    
    class CocinaModelo{
        public static function mdlMostrarCocina(){
            $consulta = "SELECT id_pedido_producto,id_personal,nombre_personal,id_personal_perfil,estado,detalle,numero_mesa, cantidad, nombre_producto, descripcion_producto FROM personal
                        JOIN personal_perfil
                        ON personal.id_personal = personal_perfil.PERSONAL_id_personal
                        JOIN perfil
                        ON perfil.id_perfil = personal_perfil.PERFIL_id_perfil
                        JOIN pedido
                        ON pedido.PERSONAL_PERFIL_id_personal_perfil = personal_perfil.id_personal_perfil
                        JOIN mesa
                        ON mesa.id_mesa = pedido.MESA_id_mesa
                        JOIN pedido_producto
                        ON pedido_producto.PEDIDO_id_pedido = pedido.id_pedido
                        JOIN producto
                        ON producto.id_producto = pedido_producto.PRODUCTO_id_producto
                        JOIN categoria_producto
                        ON categoria_producto.id_categoria_producto = producto.CATEGORIA_PRODUCTO_id_categoria_producto
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