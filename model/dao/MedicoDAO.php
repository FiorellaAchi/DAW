<?php 
require_once 'config/Conexion.php';
require_once 'model/dto/Medico.php';

class MedicoDAO
{
    private $con;
    public function __construct()
    {
        $this -> con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "SELECT * FROM medicos where Nombres like :b1";
        $stmt = $this -> con -> prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike);
        $stmt -> execute($data);
        $resultados = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * FROM medicos where ID=:id";
        $stmt = $this -> con -> prepare($sql);
        $data = ['id' => $id];
        $stmt -> execute($data);
        $medico = $stmt -> fetch(PDO::FETCH_ASSOC);

        return $medico;
    }

    public function insert($med)
    {
        try
        {
            $sql = "INSERT INTO medicos (Cedula, Nombres, Apellidos, Edad, Especialidad, Correo, Numero_Telefono) 
             VALUES (:Cedula, :Nombres, :Apellidos, :Edad, :Especialidad, :Correo, :Numero_Telefono)";

            $query = $this -> con -> prepare($sql);
            $data = [
                'Cedula' => $med -> getCedula(),
                'Nombres' => $med -> getNombres(),
                'Apellidos' => $med -> getApellidos(),
                'Edad' => $med -> getEdad(),
                'Especialidad' => $med -> getEspecialidad(),
                'Correo' => $med -> getCorreo(),
                'Numero_Telefono' => $med -> getNumero_Telefono()
            ];
            $query -> execute($data);
            if ($query->rowCount() > 0) {
                return true; 
            }
        } catch(Exception $ex)
        {
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }

    public function update($medico)
    {
        try {
            $sql = "UPDATE medicos SET Cedula=:Cedula, Nombres=:Nombres, Apellidos=:Apellidos, Edad=:Edad, Especialidad=:Especialidad,
                    Correo=:Correo, Numero_Telefono=:Numero_Telefono WHERE ID=:ID";
            $query = $this->con->prepare($sql);
            $data = [
                'ID' => $medico->getID(),
                'Cedula' => $medico->getCedula(),
                'Nombres' => $medico->getNombres(),
                'Apellidos' => $medico->getApellidos(),
                'Edad' => $medico->getEdad(),
                'Especialidad' => $medico->getEspecialidad(),
                'Correo' => $medico->getCorreo(),
                'Numero_Telefono' => $medico->getNumero_Telefono()
            ];
            $query->execute($data);
    
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM medicos WHERE ID=:ID";
            $query = $this->con->prepare($sql);
            $data = [
                'ID' => $id->getID()
            ];
            $query->execute($data);
            if ($query->rowCount() <= 0) {
                return true;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;

    }



 
}
?>