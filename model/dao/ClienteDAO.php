<?php 
    require_once 'model/dto/Cliente.php';
    require_once 'config/Conexion.php';

    //FIORELLA ACHI LIMONES
    class ClienteDAO
    {
        private $con;

        public function __construct()
        {
            $this->con = Conexion::getConexion();
        }

        public function selectAll($parametro)
        {
            $sql = "SELECT * FROM pacientes where nombre like :b1";
            $stmt = $this->con->prepare($sql);
            $conlike = '%' . $parametro . '%';
            $data = array('b1' => $conlike);
            $stmt->execute($data);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;
        }

        public function selectOne($id)
        {
            $sql = "SELECT * FROM pacientes where idPaciente=:id";
            $stmt = $this->con->prepare($sql);
            $data = ['id' => $id];
            $stmt->execute($data);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

            return $cliente;
        }

        public function insert($cliente)
        {
            try {
                $sql = "INSERT INTO pacientes (nombre, cedula, edad, genero, correo, direccion, telefono, apellidos) 
                VALUES (:nombre, :cedula, :edad, :genero, :correo, :direccion, :telefono, :apellidos)";
                $query = $this->con->prepare($sql);
                $data = [
                    'nombre' => $cliente->getNombre(),
                    'cedula' => $cliente->getCedula(),
                    'edad' => $cliente->getEdad(),
                    'genero' => $cliente->getGenero(),
                    'correo' => $cliente->getCorreo(),
                    'direccion' => $cliente->getDireccion(),
                    'telefono' => $cliente->getTelefono(),
                    'apellidos' => $cliente->getApellidos()
                ];
                $query->execute($data);
                if ($query->rowCount() >= 0) {
                    return false;
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return false;
            }
            return true;
        }

        public function update($cli)
        {
            try {
                $sql = "UPDATE pacientes SET nombre=:nombre, cedula=:cedula, edad=:edad, genero=:genero, 
                correo=:correo, direccion=:direccion, telefono=:telefono, apellidos=:apellidos WHERE idPaciente=:idPaciente";
                $query = $this->con->prepare($sql);
                $data = [
                    'idPaciente' => $cli->getIdCliente(),
                    'nombre' => $cli->getNombre(),
                    'cedula' => $cli->getCedula(),
                    'edad' => $cli->getEdad(),
                    'genero' => $cli->getGenero(),
                    'correo' => $cli->getCorreo(),
                    'direccion' => $cli->getDireccion(),
                    'telefono' => $cli->getTelefono(),
                    'apellidos' => $cli->getApellidos()
                ];
                $query->execute($data);
                if ($query->rowCount() < 0) {
                    return false;
                }
            }  catch (Exception $ex) {
                throw new Exception("Error al actualizar el cliente: " . $ex->getMessage());
            }
            return true;
        }


        
        public function delete($id)
        {
            try {
                $sql = "DELETE FROM pacientes WHERE idPaciente=:idPaciente";
                $query = $this->con->prepare($sql);
                $data = [
                    'idPaciente' => $id
                ];
                $query->execute($data);
                if ($query->rowCount() > 0) {
                    return true;
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return false;
            }
            return false;
        }
        
    }
?>
