<?php 
//FIORELLA ACHI
require_once 'config/conexion.php';
require_once 'model/dto/Producto.php';


class ProductoDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        $sql = "SELECT * FROM productos WHERE nombre LIKE :b1";
        
        $stmt = $this->con->prepare($sql);
        
        // Preparar la sentencia
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike);        
        // Ejecutar la sentencia
        $stmt->execute($data);        
        // Recuperar resultados
        $respuestas = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        // Retornar resultados
        return $respuestas;
    }
    
    

    public function insert($producto) {
        try {
            $sql = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";
    
            
            $query = $this->con->prepare($sql);
            $data = [
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio()
            ];
            
            $query->execute($data);
            
            if ($query->rowCount() <= 0) { // Verificar si se insertó
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    
        return true;
    }
    

    public function selectOne($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    }
    

    public function update($producto) {
        try {
            $sql = "UPDATE `productos` SET `nombre`=:nom, `precio`=:precio WHERE id=:id";
            $query = $this->con->prepare($sql);
            $data = [
                'id' => $producto->getId(),
                'nom' => $producto->getNombre(),
                'precio' => $producto->getPrecio()
            ];
            $query->execute($data);

            if ($query->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }
    
    
    
    

    public function delete($id) {
        try {
            // Preparar
            $sql = "DELETE FROM productos WHERE id=:id";
            $query = $this->con->prepare($sql);
            
            // Datos
            $data = [
                'id' => $id->getId()
            ];
            
            // Ejecutar
            $query->execute($data);
            
            if ($query->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        
        return true;
    }
    
}