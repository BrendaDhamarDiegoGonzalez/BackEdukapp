<?php 

    $url = Ruta::ctrRuta();

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edukapp</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <?php
    //Barra lateral
    include "modulos/barra.php";
    // "" => pagina inicial
    // centros => centros educativos
    // usuarios => panel de usuarios 
    //revision => ofertas en revisión
    //aprobadas => ofertas aprobadas
    //rechazadas => ofertas rechazadas
    //reporte => reporte diario
    //mensual => reporte mensual

    if (isset($_GET["ruta"])) {
        
        $ruta = explode("/",$_GET["ruta"]); 

        if(isset($ruta[0])){

            $modulo = $ruta[0];

            if($modulo == "centros"){
              //Centros educativos
              include "modulos/centroseducativos.php";
            }else if($modulo == "usuarios"){
              //Panel de usuarios
              include "modulos/paneldeusuarios.php";
            }else if ($modulo =="revision") {
              //Ofertas en revisión
              include "modulos/ofertasrevision.php";
            }else if ($modulo=="aprobadas") {
              //Ofertas aprobadas
              include "modulos/ofertasaprobadas.php";
            }else if ($modulo=="rechazadas") {
              //Ofertas rechazadas
              include "modulos/ofertasrechazadas.php";
            }else if ($modulo == "reporte") {
              //reporte diario
              include "modulos/reportes.php";
            }else if ($modulo == "mensual") {
              //reporte mensual
              include "modulos/reportesmensuales.php";
            }else if ($modulo == "planteles") {
              //planteles de centro educativo
              include "modulos/planteles.php";
            }else if ($modulo == "registro"){
                include "modulos/registro.php";
               // include "../controladores/ControladorConsultas.php";
            }else if ($modulo == "eliminar"){
                include "modulos/eliminar.php";
               
            }else if ($modulo == "modificar"){
                include "modulos/modificar.php";
               
            }else if ($modulo == "modificar2"){
                include "modulos/modificar2.php";
               
            }else if ($modulo == "buscar"){
                include "modulos/buscarCentro.php";
               
            }else if ($modulo == "modificarPlan"){
                include "modulos/modificarPlantel.php";
               
            }else if ($modulo == "modificarUsuario"){
                include "modulos/modificarUsuario.php";

            }else if ($modulo == "modificarOferta"){
                include "modulos/modificarOferta.php";

            }else if ($modulo == "eliminarPlan"){
                include "modulos/eliminarPlan.php";
               
            }else if ($modulo == "generar"){
                include "modulos/generadordereportes.php";
            }
            
            
            }


            if(isset($ruta[1])){
                $cveCentro = $ruta[1];
            }

        }

        else{
            //Tablero (contenido)
              include "modulos/tablero.php";
            }
    
    
    ?>

    <!-- jQuery -->
    <script src="<?php echo $url ?>vistas/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $url ?>vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $url ?>vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo $url ?>vistas/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo $url ?>vistas/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo $url ?>vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $url ?>vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo $url ?>vistas/plugins/moment/moment.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo $url ?>vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo $url ?>vistas/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo $url ?>vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $url ?>vistas/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $url ?>vistas/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $url ?>vistas/dist/js/demo.js"></script>

    <?php
    include "modulos/pie.php";
    ?>
  </body>
</html>