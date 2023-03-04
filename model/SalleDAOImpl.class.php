<?php
namespace Model;
require_once '../DB.php';
use Entities\Salle;

    class SalleDAOImpl implements ISalleDAO {
      private $conn;
    
      public function __construct($conn) {
        $this->conn = $conn;
      }
    
      public function getAll() {
        $sql = "SELECT * FROM salle";
        $result = mysqli_query($this->conn, $sql);
        $salles = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $salle = new Salle();
          $salle->setId($row['id']);
          $salle->setNom($row['nom']);
          $salles[] = $salle;
        }
        return $salles;
      }
    
      public function getById($id) {
        $sql = "SELECT * FROM salle WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $salle = new Salle();
          $salle->setId($row['id']);
          $salle->setNom($row['nom']);
          return $salle;
        } else {
          return null;
        }
      }
    
      public function create($salle) {
        $nom = mysqli_real_escape_string($this->conn, $salle->getNom());
        $sql = "INSERT INTO salle (nom) VALUES ('$nom')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
          $salle->setId(mysqli_insert_id($this->conn));
          return true;
        } else {
          return false;
        }
      }
    
      public function update($salle) {
        $id = mysqli_real_escape_string($this->conn, $salle->getId());
        $nom = mysqli_real_escape_string($this->conn, $salle->getNom());
        $sql = "UPDATE salle SET nom = '$nom' WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
          return true;
        } else {
          return false;
        }
      }
    
      public function delete($id) {
        $sql = "DELETE FROM salle WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
          return true;
        } else {
          return false;
        }
      }
    }