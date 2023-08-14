<?php require_once HEADER; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <h4 class="me-2">Buscar: </h4>
            <input type="text" name="busquedaAjax" id="busquedaAjax" placeholder="Buscar servicio inactivo"
                class="px-2" />
        </div>
        <div class="col-sm-6  d-flex justify-content-end">
            <?php 
            if(isset($_SESSION['rol'])) {
             ?>
            <a href="index.php?c=servicios&f=index">
                <button type="button" class="btn btn-primary">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    Regresar</button>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered border-secondary">
            <thead class="table-dark text-center">
                <th>ID</th>
                <th>Nombre </th>
                <th>Tipo </th>
                <th>Descripcion </th>
                <th>Precio </th>
                <?php 
                if(isset($_SESSION['rol'])) {
                ?>
                <th>Acciones </th>
                <?php } ?>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td class="text-center"><?php echo $fila['serv_id'];?></td>
                    <td><?php echo $fila['serv_nombre'];?></td>
                    <td><?php echo $fila['serv_tipo'];?></td>
                    <td><?php echo $fila['serv_descripcion'];?></td>
                    <td><?php echo $fila['serv_precio'];?></td>
                    <?php 
                    if(isset($_SESSION['rol'])) {
                    ?>
                    <td class="text-center">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?php echo  $fila['serv_id']; ?>">
                        <i class='fa-sharp fa-solid fa-recycle'></i>
                        </button>
                    </td>

                    <?php } ?>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>

</div>
<?php 
foreach ($resultados as $modal) {
?>
<div class="modal fade" id="exampleModal<?php echo $modal['serv_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de devolver este servicio?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary"
                    href="index.php?c=servicios&f=devolver&id=<?php echo $modal['serv_id']; ?>">Devolver</a>
            </div>
        </div>
    </div>
</div>
<?php }?>

<script type="text/javascript">
var txtBuscar = document.querySelector("#busquedaAjax");
txtBuscar.addEventListener('keyup', cargarServicios);

function cargarServicios() {
    // leer paramteros
    var bus = txtBuscar.value;
    // realizar la peticion
    var url = "index.php?c=servicios&f=searchAjaxIn&b=" + bus;
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
    var tbody = document.querySelector('.tabladatos');
    var servicios = JSON.parse(respuesta);
    console.log(servicios);
    resultados = '';
    for (var i = 0; i < servicios.length; i++) {
        resultados += '<tr>';
        resultados += "<td class='text-center'>" + servicios[i].serv_id; + '</td>';
        resultados += '<td>' + servicios[i].serv_nombre + '</td>';
        resultados += '<td>' + servicios[i].serv_tipo + '</td>';
        resultados += '<td>' + servicios[i].serv_descripcion + '</td>';
        resultados += '<td>' + servicios[i].serv_precio + '</td>';
        resultados += "<td class='text-center'>" +
            "<a href='index.php?c=servicios&a=devolver&id=" + servicios[i].serv_id +
            "' " + "class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal" + 
            servicios[i].serv_id+ "'>" + " <i class='fa-sharp fa-solid fa-recycle'></i></a>" 
            + '</td>';
        resultados += '</tr>';
    }
    
    tbody.innerHTML = resultados;

}
</script>


<?php  require_once FOOTER ?>