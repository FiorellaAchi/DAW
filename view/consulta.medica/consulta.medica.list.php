<?php
require_once HEADER;
?>

<div class="container">
    <div class="row">
        <form action="index.php?c=consulta&f=search" method="POST">
            <div class = "col-md-6 d-flex align-items-center">
            <h4 class="me-2">Buscar: </h4>
            <input type="text" name="b" id="busqueda"  placeholder="Buscar..." class="px-2"/>
            </div>
        </form>

        <div class="col-md-6 d-flex justify-content-end">
            <a href="index.php?c=consulta&f=view_new" class="text-decoration-none">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </a>
        </div>
    </div>


<div class="table-responsive-md mt-3">
    <table class="table table-striped table-bordered border-secondary">
        <thead class="table-dark text-center">
            <th>Código de consulta</th>
            <th>Nombre del paciente</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Especialidad médica</th>
            <th>Fecha y hora de la consulta</th>
            <th>Acciones</th>
        </thead>
        <tbody class="datos-tabla text-center">
            <?php
                foreach($resultados as $fila){ 
            ?>
            <tr>
                <td><?php echo $fila['idConsulta'] ?></td>
                <td><?php echo $fila['nombrePaciente'] ?></td>
                <td><?php echo $fila['email']?></td>
                <td><?php echo $fila['telefono'] ?></td>
                <td><?php echo $fila['especialidadMedica']?></td>
                <td><?php echo $fila['fechaConsulta'] . " " . $fila['horaConsulta'] ?></td>
                <td>
                <a class="btn btn-primary" 
                    href="index.php?c=consulta&f=view_edit&id=<?php echo $fila['idConsulta']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('¿Está seguro de eliminar esta consulta?'))return false;" 
                    href="index.php?c=consulta&f=delete&id=<?php echo  $fila['idConsulta']; ?>">
                    <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            
            <?php
            }
            ?>

        </tbody>

    </table>

</div>

</div>


<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Listar Consulta Medica</title>
            <meta author="LUIS BEDOYA JAIME">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>