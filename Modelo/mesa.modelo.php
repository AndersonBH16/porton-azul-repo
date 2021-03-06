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
        
        public static function devolverNumeroEstadoMesa($tabla){
            $ultimo_nroMesa = MesaModelo::ultimaMesaAgregada($tabla);
            $consulta = "SELECT numero_mesa, estado_mesa FROM $tabla WHERE numero_mesa = $ultimo_nroMesa";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
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
                                personal_perfil.id_personal_perfil,
                                personal.nombre_personal,
                                pedido.sub_total,
                                mesa.estado_mesa,
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
                        WHERE mesa.numero_mesa = '$numeroMesa' AND estado_pedido = 1";
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
                    'id_mozo' => $pedido->id_personal_perfil,
                    'nombre_mozo' => $pedido->nombre_personal,
                    'sub_total'=> $pedido->sub_total,
                    'estado_mesa' => $pedido->estado_mesa,
                    'id_pedido' => $pedido->id_pedido
                ];
                $i++;
                array_push($nPedidos, $datos);
            }
            $retornoPedidos = json_encode([
                "data" => $nPedidos
            ]);
            return $retornoPedidos;
        }
        
        public static function enviarCaja($id_mesa, $estado_mesa){
            if($estado_mesa == "Ocupado"){
                $consulta = "CALL sp_enviarCaja('$id_mesa')";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->execute();
                return $statement->fetch();

                $statement->close();
                $statement = null;
            }
            else {
                return -1;
            }
        }
    }
    
?>
