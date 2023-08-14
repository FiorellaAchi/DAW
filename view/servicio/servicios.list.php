<?php
require_once HEADER;
?>

<div class="container">
  
  <div class="row">
    <div class="col-md-6 d-flex align-items-center">
      <h4 class="me-2">Buscar: </h4>
      <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar producto" class="px-2" />

    </div>

    <div class="col-md-6 d-flex justify-content-end">
      <?php
      if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO") {
          ?>
          <a href="index.php?c=servicios&f=view_new">
            <button type="button" class="btn btn-primary">
              <i class="fas fa-plus"></i>
              Nuevo</button>
          </a>
          <?php
        }
      }
      ?>
    </div>
  </div>

  <div class="table-responsive-md mt-3">
    <table class="table table-striped table-bordered border-secondary">
      <thead class="table-dark text-center">
        <th>Código de Servicio</th>
        <th>Nombre del servicio</th>
        <th>Descripcion</th>
        <th>Medico</th>
        <th>Paciente</th>
        <th>Consulta</th>


        <?php

        if (isset($_SESSION['rol'])) {
          if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO") {


            ?>
            <th>Acciones</th>
            <?php
          }
        }
        ?>


      </thead>
      <tbody class="datos-tabla text-center">
        <?php
        foreach ($resultados as $fila) {
          ?>
          <tr>
            <td>
              <?php echo $fila['idServicio'] ?>
            </td>
            <td>
              <?php echo $fila['nombreServicio'] ?>
            </td>
            <td>
              <?php echo $fila['descripcion'] ?>
            </td>
            <td>
              <?php echo $fila['nombreMedico'] ?>
            </td>
            <td>
              <?php echo $fila['nombrePaciente'] ?>
            </td>
            <td>
              <?php echo $fila['nombreConsulta'] ?>
            </td>


            <?php
            if (isset($_SESSION['rol'])) {
              if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO") {
                ?>




                <td class="text-center">

                  <a class="btn btn-primary" href="index.php?c=servicios&f=view_edit&id=<?php echo $fila['idServicio']; ?>">
                    <i class="fas fa-marker"></i></a>
                  <a class="btn btn-danger" onclick="if(!confirm('¿Está seguro de eliminar usuario?'))return false;"
                    href="index.php?c=servicios&f=delete&id=<?php echo $fila['idServicio']; ?>">
                    <i class="fas fa-trash-alt"></i>
                  </a>



                </td>

                <?php
              }
            }
            ?>


            <?php
        }
        ?>
        </tr>
      </tbody>
    </table>
  </div>






  <?php

  foreach ($resultados as $aviso) {
    ?>
    <div class="modal fade" id="exampleModal<?php echo $aviso['idServicio']; ?>" tabindex="-1"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Está seguro de eliminar este servicio?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a class="btn btn-primary"
              href="index.php?c=servicio&f=delete&id=<?php echo $modal['idServicio']; ?>">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>