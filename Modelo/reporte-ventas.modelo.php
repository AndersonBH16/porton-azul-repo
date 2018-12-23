<?php
/**
 * Created by PhpStorm.
 * User: manuelperez
 * Date: 12/19/18
 * Time: 3:10 PM
 */
    require_once "conexion.php";

    class ReporteVentasModelo{
        public function mdlMostrarReporte(){
            $consulta = "SELECT boleta.numero_correlativo, cliente.nombre, comprobante.fecha_creacion, personal.nombre_personal, pedido.sub_total, pedido.MESA_id_mesa  FROM porton_azul.boleta
                            INNER JOIN porton_azul.comprobante
                            ON boleta.COMPROBANTE_id_comprobante = comprobante.id_comprobante
                            INNER JOIN porton_azul.ventas
                            ON comprobante.VENTAS_id_ventas = ventas.id_ventas
                            INNER JOIN porton_azul.cliente
                            ON comprobante.CLIENTE_id_cliente = cliente.id_cliente
                            INNER JOIN porton_azul.personal_perfil
                            ON ventas.PERSONAL_PERFIL_id_personal_perfil = personal_perfil.id_personal_perfil
                            INNER JOIN porton_azul.personal
                            ON personal_perfil.PERSONAL_id_personal = personal.id_personal
                            INNER JOIN porton_azul.pedido
                            ON ventas.PEDIDO_id_pedido = pedido.id_pedido
                            ORDER BY numero_correlativo";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            $resultado_tablaReporte = $statement->fetchAll(PDO::FETCH_CLASS);

            $i = 1;
            $datosListos = [];
            $botones = '<div style="text-align: center"><button class="btn btn-success" onclick="accionVer()">Ver</button><button class="btn btn-warning" onclick="accionImprimir()">Imprimir</button></div>';

            foreach($resultado_tablaReporte as $value){
                $datos = [
                    "item" => $i,
                    "nro_boleta" => $value->numero_correlativo,
                    "nombre_cliente" => $value->nombre,
                    "fecha_boleta" => $value->fecha_creacion,
                    "nombre_mozo" => $value->nombre_personal,
                    "sub_total" => $value->sub_total,
                    "acciones" => $botones
                ];
                $i++;
                array_push($datosListos, $datos);
            }

            $enviar = json_encode([
                "data" => $datosListos
            ]);

            return $enviar;
        }
    }
?>