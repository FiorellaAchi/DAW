<?php
require_once 'config.php';
class Conexion{
    public static function getConexion(){
        $con = 'mysql:host=localhost;port=3306;dbname=' . DBNAME;
        $conexion = null;

        try{
            $conexion = new PDO($con, DBUSER,DBPASSWORD);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $ex){
            echo $ex;
            die("Error " . $ex->getMessage());
        }
        return $conexion;
    }
}
?>