<head>
  <script type="text/javascript" src="../plugins/editor/js/editor.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/editor/css/editor.css">
<script type="text/javascript">
$(document).ready(function(){
$('#ofertaHtml').Editor();

$('#btn-enviar').click(function(e){
e.preventDefault();
$('#ofertaHtml').text($('#ofertaHtml').Editor('getText'));
$('#frm-test').submit();
});
});
</script>
</head>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12 py-3"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Insertar Oferta</h1>
    </div><!-- Fin titulo -->
    <div class="card p-5">
      <div class="card-body p-0">
        <div class="">
          <form method="post"  action="<?php echo $url."registro"?>" enctype="multipart/form-data" id="frm-test" name="frm-test" >
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre(s)</label>
              <input type="text" class="form-control" id="nombreUsu" name="nombreOfe" placeholder="Nombre(s)">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Costo</label>
              <input type="text" class="form-control" id="costo" name="costo" placeholder="$ 00,000.00 MXN">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Duración</label>
              <input type="text" class="form-control" id="dura" name="dura" placeholder="Cuatrimestres/Años/Semestres">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Descripción</label>
              <input type="text" class="form-control" id="desc" name="desc" placeholder="Breve descripción">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Nivel</label>
              <select class="browser-default custom-select " name="nivel">
                <option selected>Seleccione</option>
                <option value="1">Licenciaturas</option>
                <option value="2">Maestrías</option>
                <option value="3">Posgrados</option>
                <option value="4">Diplomados</option>
                <option value="5">Cursos</option>
                <option value="6">Carreras Técnicas</option>
                <option value="7">Programas en Línea</option>
                <option value="8">Preparatoria</option>
              </select>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Oferta</label>
              <textarea id="ofertaHtml" name="ofertaHtml"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Costo por periodo</label>
            <input type="text" class="form-control" id="costoPeri" name="costoPeri" placeholder="Costo por periodo">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Subcategoria</label>
            <?php $subcat = ModeloConsulta::mdlMostrarSubcategorias(); ?>
            <select name="cate" id="cate" class="form-control">
              <?php
              if (count($subcat) > 0)
              {
              foreach ($subcat as $key => $value) {
              $idsubcat = $value["id_subcategoria"];
              $nomCat = $value["descripcion_subcat"];?>
              <option value="<?php echo $idsubcat; ?>"><?php echo $nomCat; ?></option>
              <?php
              }
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">PDF</label>
            <input type="file" class="form-control-file" id="nomPdf" name="nomPdf">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Modalidad</label>
            <select class="browser-default custom-select " name="moda">
              <option selected>Seleccione</option>
              <option value="1">En línea y presencial</option>
              <option value="2">En línea</option>
              <option value="3">Presencial</option>
              <option value="4">Semipresencial</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Promocional</label>
            <input type="text" class="form-control" id="promo" name="promo" placeholder="Promoción">
          </div>
          <input class=" btn btn-primary" type="submit"  value="Guardar" id="btn-enviar" >
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>