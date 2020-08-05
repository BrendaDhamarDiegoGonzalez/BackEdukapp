<head>
  <link rel="stylesheet" href="../TinyEditor-master/style.css" />
  <script type="text/javascript" src="../TinyEditor-master/tinyeditor.js"></script>
</head>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Ofertas en Revisión</h1>
          </div><!-- /.col -->
          </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="p-3  col-sm-12 "><!-- Sección buscar oferta-->
        <form method="post"  action="<?php echo $url."buscar"?>"><!--Comienza formulario de buscar-->
        <div class="form-group row ">
          <label class=" col-form-label">Filtro</label>
          <div>
            <input type="text" class="form-control" id="buscarOferta" name="buscarOferta" placeholder="Nombre centro educativo">
          </div>
          <div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
        </form><!--Termina formulario de buscar-->
        </div><!-- Fin sección buscar oferta-->
        <div class="px-3  col-sm-12"><!--Div insertar-->
        <div class="form-group row">
          <label class="col-form-label">Agregar Oferta  </label>
          <div>
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarOferta"><i class=" fas fa-plus-square"></i></button>
          </div>
        </div>
        </div><!--Fin div insertar-->
        <div class="card px-5"><!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Centro </th>
                  <th>Oferta</th>
                  <th class="text-center">Nivel</th>
                  <th class="text-center">Modalidad</th>
                  <th class="text-center">Modificar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $revision=ControladorConsultas::ctrOrevision();
                foreach ($revision as $key => $mostrar) {
                $id_Ofer=$mostrar['cve_OfertaEdu'];
                $centro=$mostrar['Nombre_Ctro_Educativo'];
                $oferta=$mostrar['Nombre'];
                $nivel=$mostrar['NombreNivel'];
                $modalidad=$mostrar['Modalidad'];
                ?>
                <tr>
                  <td><?php echo $centro ?></td>
                  <td><?php echo $oferta ?></td>
                  <td class="text-center"><?php echo $nivel ?></td>
                  <td class="text-center"><?php echo $modalidad ?></td>
                  <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificarOferta/".$id_Ofer?>"><i class="fas fa-pen"></i></a></button></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            </div><!-- /.table-responsive -->
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal" id="insertarOferta" tabindex="-1" role="dialog" aria-labelledby="insertarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="insertarUsuarioLabel">Insertar Oferta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post"  action="<?php echo $url."registro"?>" enctype="multipart/form-data">
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
                  <textarea id="ofertaHtml" style="width:400px; height:200px"></textarea>
                  <script type="text/javascript">
                  new TINY.editor.edit('editor',{
                  id:'ofertaHtml',
                  width:584,
                  height:175,
                  cssclass:'te',
                  controlclass:'tecontrol',
                  rowclass:'teheader',
                  dividerclass:'tedivider',
                  controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
                  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
                  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
                  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
                  footer:true,
                  fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
                  xhtml:true,
                  cssfile:'style.css',
                  bodyid:'editor',
                  footerclass:'tefooter',
                  toggle:{text:'show source',activetext:'show wysiwyg',cssclass:'toggle'},
                  resize:{cssclass:'resize'}
                  });
                  </script>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Costo por periodo</label>
                  <input type="text" class="form-control" id="costoPeri" name="costoPeri" placeholder="Costo por periodo">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Categoria</label>
                  <select class="browser-default custom-select " name="cate">
                    <option selected>Seleccione</option>
                    <option value="1">Admininstración Pública</option>
                    <option value="2">Empleo público</option>
                    <option value="3">Posgrados</option>
                    <option value="4">Arte y bellas artes</option>
                    <option value="5">Arquitectura y Diseño</option>
                    <option value="6">Diseño de Moda  Técnicas</option>
                    <option value="7"> Sociales y humanidades</option>
                    <option value="8">Psicología y ciencia del comportamiento</option>
                    <option value="9">Educación</option>
                    <option value="9">Derecho / leyes</option>
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
                <input class=" btn btn-primary" type="submit"  value="Guardar" >
              </form>
            </div>
          </div>
        </div>
        </div><!--Fin Modal-->