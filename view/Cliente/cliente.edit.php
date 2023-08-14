<?php 
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
       
            <form action="index.php?c=cliente&f=edit" method="POST">
                <input type="text" name="idPaciente" id="idPaciente" value="<?php echo $cli['idPaciente']; ?>" hidden>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $cli['nombre']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="cedula" class="form-label">Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $cli['cedula']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad" value="<?php echo $cli['edad']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="genero" class="form-label">Género</label>
                        <input type="text" class="form-control" name="genero" id="genero" value="<?php echo $cli['genero']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $cli['correo']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $cli['direccion']; ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $cli['telefono']; ?>">
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