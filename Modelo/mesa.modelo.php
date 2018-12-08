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

        public function verDetalleMesa($numeroMesa) {
            $consulta = "SELECT producto.nombre_producto,
                                pedido_producto.cantidad,
                                producto.precio,
                                personal.nombre_personal,
                                pedido.sub_total
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
                        WHERE mesa.numero_mesa = '$numeroMesa'";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            $pedidos = $statement->fetchAll(PDO::FETCH_CLASS);
            $i = 1;
            $nPedidos = [];
            foreach ($pedidos as $pedido){
                $datos = [
                    'item' => $i,
                    'plato' => $pedido->nombre_producto,
                    'cantidad' => $pedido->cantidad,
                    'precio' => $pedido->precio,
                    'nombre_mozo' => $pedido->nombre_personal,
                    'sub_total'=> $pedido->sub_total
                ];
                $i++;
                array_push($nPedidos, $datos);
            }
            $retornoPedidos = json_encode([
                "data" => $nPedidos
            ]);
            return $retornoPedidos;
        }

        public function verDetalleMesaParaCaja($numeroMesa) {
            $consulta = "SELECT producto.nombre_producto,
                                pedido_producto.cantidad,
                                producto.precio,
                                personal.nombre_personal
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
                        WHERE mesa.numero_mesa = '$numeroMesa'";

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
                    'mozo' => $pedido->nombre_personal
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
