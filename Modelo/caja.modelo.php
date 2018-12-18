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
        
        public function verDetalleMesaParaCaja($numeroMesa) {
            $consulta = "SELECT producto.nombre_producto,
                                pedido_producto.cantidad,
                                producto.precio,
                                personal.nombre_personal,
                                pedido.sub_total,
                                pedido.id_pedido
                        FROM mesa
                        INNER JOIN pedido
                        ON mesa.id_mesa = pedido.MESA_id_mesa
                        INNER JOIN pedido_producto
                        ON pedido.id_pedido = pedido_producto.PEDIDO_id_pedido
                        INNER JOIN producto
                        ON producto.id_producto = pedido_producto.PRODUCTO_id_producto
                        INNER JOIN personal_perfil
                        ON personal_perfil.id_personal_perfil = pedido.PERSONAL_PERFIL_id_personal_perfil
                        INNER JOIN personal
                        ON personal.id_personal = personal_perfil.PERSONAL_id_personal
                        WHERE mesa.numero_mesa = '$numeroMesa' AND estado_pedido = 2";

            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            $pedidos = $statement->fetchAll(PDO::FETCH_CLASS);
            $i = 1;
            $nPedidos = [];
            foreach ($pedidos as $pedido){
                $datos = [
                    'item' => $i,
                    'descripcion' => $pedido->nombre_producto,
                    'cantidad' => $pedido->cantidad,
                    'subtotal' => round($pedido->cantidad * $pedido->precio, 2),
                    'mozo' => $pedido->nombre_personal,
                    'sub_total'=> $pedido->sub_total,
                    'id_pedido'=> $pedido->id_pedido
                ];
                $i++;
                array_push($nPedidos, $datos);
            }
            $retornoPedidos = json_encode([
                "data" => $nPedidos
            ]);
            return $retornoPedidos;
        }
    }
?>