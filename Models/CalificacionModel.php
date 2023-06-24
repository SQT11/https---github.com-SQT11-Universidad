<?php
class CalificacionModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertData($calificaciones, $porcentajes) {
        $query = "INSERT INTO calificacion(cal_calificacion, cal_porcentaje)
                  VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$calificaciones, $porcentajes);

        return $stmt->execute();
    }

    public function updateData($idcalificacion, $calificaciones, $porcentajes) {
        $query = "UPDATE calificacion
                  SET cal_calificacion = ?, cal_porcentaje = ?
                  WHERE cal_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi",  $calificaciones, $porcentajes,$idcalificacion);

        return $stmt->execute();
    }

    public function deleteData($idcalificacion) {
        // //Eliminar las filas relacionadas en la tabla "calificacion"
        // $query = "DELETE FROM calificacion WHERE asig_id = ?";
        // $stmt = $this->conn->prepare($query);
        // $stmt->bind_param("i", $idasignatura);
        // $stmt->execute();

        // Eliminar la fila en la tabla "asignatura"
        $query = "DELETE FROM calificacion WHERE cal_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idcalificacion);
        return $stmt->execute();
    }

    public function getAllData() {
        $query = "SELECT * FROM calificacion";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
?>
