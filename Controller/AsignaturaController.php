<?php
/*
require_once ('../core/config.php');
require_once ('../Models/PesonaModel.php');
*/
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/Models/AsignaturaModel.php';
require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/config.php';

class AsignaturaController {
    private $AsignaturaModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this-> AsignaturaModel = new AsignaturadModel($this->conn);
    }

    public function agregarAsignatura($data) {
        $nombres = $data['nombre'];
        $descripciones = $data['descripcion'];
        $facultades = $data['facultad'];
        

        if ($this->AsignaturaModel->insertData($nombres,$descripciones,$facultades)){
            echo "Datos agregados";
            header("Location: ../views/Asignatura.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al insertar datos";
        }
        
    }

    public function actualizarAsignatura($data) {
        $idasignatura = $data['idasignatura'];
        $nombres = $data['nombre'];
        $descripciones = $data['descripcion'];
        $facultades = $data['facultad'];
    

        if ($this->AsignaturaModel->updateData($idasignatura, $nombres,$descripciones,$facultades)) {
            echo "Datos actualizados";
            header("Location: ../views/Asignatura.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al actualizar datos";
        }
    }

    public function eliminarAsignatura($idasignatura) {
        if ($this->AsignaturaModel->deleteData($idasignatura)) {
            echo "Registro eliminado";
            header("Location: ../views/Asignatura.php");
            exit; // Asegura que el script se detenga después de redireccionar
        } else {
            echo "Error al eliminar registro";
        }
    }

    public function obtenerAsignaturas() {
        return $this->AsignaturaModel->getAllData();
    }
}

$asignatura = new AsignaturaController($conn);
if (isset($_POST['agregar'])) {
    $asignatura->agregarAsignatura($_POST);
} else if (isset($_POST['actualizar'])) {
    $asignatura->actualizarAsignatura($_POST);
} else if (isset($_POST['eliminar'])) {
    $idasignatura = $_POST['idasignatura']; // Reemplaza 'idpersona' con la clave correcta en $_POST
    $asignatura->eliminarAsignatura($idasignatura);
}

?>

