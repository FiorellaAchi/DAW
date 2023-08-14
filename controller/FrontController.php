<?php

require_once 'config/config.php';

class FrontController{
    public function ruteo()
    {
        // Lee el controlador
        $controlador = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : CONTROLADOR_PRINCIPAL;

        // Lee la función
        $funcion = (!empty($_REQUEST['f'])) ? htmlentities($_REQUEST['f']) : FUNCION_PRINCIPAL;



        if ($controlador == CONTROLADOR_PRINCIPAL) {

            $controlador = strtolower($controlador);

            require_once 'view/main/' . $controlador . '.php';
        } else {

            $controlador = strtolower($controlador);

            if (!isset($_SESSION)) {
                session_start();
            };

            if (!isset($_SESSION['rol'])) {

                if ($controlador == "producto" || $controlador == "servicios" || $funcion == "login" || $funcion == "validar" || $funcion == "searchAjax") {

                    if (strlen(stristr($funcion,'new')) == FALSE and strlen(stristr($funcion,'edit')) == FALSE and strlen(stristr($funcion,'delete')) == FALSE) {
                        self::llamarControlador($controlador, $funcion);
                    } else {
                        require_once 'view\main\main.noPermitido.php';
                    }

                } else {
                    require_once 'view\main\main.noPermitido.php';
                }

            } else {

                if ($_SESSION['rol'] == "ADMINISTRADOR") {
                    self::llamarControlador($controlador, $funcion);
                } elseif ($_SESSION['rol'] == "CLIENTE" and ($controlador == "servicios" || $controlador == "categoria" || $funcion == "cerrarSesion" || $funcion == "searchAjax")) {
                    self::llamarControlador($controlador, $funcion);
                } elseif ($_SESSION['rol'] == "MEDICO" and ($controlador == "cliente" || $controlador == "servicios" || $funcion == "cerrarSesion" || $funcion == "searchAjax")) {
                    self::llamarControlador($controlador, $funcion);                
                } else {
                    require_once 'view\main\main.noPermitido.php';
                }
            }
        }
    }

    

    public function llamarControlador($controlador, $funcion)
    {
        $controlador = ucwords($controlador) . "Controller";
        require_once 'controller/' . $controlador . '.php';

        $cont = new  $controlador(); // creacion del objeto controlador
        $cont->$funcion(); // llamada a la funcion del controlador
    }
}
