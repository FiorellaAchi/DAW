<?php require_once HEADER; ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=servicios&f=edit" method="POST" id="formulario" onsubmit="return validar()">
                <input type="hidden" name="id" id="id" value="<?php echo $serv['idServicio']; ?>" />
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre">Nombre del Servicio</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $serv['nombreServicio']; ?>"
                            class="form-control" placeholder="Nombre servicio">
                        <p></p>
                    </div><br>
                  
                    <div class="col-lg-12">
                        <label for="descripcion" class="mb-2 mt-3">Descripcion</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"
                            rows="4"><?php echo $serv['descripcion']; ?></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label for="medico">Medico</label>
                        <input type="text" name="medico" id="medico" value="<?php echo $serv['medico_id']; ?>"
                            class="form-control" placeholder="medico">
                            <br>
                    </div>
                    <div class="col-lg-6">
                        <label for="paciente">Paciente</label>
                        <input type="text" name="paciente" id="paciente" value="<?php echo $serv['paciente_id']; ?>"
                            class="form-control" placeholder="paciente">
                            <br>
                    </div>             
                    <div class="col-lg-6">
                        <label for="consulta">Consulta</label>
                        <input type="text" name="consulta" id="consulta" value="<?php echo $serv['consultamedica_id']; ?>"
                            class="form-control" placeholder="consulta">
                            <br>
                    </div>                
                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=servicios&f=index" class="btn btn-primary">Cancelar</a>
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
            <title>Editar Servicios</title>
            <meta author="JOSE BONIFAZ CHACON">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>

