<?php
/*
require_once ('../core/config.php');
require_once ('../Models/PesonaModel.php');
*/
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/Models/CalificacionModel.php';
require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/config.php';

class CalificacionController {
    private $CalificacionModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this-> CalificacionModel = new CalificacionModel($this->conn);
    }

    public function agregarCalificacion($data) {
        $calificaciones = $data['calificacion'];
        $porcentajes = $data['porcentaje'];
        
        

        if ($this->CalificacionModel->insertData($calificaciones,$porcentajes)){
            echo "Datos agregados";
            header("Location: ../views/Calificacion.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al insertar datos";
        }
        
    }

    public function actualizarCalificacion($data) {
        $idcalificacion = $data['idcalificacion'];
        $calificaciones = $data['calificacion'];
        $porcentajes = $data['porcentaje'];
       
    

        if ($this->CalificacionModel->updateData($idcalificacion, $calificaciones,$porcentajes)) {
            echo "Datos actualizados";
            header("Location: ../views/Calificacion.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al actualizar datos";
        }
    }

    public function eliminarCalificacion($idcalificacion) {
        if ($this->CalificacionModel->deleteData($idcalificacion)) {
            echo "Registro eliminado";
            header("Location: ../views/Calificacion.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al eliminar registro";
        }
    }

    public function obtenerCalificaciones() {
        return $this->CalificacionModel->getAllData();
    }
}

$calificaciones = new CalificacionController($conn);
if (isset($_POST['agregar'])) {
    $calificaciones->agregarCalificacion($_POST);
} else if (isset($_POST['actualizar'])) {
    $calificaciones->actualizarCalificacion($_POST);
} else if (isset($_POST['eliminar'])) {
    $idcalificacion = $_POST['idcalificacion']; // Reemplaza 'idpersona' con la clave correcta en $_POST
    $calificaciones->eliminarCalificacion($idcalificacion);
}

