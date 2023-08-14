<?php require_once HEADER; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <h4 class="me-2">Buscar: </h4>
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar producto" class="px-2" />

        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <?php
            if (isset($_SESSION['rol'])) {
            ?>
                <a href="index.php?c=producto&f=view_new">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Nuevo</button>
                </a>
            <?php } ?>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered border-secondary">
            <thead class="table-dark text-center">
                <th>ID</th>
                <th>NOMBRE</th>
                
                <th>PRECIO</th>
                <?php
                if (isset($_SESSION['rol'])) {
                ?>
                    <th>Acciones</th>
                <?php } ?>
            </thead>

            <tbody class="datos-tabla">
                <?php
                foreach ($resultados as $fila) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
          
                        <td><?php echo $fila['precio']; ?></td>
                        <?php
                        if (isset($_SESSION['rol'])) {
                        ?>
                        <?php } ?>
                        <?php
                        if (isset($_SESSION['rol'])) {
                        ?>
                            <td class="text-center">
                                <a class="me-1 btn btn-primary" href="index.php?c=producto&f=view_edit&id=<?php echo  $fila['id']; ?>">
                                    <i class="fas fa-marker"></i></a>
                                <a class="btn btn-danger" 
                                  onclick="if(!confirm('¿Está seguro de eliminar este producto?'))return false;" 
                                       href="index.php?c=producto&f=delete&id=<?php echo  $fila['id']; ?>">
                                         <i class="fas fa-trash-alt"></i></a>
                            </td>
                        <?php } ?>



                    </tr>



                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
foreach ($resultados as $modal) {
?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo $modal['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de eliminar este producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a class="btn btn-primary" href="index.php?c=producto&f=delete&id=<?php echo $modal['id']; ?>">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $rol_valor = (isset($_SESSION['rol'])) ? $_SESSION['rol'] : ''; ?>

<script type="text/javascript">
    var txtBuscar = document.querySelector("#busquedaAjax");
    txtBuscar.addEventListener('keyup', cargarProductos);
    var rol = '<?php echo $rol_valor; ?>';

    function cargarProductos() {
        // leer paramteros
        var bus = txtBuscar.value;
        // realizar la peticion
        var url = "index.php?c=producto&f=searchAjax&b=" + bus;
        var xmlh = new XMLHttpRequest();
        xmlh.open("GET", url, true);
        xmlh.send();
        // lectura de respuesta
        xmlh.onreadystatechange = function() {
            if (xmlh.readyState === 4 && xmlh.status === 200) {
                var respuesta = xmlh.responseText;
                actualizar(respuesta); //actualizar cierta parte de la pagina
            }
        };
    }

    function actualizar(respuesta) {
        // elemento a actualizar
        var tbody = document.querySelector('.datos-tabla');
        var productos = JSON.parse(respuesta);
        console.log(productos);
        resultados = '';
        for (var i = 0; i < productos.length; i++) {
            resultados += '<tr>';
            resultados += '<td>' + productos[i].id; + '</td>';
            resultados += '<td>' + productos[i].nombre + '</td>';
            resultados += '<td>' + productos[i].precio + '</td>';
            if (rol != '') {
                resultados += '<td>' +
                    "<a class='me-1 btn btn-primary' href='index.php?c=producto&f=view_edit&id=" + productos[i].id + "'>" +
                    "<i class='fas fa-marker'></i>" +
                    "</a>" +
                    "<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal" + productos[i].id + "'>" +
                    "<i class='fas fa-trash-alt'></i>" +
                    "</button>" + '</td>';
            }
            resultados += '</tr>';
        }
        tbody.innerHTML = resultados;

    }
</script>

<?php require_once FOOTER; ?>

<!DOCTYPE html>
<html lang="en">
    <html meta="utf-8">
        <head>
            <title>Listar Productos</title>
            <meta author="FIORELLA ACHI">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
</html>
