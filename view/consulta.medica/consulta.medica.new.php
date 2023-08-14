<?php
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=consulta&f=new" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombrePaciente"class="mb-2">Nombre</label>
                        <input type="text" class="form-control" name="nombrePaciente" id="nombrePaciente" value= "<?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?>" >
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="mb-2">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>

                    <div class="col-lg-6">
                        <label for="telefono" class="-mb-2 mt-3">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>

                    <div class="col-lg-6">
                        <label for="especialidadMedica" class="mb-2 mt-3">Especialidad médica</label>
                        <select name="especialidadMedica" id="especialidadMedica" class="form-select">
                            <option value="0">Seleccione una especialidad</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Gastroenterología">Gastroenterología</option>
                            <option value="Neurología">Neurología</option>
                            <option value="Pediatría">Pediatría</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label for="fechaConsulta" class="mb-2 mt-3">Fecha:</label>
                        <input type="date" id="fechaConsulta" name="fechaConsulta" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="mb-2 mt-2">Hora:</label>
                        <input type="time" id="horaConsulta" name="horaConsulta" class="form-control">
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=consulta&f=index" class="btn btn-primary">Cancelar</a>
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
            <title>Crear Consulta Medica</title>
            <meta author="LUIS BEDOYA JAIME">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>