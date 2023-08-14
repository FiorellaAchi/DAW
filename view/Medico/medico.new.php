<?php 
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <form action="index.php?c=medico&f=new" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <label for="cedula" class="mb-2">Cedula</label>
                    <input type="text" class="form-control" name="cedula" id="cedula">
            </div>
            <div class="col-lg-6">
                <label for="nombres" class="mb-2">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres">
            </div>
            <div class="col-lg-6">
                <label for="apellidos" class="mb-2">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos">
            </div>
            <div class="col-lg-6">
                <label for="edad" class="mb-2">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad">
            </div>
            <div class="col-lg-6">
                <label for="especialidad" class="mb-2">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" id="especialidad">
            </div>
            <div class="col-lg-6">
                <label for="correo" class="mb-2">Correo</label>
                <input type="text" class="form-control" name="correo" id="correo">
            </div>
            <div class="col-lg-6">
                <label for="telefono" class="mb-2">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono">
            </div>
        </form>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?c=medico&f=index" class="btn btn-primary">Cancelar</a>
    </div>

</div>