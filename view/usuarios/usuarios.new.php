<?php
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form onsubmit="return validar()" action="index.php?c=usuario&f=new" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="mb-2">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" autofocus="" />
                    </div>

                    <div class="col-lg-6">
                        <label for="apellido" class="mb-2">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" />
                    </div>

                    <div class="col-lg-6">
                        <label for="email" class="mb-2 mt-3">Nombre de usuario</label>
                        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre de usuario" />
                    </div>

                    <div class="col-lg-6">
                        <label for="contra" class="mb-2 mt-3">Contraseña</label>
                        <input type="password" class="form-control" name="contra" id="contra" placeholder="Contraseña" />
                    </div>

                    <div class="col-lg-6">
                        <label for="rol" class="mb-2 mt-3">Rol</label>
                        <select name="rol" id="rol" class="form-select">
                            <option value="0">Seleccione un rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Medico">Medico</option>
                            <option value="Cliente">Cliente</option>
                        </select>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=usuario&f=index" class="btn btn-primary">Cancelar</a>
                    </div>

                </div>
                    
            </form>
        </div>
    </div>
</div>