<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<style>
    #RolActivo {
        color: #17718F;
        font-size: 1.1rem;
        font-weight: 700;
        line-height: 2rem;
        text-decoration: underline;
        text-transform: uppercase;
        cursor: default;
        padding-right: 10px;
        padding-bottom: 0px;
        text-align: right;
    }

    .alert {
        left: 0;
        margin: auto;
        position: relative;
        right: 0;
        text-align: center;
        top: 1em;
        width: 67%;
        z-index: 1;

    }

    .nav-item{
        background-color: skyblue;
         color: black; 
         border-radius: 10px;
         margin: 5px;

    }
</style>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/68d69deff4.js" crossorigin="anonymous"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg barraNavegacion navbar-dark">
        <div class="container-fluid">

            <a class="navbar-brand logo fw-bold" style="color: black" href="#"> Centro Médico | MedicSur</a>

            <div>
                <?php
                if (!isset($_SESSION['rol'])) {
                ?>
                    <div class="d-inline-block d-lg-none d-xl-none d-xxl-none" id="login">
                        <a href="index.php?c=usuario&f=login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                    </div>
                <?php } else { ?>
                    <div class="d-inline-block d-lg-none d-xl-none d-xxl-none" id="logout">
                        <a href="index.php?c=usuario&f=cerrarSesion" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                <?php } ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu-lista">
                    <li class="nav-item menu" >

                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['rol']) || $_SESSION['rol'] == "MEDICO" || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "ADMINISTRADOR") {
                    ?>
                    
                        <li class="nav-item menu">
                        <a class="nav-link" href="index.php?c=medico.list.php&f=index">Medicos</a>
                     </li>

                     <li class="nav-item menu">
                            <a class="nav-link" href="index.php?c=producto&f=index">Productos</a>
                        </li>
                        
                    <li class="nav-item menu">
                            <a class="nav-link" href="index.php?c=Servicios&f=index">Servicios</a>
                        </li>

                    
                        <?php
                    }
                    if (isset($_SESSION['rol'])) {
                        if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO" || $_SESSION['rol'] == "CLIENTE") {
                        ?>
                           <li class="nav-item menu">
                            <a class="nav-link" href="index.php?c=consulta&f=index">Consulta</a>
                        </li>
                    
                        
                    <?php
                        }
                    }
                    ?>
                    
                    <?php
                    if (isset($_SESSION['rol'])) {
                        if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "MEDICO" ) {
                        ?>
                        <li class="nav-item menu">
                            <a class="nav-link" href="index.php?c=Cliente&f=index">Pacientes</a>

                        </li>

                    <?php
                        }
                    }
                    ?>                   

                 

                        <?php
                    
                    if (isset($_SESSION['rol'])) {
                        if ($_SESSION['rol'] == "ADMINISTRADOR") {
                        ?>
                            <li class="nav-item menu">
                                <a class="nav-link" href="index.php?c=usuario&f=index">Usuarios</a>
                            </li>

                    <?php
                        }
                    }

                    ?>


                </ul>
            </div>

            <?php
            if (!isset($_SESSION['rol'])) {
            ?>
                <div class="d-none d-lg-block d-xl-block d-xxl-block" id="login">
                    <a href="index.php?c=usuario&f=login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                </div>
            <?php } else { ?>
                <div class="d-none d-lg-block d-xl-block d-xxl-block" id="logout">
                    <a href="index.php?c=usuario&f=cerrarSesion" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </div>
            <?php } ?>

        </div>
    </nav>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['nombre']) && isset($_SESSION['apellido'])){
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
    }
    if (isset($_SESSION['rol'])) {
        $rol = $_SESSION['rol'];
        
    ?>
    

    <div class="container-fluid">
        <div class="row" id="RolActivo">
            <span>Bienvenido: <?php echo $nombre . " " . $apellido . " (".$rol.")"; ?></span>
        </div>
    </div>

    <?php
    }
    ?>

    <h1 class="title text-center">
        <?php echo isset($titulo) ? $titulo : ""; ?>
    </h1>

    <?php
    if (!empty($_SESSION['mensaje'])) {
    ?>
        <div class="mt-2 alert alert- <?php echo $_SESSION['color']; ?>
              alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['mensaje']; ?></strong>
        </div>
        <br><br>
    <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['color']);
    } 
    ?>