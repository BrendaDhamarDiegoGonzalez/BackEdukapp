<div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Panel de usuarios</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card"><!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Nick_usuario</th>
              <th>Perfil</th>
              <th>Modificar</th>     
            </tr>
          </thead>
          <tbody>
            <?php

            $usuarios=ControladorConsultas::ctrUsuarios();

            foreach ($usuarios as $key => $mostrar) {
            $nombreus=$mostrar['Nombre_Usuario'];
            $nick=$mostrar['Nick_Usuario'];
            $perfil=$mostrar['cve_Perfil'];

            switch ($perfil) {
              case 1:
                $tipo='Admon';
                break;
              case 2:
                $tipo='Asesor';
                break;
              case 3:
                $tipo='Temporal';
                break;
              case 4:
                $tipo='Editor';
                break;
              
              default:
                $tipo='Indefinido';
                break;
            }
                        
            ?>
            <tr>
              <td><?php echo $nombreus ?></td>
              <td><?php echo $nick ?></td>
              <td><?php echo $tipo ?></td>
              <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
            </tr>
            <?php 

             }
                      
             ?>    
          </tbody>
        </table>
      </div>
    </div><!-- /.card-body -->
  </div>

</div>