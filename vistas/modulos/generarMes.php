<?php
if(isset($_POST["centroE"])){
  $datos = array(
  'mes' => date("m"),
  'anio' => date("Y"),
  'cve' => $_POST['centroE']
   );
  $mostrar =ModeloConsulta::mdlReporteAspirantesMesPorCentro($datos);
$aspimes= count($mostrar);
 

}else{
$mes = date("m");
$anio=date("Y");
$mostrar = ModeloConsulta::mdlReporteAspirantesMes($mes,$anio);
$aspimes= count($mostrar);
}
?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=400, initial-scale=1">
    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/plugins/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu+Condensed" rel="stylesheet">
    <!--=====================================
    HOJAS DE ESTILO PERSONALIZADAS
    ======================================-->
    <link rel="stylesheet" href="<?php echo $url;?>vistas/css/tableexport.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://formacionacademica.com.mx/wp-content/uploads/2019/03/cropped-Icono-Web-32x32.png">
    <title>Backend Landing</title>
    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <!-- jQuery library -->
    <script src="<?php echo $url;?>vistas/js/plugins/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?php echo $url;?>vistas/js/plugins/bootstrap.min.js"></script>
  </head>
  <body>
    <br>
    <div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Aspirantes Registrados Hoy</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <div class="card px-5"><!-- TABLE: Centros -->
    <div class="card-body p-0"><!-- /.card-header -->
      <div class="table-responsive">
        <table class="table m-0">
      <thead>
        <tr>
          <th>Item</th>
          <th>Nombre Aspirante</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Celular</th>
          <th>Telefóno</th>
          <th>Correo Electrónico</th>
          <th>Estado</th>
          <th>Horario contactar</th>
          <th>Forma de contacto</th>
          <th>Oferta</th>
          <th>Centro Educativo</th>
          <th>Fecha de alta</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $j=1;
        for($i=0;$i<$aspimes;$i++){
        $nombre=$mostrar[$i]['Nombre_Aspirante'];
        $aPaterno=$mostrar[$i]['Apaterno_Aspirante'];
        $aMaterno=$mostrar[$i]['Amaterno_Estudiante'];
        $cel=$mostrar[$i]['Celular_Aspirante'];
        $tel=$mostrar[$i]['Telefono_Aspirante'];
        $correo=$mostrar[$i]['CorreoE_Aspirante'];
        $estado=$mostrar[$i]['Estado'];
        $horario=$mostrar[$i]['Horario_Contactar'];
        $forma=$mostrar[$i]['Forma_Contacto'];
        $oferta=$mostrar[$i]['Nombre'];
        $centro=$mostrar[$i]['Nombre_Ctro_Educativo'];
        $alta=$mostrar[$i]['FechaAlta'];
        echo '<tr>
          <td>'.$j.'</td>
          <td>'.$nombre.'</td>
          <td>'.$aPaterno.'</td>
          <td>'.$aMaterno.'</td>
          <td>'.$cel.'</td>
          <td>'.$tel.'</td>
          <td>'.$correo.'</td>
          <td>'.$estado.'</td>
          <td>'.$horario.'</td>
          <td>'.$forma.'</td>
          <td>'.$oferta.'</td>
          <td>'.$centro.'</td>
          <td>'.$alta.'</td>
        </tr>';
        $j++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
    <hr class="d-sm-none">
  </div>
</body>
<!-- Llamar a los complementos javascript-->
<script src="<?php echo $url;?>vistas/js/plugins/jquery-1.12.4.min.js"></script>
<script src="<?php echo $url;?>vistas/js/plugins/FileSaver.min.js"></script>
<script src="<?php echo $url;?>vistas/js/plugins/Blob.min.js"></script>
<script src="<?php echo $url;?>vistas/js/plugins/xls.core.min.js"></script>
<script src="<?php echo $url;?>vistas/js/dist/js/tableexport.js"></script>
<script>
$("table").tableExport({
formats: ["xlsx","txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
position: 'top',  // Posicion que se muestran los botones puedes ser: (top, bottom)
bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
fileName: "ReporteMensualAspirantes",    //Nombre del archivo
});
</script>
</html>