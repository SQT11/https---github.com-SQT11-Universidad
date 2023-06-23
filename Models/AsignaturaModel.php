<?php
class AsignaturadModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertData($nombres, $descripciones,$facultades) {
        $query = "INSERT INTO asignatura (asig_nombre, asig_descripcion, asig_facultad)
                  VALUES (?, ?, ? )";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss",$nombres, $descripciones,$facultades);

        return $stmt->execute();
    }

    public function updateData($idasignatura, $nombres, $descripciones,$facultades) {
        $query = "UPDATE asignatura
                  SET asig_nombre = ?, asig_descripcion = ?, asig_facultad = ?
                  WHERE asig_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $nombres,$descripciones, $facultades, $idasignatura);

        return $stmt->execute();
    }

    public function deleteData($idasignatura) {
        //Eliminar las filas relacionadas en la tabla "calificacion"
        $query = "DELETE FROM calificacion WHERE asig_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idasignatura);
        $stmt->execute();

        // Eliminar la fila en la tabla "asignatura"
        $query = "DELETE FROM asignatura WHERE asig_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idasignatura);
        return $stmt->execute();
    }

    public function getAllData() {
        $query = "SELECT * FROM asignatura";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
?>
