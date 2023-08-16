<?php 
require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=consulta&f=edit" method="POST">
                <input type="text" name="id" id="id" value="<?php echo $con['idConsulta']?>">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombrePaciente"class="mb-2">Nombre</label>
                        <input type="text" class="form-control" name="nombrePaciente" id="nombrePaciente" value= "<?php echo $con['nombrePaciente']; ?>" >
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="mb-2">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $con['email'] ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="telefono" class="-mb-2 mt-3">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $con['telefono'] ?>">
                    </div>

                    <div class="col-lg-6">
                        <label for="especialidadMedica" class="mb-2 mt-3">Especialidad médica</label>
                        <select name="especialidadMedica" id="especialidadMedica" class="form-select">
                            <option value="0">Seleccione una especialidad</option>
                            <option value="Cardiología" <?php echo (($con['especialidadMedica'])=='Cardiología')? "selected=''":"";?> >Cardiología</option>
                            <option value="Dermatología" <?php echo (($con['especialidadMedica'])=='Dermatología')? "selected=''":"";?> >Dermatología</option>
                            <option value="Gastroenterología" <?php echo (($con['especialidadMedica'])=='Gastroenterología')? "selected=''":"";?> >Gastroenterología</option>
                            <option value="Neurología" <?php echo (($con['especialidadMedica'])=='Neurología')? "selected=''":"";?> >Neurología</option>
                            <option value="Pediatría" <?php echo (($con['especialidadMedica'])=='Pediatría')? "selected=''":"";?> >Pediatría</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label for="fechaConsulta" class="mb-2 mt-3">Fecha:</label>
                        <input type="date" id="fechaConsulta" name="fechaConsulta" class="form-control" value="<?php echo $con['fechaConsulta'] ?>" >
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="mb-2 mt-2">Hora:</label>
                        <input type="time" id="horaConsulta" name="horaConsulta" class="form-control" value="<?php echo $con['horaConsulta']?>" >
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

<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Editar Consulta Medica</title>
            <meta author="LUIS BEDOYA JAIME">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>