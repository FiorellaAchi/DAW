<?php require_once HEADER; ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=servicios&f=new" method="POST" id="formulario">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre">Nombre del servicio</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    
                    <div class="col-lg-12">
                        <label for="descripcion">Descripcion</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"
                            placeholder="Introducir descripción" rows="2"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label for="medico">Nombre del medico</label>
                        <input type="text" name="medico" id="medico" class="form-control">
                        <br>
                    </div>
                    <div class="col-lg-6">
                        <label for="paciente">Nombre del paciente</label>
                        <input type="text" name="paciente" id="paciente" class="form-control">
                        <br>
                    </div>
                    <div class="col-lg-6">
                        <label for="consulta">Nombre de la consulta</label>
                        <input type="text" name="consulta" id="consulta" class="form-control">
                        <br>
                    <div class="form-group mx-auto">
                        <button name="enviar" value="Enviar" id="button" class="btn btn-primary">Guardar</button>

                        <a href="index.php?c=servicios&f=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


