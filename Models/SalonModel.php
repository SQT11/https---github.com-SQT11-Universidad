<?php
class SalonModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertData($nombres, $cantidades) {
        $query = "INSERT INTO salon (sal_nombre, sal_cantidad)
                  VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$nombres, $cantidades);

        return $stmt->execute();
    }

    public function updateData($idsalon, $nombres, $cantidades) {
        $query = "UPDATE salon
                  SET sal_nombre = ?, sal_cantidad = ?
                  WHERE sal_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nombres,$cantidades ,$idsalon);

        return $stmt->execute();
    }

    public function deleteData($idsalon) {
        // //Eliminar las filas relacionadas en la tabla "calificacion"
        // $query = "DELETE FROM calificacion WHERE asig_id = ?";
        // $stmt = $this->conn->prepare($query);
        // $stmt->bind_param("i", $idasignatura);
        // $stmt->execute();

        // Eliminar la fila en la tabla "asignatura"
        $query = "DELETE FROM salon WHERE sal_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idsalon);
        return $stmt->execute();
    }

    public function getAllData() {
        $query = "SELECT * FROM salon";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
?>
