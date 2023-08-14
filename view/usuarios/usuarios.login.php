<?php
    require_once HEADER;
    //LOGIN HECHO POR LUIS BEDOYA JAIME
?>

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form action="index.php?c=usuario&f=validar" method="POST">
                        <div class="row">
            
                            <div class="col-lg-12 mb-3">
                                <label for="usuario" class="mb-2">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre usuario" autofocus=""/>
                            </div>
            
                            <div class="col-lg-12">
                                <label for="password" class="mb-2">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña"/>
                            </div>

                            <?php
                            if(isset($mensajeError)) {
                            ?>
                            <div class="col-lg-12">
                                <i class="bi bi-exclamation-circle-fill text-danger"></i><span class="text-danger"><?php echo " " . $mensajeError; ?></span>
                            </div>
                            <?php
                            } 
                            ?>
            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3"></div>

    </div>
</div>

<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Login</title>
            <meta author="LUIS BEDOYA JAIME">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>

