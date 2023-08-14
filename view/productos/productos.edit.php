<?php
    require_once HEADER;
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form  action="index.php?c=producto&f=edit" method="POST">
                <div class="row">

                    <div class="col-lg-6">
                        <label for="nombre" class="mb-2">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $prod['nombre']; ?>" placeholder="Nombre producto" autofocus="" />
                    </div>
                  
                    <div class="col-lg-6">
                        <label for="precio" class="mb-2">Precio</label>
                        <input type="Number" class="form-control" name="precio" id="precio" step=".01" value="<?php echo $prod['precio']; ?>"  />
                    </div>

                   
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?c=producto&f=index" class="btn btn-primary">Cancelar</a>
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
            <title>Editar Productos</title>
            <meta author="FIORELLA ACHI">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>


