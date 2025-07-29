<?php

namespace Model;

use PDO;
use PDOException;
use Model\Connection;

class Notes {
    private $db;

    public function __construct() {
        $this->db = Connection::getInstance();
    }

    public function createMedia($note1, $note2, $note3, $min_note, $result) {
        try {
            $sql = "INSERT INTO notes (note1, note2, note3, min_note, result) 
            VALUES (:note1, :note2, :note3, :min_note, :result)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":note1", $note1, PDO::PARAM_STR);
            $stmt->bindParam(":note2", $note2, PDO::PARAM_STR);
            $stmt->bindParam(":note3", $note3, PDO::PARAM_STR);
            $stmt->bindParam(":min_note", $min_note, PDO::PARAM_INT);
            $stmt->bindParam(":result", $result, PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $error) {
            echo "Erro ao criar média: " . $error->getMessage();
            return false;
        }
    }
}

?>