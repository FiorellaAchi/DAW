<?php
//LUIS BEDOYA JAIME


require_once 'config/conexion.php';
require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/Usuario.php';

class UsuarioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro){
        $sql = "SELECT * FROM usuario where 
        (nombre like :b1 or apellido like :b2 or nombreUsuario like :b3 or nombreRol like :b4)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike, 'b3' => $conlike, 'b4' => $conlike);
        $stmt -> execute($data);
        $resultados = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function selectOne($id){
        $sql = "SELECT * FROM usuario where idUsuario=:id";
        $stmt = $this -> con -> prepare($sql);
        $data = ['id' => $id];
        $stmt -> execute($data);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $usuario;
    }


    public function validarUsuario($usuario, $contra)
    {
        // sql de la sentencia
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = :usuario and password = :contra";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = array('usuario' => $usuario, 'contra' => $contra);
        // ejecutar la sentencia
        $stmt->execute($data);
        //recuperar  resultados
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }

    public function insert($usuario){
        try{
            $sql = "INSERT INTO  usuario (nombre , apellido, nombreUsuario,  password, nombreRol) VALUES (:nom, :ape, :nomUsu, :contra, :rol)";
            $query = $this -> con -> prepare($sql);
            $data = [
                'nom' => $usuario -> getNombre(),
                'ape' => $usuario -> getApellido(),
                'nomUsu' => $usuario -> getNombreUsuario(),
                'contra' => $usuario -> getPassword(),
                'rol'=> $usuario -> getRol()
            ];
            $query -> execute($data);
            if($query -> rowCount() <= 0 ){
                return false;
            } 
        } catch(Exception $ex){
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }

    public function existeUsuario($usuario){
        $sql = "SELECT * FROM usuario where nombreUsuario = :usuario";
        $stmt = $this->con->prepare($sql);
        $data = array('usuario' => $usuario);
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultados;
    }

    public function update($usuario){
        try{
            $sql = "UPDATE `usuario` SET `nombre`=:nom ,`apellido`=:ape,`nombreUsuario`=:nomUsu,`password`=:contra,`nombreRol`=:rol 
            WHERE idUsuario=:id";
            $query = $this -> con -> prepare($sql);
            $data = [
                'id' => $usuario -> getId(),
                'nom' => $usuario -> getNombre(),
                'ape' => $usuario -> getApellido(),
                'nomUsu' => $usuario -> getNombreUsuario(),
                'contra' => $usuario -> getPassword(),
                'rol'=> $usuario -> getRol()
            ];
            $query -> execute($data);
            if($query -> rowCount() <= 0){
                return false;
            }
        } catch(Exception $ex){
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }

    public function delete($usuario){
        try{
            $sql = "DELETE FROM usuario WHERE idUsuario = :id";
            $query = $this -> con -> prepare($sql);
            $data = [
                'id' => $usuario -> getId()
            ];
            $query -> execute($data);
            if($query -> rowCount() <= 0){
                return false;
            }
        } catch(Exception $ex){
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }
}
