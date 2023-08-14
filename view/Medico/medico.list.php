<?php
require_once HEADER;
?>

<div class="container">
    <div class="row">
        <form action="index.php?c=medico&f=search" method="POST">
            <div class="col-md-6 d-flex align-items-center">
                <h4 class="me-2">Buscar: </h4>
                <input type="text" name="b" id="busqueda" class="px-2" />
            </div>
        </form>

        <div class="col-md-6 d-flex justify-content-end">
            <a href="index.php?c=medico&f=view_new" class="text-decoration-none">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </a>
        </div>

    </div>


    <div class="table-responsive-md mt-3">
        <table class="table table-striped table-bordered border-secondary">
            <thead class="table-dark text-center">
                <th>ID de médico</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Especialidad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </thead>
            <tbody class="datos-tabla text-center">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['ID'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Cedula'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Nombres'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Apellidos'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Edad'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Especialidad'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Correo'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Numero_Telefono'] ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?c=medico&f=view_edit&id=<?php echo $fila['ID']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger"
                                onclick="if(!confirm('¿Está seguro de eliminar este médico?'))return false;"
                                href="index.php?c=medico&f=delete&id=<?php echo $fila['ID']; ?>">
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