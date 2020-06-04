<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Centros Educativos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
  <!-- TABLE: Centros -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Centro</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                      <th>Ver más</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php

                        $centros=ControladorConsultas::ctrCentros();

                        foreach ($centros as $key => $mostrar) {
                          $nombre=$mostrar['Nombre_Ctro_Educativo'];
                        

                      ?>
                    <tr>
                      <td><?php echo $nombre ?></td>
                      <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
                      <td><span class="badge badge-danger"><i class="far fa-trash-alt"></i></span></td>
                      <td><span class="badge badge-warning"><a href="planteles.php"><i class="far fa-eye"></i></a></span></td>
                    </tr>
                    <?php 

                      }
                      
                    ?>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>

 