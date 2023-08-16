<?php 
 require_once HEADER
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 d-flex align-items-center">
      <h4 class="me-2">Buscar: </h4>
      <input type="text" name="busquedaAjax" id="busquedaAjax" class="px-2" />
      
    </div>

    <div class="col-md-6 d-flex justify-content-end">
      <?php
      if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO") {
          ?>
          <a href="index.php?c=cliente&f=view_new">
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
        <th>Id Paciente</th>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Edad</th>
        <th>Genero</th>
        <th>Correo</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Apellidos</th>
        <th>Acciones </th>
</thead>
<tbody class="datos-tabla text-center">
    <?php
    foreach($resultados as $fila){
        ?>
</tbody>
<tr>
    <td><?php echo $fila['idPaciente']; ?></td>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['cedula']; ?></td>
    <td><?php echo $fila['edad']; ?></td>
    <td><?php echo $fila['genero']; ?></td>
    <td><?php echo $fila['correo']; ?></td>
    <td><?php echo $fila['direccion']; ?></td>
    <td><?php echo $fila['telefono']; ?></td>
    <td><?php echo $fila['apellidos']; ?></td>
    <td>
        <?php
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO") {
                ?>
                <a href="index.php?c=cliente&f=view_edit&id=<?php echo $fila['idPaciente']; ?>">
                    <button type="button" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                        Editar</button>
                </a>
                <a href="index.php?c=cliente&f=delete&id=<?php echo $fila['idPaciente']; ?>">
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                        Eliminar</button>
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

    foreach($resultados as $fila){
        ?>

        <div class="modal fade" id="exampleModal"<?php echo $aviso['idPaciente']; ?> tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Está seguro de eliminar este registro?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a class="btn btn-primary"
              href="index.php?c=cliente&f=delete&id=<?php echo $modal['idCliente']; ?>">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php
    require_once FOOTER;
?>

  <!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Listar Paciente</title>
            <meta author="FIORELLA ACHI">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>