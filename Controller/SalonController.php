<?php
/*
require_once ('../core/config.php');
require_once ('../Models/PesonaModel.php');
*/
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/Models/SalonModel.php';
require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/config.php';

class SalonController {
    private $SalonModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this-> SalonModel = new SalonModel($this->conn);
    }

    public function agregarSalon($data) {
        $nombres = $data['nombre'];
        $Cantidades = $data['cantidad'];
        
        

        if ($this->SalonModel->insertData($nombres,$Cantidades)){
            echo "Datos agregados";
            header("Location: ../views/Salon.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al insertar datos";
        }
        
    }

    public function actualizarSalon($data) {
        $idsalon = $data['idsalon'];
        $nombres = $data['nombre'];
        $cantidades = $data['cantidad'];
       
    

        if ($this->SalonModel->updateData($idsalon, $nombres,$cantidades)) {
            echo "Datos actualizados";
            header("Location: ../views/Salon.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al actualizar datos";
        }
    }

    public function eliminarSalon($idsalon) {
        if ($this->SalonModel->deleteData($idsalon)) {
            echo "Registro eliminado";
            header("Location: ../views/Salon.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al eliminar registro";
        }
    }

    public function obtenerSalones() {
        return $this->SalonModel->getAllData();
    }
}

$salones = new SalonController($conn);
if (isset($_POST['agregar'])) {
    $salones->agregarSalon($_POST);
} else if (isset($_POST['actualizar'])) {
    $salones->actualizarSalon($_POST);
} else if (isset($_POST['eliminar'])) {
    $idsalon = $_POST['idsalon']; // Reemplaza 'idpersona' con la clave correcta en $_POST
    $salones->eliminarSalon($idsalon);
}

?>

