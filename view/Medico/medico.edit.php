<?php 
require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=medico&f=edit" method="POST">
                <input type="text" name="id" id="id" value="<?php echo $med['ID']?>">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="Cedula"class="mb-2">Cedula</label>
                        <input type="text" class="form-control" name="Cedula" id="Cedula" value= "<?php echo $med['Cedula']; ?>" >
                    </div>
                    <div class="col-lg-6">
                        <label for="Nombres" class="mb-2">Nombres</label>
                        <input type="text" class="form-control" name="Nombres" id="Nombres" value="<?php echo $med['Nombres'] ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="Apellidos" class="-mb-2 mt-3">Apellidos</label>
                        <input type="text" class="form-control" name="Apellidos" id="Apellidos" value="<?php echo $med['Apellidos'] ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="Edad" class="mb-2 mt-3">Edad</label>
                        <input type="text" class="form-control" name="Edad" id="Edad" value="<?php echo $med['Edad'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="Especialidad" class="mb-2 mt-3">Especialidad</label>
                        <input type="text" class="form-control" name="Especialidad" id="Especialidad" value="<?php echo $med['Especialidad'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="Correo" class="mb-2 mt-3">Correo</label>
                        <input type="text" class="form-control" name="Correo" id="Correo" value="<?php echo $med['Correo'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="Telefono" class="mb-2 mt-3">Teléfono</label>
                        <input type="text" class="form-control" name="Numero_Telefono" id="Telefono" value="<?php echo $med['Numero_Telefono'] ?>">
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=medico&f=index" class="btn btn-primary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Editar Medico</title>
            <meta author="DOMENICA ORTIZ">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>