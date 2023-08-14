<?php
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?c=usuario&f=edit" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo $user['idUsuario'] ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nombre" class="mb-2">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $user['nombre'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="apellido" class="mb-2">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $user['apellido'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="nombreUsuario" class="mb-2">Nombre de usuario</label>
                        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" value="<?php echo $user['nombreUsuario'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="contra" class="mb-2">Contraseña</label>
                        <input type="password" class="form-control" name="contra" id="contra" value="<?php echo $user['password'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="rol" class="mb-2">Rol</label>
                        <select name="rol" id="rol" class="form-select">
                            <option value="0">Seleccione un rol</option>
                            <option value="Administrador" <?php echo(($user['nombreRol'])=='Administrador')? "selected=''":"";  ?> >Administrador</option>
                            <option value="Cliente"<?php echo (($user['nombreRol'])=='Cliente')? "selected=''":""; ?> >Cliente</option>
                            <option value="Medico" <?php echo (($user['nombreRol'])=='Medico')? "selected=''":""; ?> >Medico</option>
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