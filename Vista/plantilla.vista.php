<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portón Azul | Restaurant - Café</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/png" sizes="32x32" href="Vista/img/login/logo.png">
      
        <!------------------------------------------------------------------------
        PLUGGINS DE CSS
        -------------------------------------------------------------------------->

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="Vista/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="Vista/bower_components/font-awesome/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="Vista/bower_components/Ionicons/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="Vista/dist/css/AdminLTE.css">

        <!-- AdminLTE Skins -->
        <link rel="stylesheet" href="Vista/dist/css/skins/_all-skins.min.css">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- DataTables -->
        <link rel="stylesheet" href="Vista/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="Vista/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="Vista/plugins/iCheck/all.css">

        <!-- Daterange picker -->
        <link rel="stylesheet" href="Vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">

        <!-- Morris chart -->
        <link rel="stylesheet" href="Vista/bower_components/morris.js/morris.css">                
        
        <!--=====================================
        PLUGINS DE JAVASCRIPT
        ======================================-->

        <!-- jQuery 3 -->
        <script src="Vista/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="Vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- FastClick -->
        <script src="Vista/bower_components/fastclick/lib/fastclick.js"></script>

        <!-- AdminLTE App -->
        <script src="Vista/dist/js/adminlte.min.js"></script>

        <!-- DataTables -->
        <script src="Vista/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="Vista/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="Vista/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
        <script src="Vista/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

        <!-- SweetAlert 2 -->
        <script src="Vista/plugins/sweetalert2/sweetalert2.all.js"></script>
        <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

        <!-- iCheck 1.0.1 -->
        <script src="Vista/plugins/iCheck/icheck.min.js"></script>

        <!-- InputMask -->
        <script src="Vista/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="Vista/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="Vista/plugins/input-mask/jquery.inputmask.extensions.js"></script>

        <!-- jQuery Number -->
        <script src="Vista/plugins/jqueryNumber/jquerynumber.min.js"></script>

        <!-- daterangepicker http://www.daterangepicker.com/-->
        <script src="Vista/bower_components/moment/min/moment.min.js"></script>
        <script src="Vista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
        <script src="Vista/bower_components/raphael/raphael.min.js"></script>
        <script src="Vista/bower_components/morris.js/morris.min.js"></script>

        <!-- ChartJS http://www.chartjs.org/-->
        <script src="Vista/bower_components/chart.js/Chart.js"></script>
        
        <!-- Progress Bar -->
        <script src="Vista/bower_components/progressbar/dist/progressbar.min.js"></script>
        <script src="Vista/bower_components/progressbar/dist/progressbar.js"></script>
    </head>
    
    <!--CUERPO DEL SISTEMA-->
    <body class="hold-transition skin-blue sidebar-mini login-page" style="height: auto; min-height: 100%;">
        
        <?php
            
            if(isset($_SESSION["sesionIniciada"])=="ok"){
                //Cargamos los componentes de la plantilla
                echo '<div class="wrapper">';
                
                    //Cargamos Menú de Cabecera
                    include_once 'modulos/plantilla/cabecera.php';
                    
                    //Cargamos Menú de Lado Izquierdo
                    include_once 'modulos/plantilla/menu.php';
                    
                    //Cargamos el contenido
                    if(isset($_GET["ruta"])){
                        
                        if( $_GET["ruta"] == "inicio"||
                            $_GET["ruta"] == "personal"||
                            $_GET["ruta"] == "menu_restaurant"||
                            $_GET["ruta"] == "mesas"||
                            $_GET["ruta"] == "pedido"||
                            $_GET["ruta"] == "cocina"||
                            $_GET["ruta"] == "caja"||
                            $_GET["ruta"] == "reporte_ventas" ||
                            $_GET["ruta"] == "gestion_usuarios"||
                            $_GET["ruta"] == "salir"){
                            include "modulos/contenido/".$_GET["ruta"].".php";                            
                            
                        }else{
                            include 'modulos/contenido/404_error.php';
                        }
                        
                    }else{
                        include 'modulos/contenido/inicio.php';
                    }
                    
                    //Cargamos Footer
                    include_once 'modulos/plantilla/footer.php';
                    
                echo '</div>';
            }else{
                include_once 'modulos/login/login.php';
            }
                      
        ?>
        <script src="Vista/js/plantilla.js"></script>
        <script src="Vista/js/personal.js"></script>
        <script src="Vista/js/mesa.js"></script>
        <script src="Vista/js/menu_restaurant.js"></script>
        <script src="Vista/js/pedido.js"></script>
        <script src="Vista/js/cocina.js"></script>
        <script src="Vista/js/caja.js"></script>
        <script src="Vista/js/reporte_ventas.js"></script>
        <script src="Vista/js/gestion_usuario.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toogle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>