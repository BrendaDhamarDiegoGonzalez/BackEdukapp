<?php 
    if(isset($_POST["centro"])){
      $cveCentro=$_POST["centro"];
      //print_r($_POST['centro']);
      $planteles = ModeloConsulta::mdlPlantelesActivos($cveCentro); 
    }
   ?>
<body>
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
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" class="form-control" id="nombreOfe" name="nombreOfe" placeholder="Nombre de la oferta">
            </div>
            <div class="d-none"><input type="cveCentro" name="cveCentro" value="<?php echo $cveCentro; ?>"></div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Planteles Disponibles </label>
              <table class="table m-0">
                <thead>
                  <tr>
                    <th class="text-center">Agregar</th>
                    <th>Plantel</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (count($planteles) > 0){
                    foreach ($planteles as $key => $value) {
                    $idplan = $value["cve_Plantel"];
                    $nomplan = $value["Nombre_Plantel"];
                    $tipo=$value["Tipo_Plantel"];
                  ?>
                  <tr>
                    <td class="text-center"><input name="planteles[]" class="form-check-input position-static" value="<?php echo $idplan; ?>" type="checkbox"></input></td>
                    <td><?php echo $nomplan." (".$tipo.")";?></td>
                  </tr>
                  <?php  }}?>
                  
                </tbody>
              </table>
              
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
              <?php $niveles = ModeloConsulta::mdlMostrarNiveles(); ?>
              <select class="custom-select" id="nivel" name="nivel"  >
                <?php
                if (count($niveles) > 0)
                {
                foreach ($niveles as $key => $value) {
                $idniv = $value["cve_Nivel"];
                $nomniv = $value["NombreNivel"];?>
                <option value="<?php echo $idniv; ?>"><?php echo $nomniv; ?></option>
                <?php
                }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Oferta</label>
              <textarea id="ofertaHtml" name="ofertaHtml"></textarea>
              <script>
              CKEDITOR.replace('ofertaHtml');
              </script>
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
            <?php $modalidades = ModeloConsulta::mdlMostrarModalidades(); ?>
              <select class="custom-select" id="moda" name="moda" >
                <?php
                if (count($modalidades) > 0)
                {
                foreach ($modalidades as $key => $value) {
                $idmod = $value["Cve_Modalidad"];
                $nomod = $value["Modalidad"];?>
                <option value="<?php echo $idmod; ?>"><?php echo $nomod; ?></option>
                <?php
                }
                }
                ?>
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

</body>