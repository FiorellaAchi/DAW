<?php
require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=cliente&f=new" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="cedula" class="form-label">Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula">
                    </div>

                    <div class="col-lg-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad">
                    </div>

                    <div class="col-lg-6">
                        <label for="genero" class="form-label">Género</label>
                        <input type="text" class="form-control" name="genero" id="genero">
                    </div>

                    <div class="col-lg-6">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" id="correo">
                    </div>

                    <div class="col-lg-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>

                    <div class="col-lg-6">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>
                    <div class="col-lg-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos">
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=cliente&f=index" class="btn btn-primary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require_once FOOTER;
?>


<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Crear Paciente</title>
            <meta author="FIORELLA ACHI">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>