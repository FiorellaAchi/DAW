<?php
    require_once HEADER;
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <form action="index.php?c=usuario&f=search" method="POST">
                <h4 class="me-2">Buscar:</h4>
                <input type="text" name="b" id="busqueda" placeholder="Buscar">
            </form>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <a href="index.php?c=usuario&f=view_new" class="text-decoration-none">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </a>
        </div>
    </div>

    <div class="table-responsive-md mt-3">
        <table class="table table-striped table-bordered border-secondary">
            <thead class="table-dark text-center">
                <th>Código de usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nombre de usuario</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            <tbody class="datos-tabla text-center">
                <?php
                    foreach($resultados as $fila){ 
                ?>
                <tr>
                    <td><?php echo $fila['idUsuario'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['apellido'] ?></td>
                    <td><?php echo $fila['nombreUsuario'] ?></td>
                    <td><?php echo $fila['password'] ?></td>
                    <td><?php echo $fila['nombreRol'] ?></td>
                    <td>
                    <a class="btn btn-primary" 
                    href="index.php?c=usuario&f=view_edit&id=<?php echo $fila['idUsuario']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('¿Está seguro de eliminar usuario?'))return false;" 
                    href="index.php?c=usuario&f=delete&id=<?php echo  $fila['idUsuario']; ?>">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                    
                    </td>
                <?php
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>

<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Listar Usuarios</title>
            <meta author="LUIS BEDOYA JAIME">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>