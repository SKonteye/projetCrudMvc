<?php

namespace Model;
require_once '../DB.php';
use Entities\Etudiant;
class EtudiantDAOImpl implements IEtudiantDAO {
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getAll() {
    $sql = "SELECT * FROM etudiant";
    $result = mysqli_query($this->conn, $sql);
    $etudiants = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $etudiant = new Etudiant();
      $etudiant->setId($row['id']);
      $etudiant->setNom($row['nom']);
      $etudiant->setPrenom($row['prenom']);
      $etudiant->setClasse($row['classe']);
      $etudiant->setSalleId($row['salle_id']);
      $etudiants[] = $etudiant;
    }
    return $etudiants;
  }

  public function getById($id) {
    $sql = "SELECT * FROM etudiant WHERE id = $id";
    $result = mysqli_query($this->conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $etudiant = new Etudiant();
      $etudiant->setId($row['id']);
      $etudiant->setNom($row['nom']);
      $etudiant->setPrenom($row['prenom']);
      $etudiant->setClasse($row['classe']);
      $etudiant->setSalleId($row['salle_id']);
      return $etudiant;
    } else {
      return null;
    }
  }

  public function create($etudiant) {
    $nom = mysqli_real_escape_string($this->conn, $etudiant->getNom());
    $prenom = mysqli_real_escape_string($this->conn, $etudiant->getPrenom());
    $classe = mysqli_real_escape_string($this->conn, $etudiant->getClasse());
    $salle_id = mysqli_real_escape_string($this->conn, $etudiant->getSalleId());
    $sql = "INSERT INTO etudiant (nom, prenom, classe, salle_id) VALUES ('$nom', '$prenom', '$classe', $salle_id)";
    $result = mysqli_query($this->conn, $sql);
    if ($result) {
      $etudiant->setId(mysqli_insert_id($this->conn));
      return true;
    } else {
      return false;
    }
  }

  public function update($etudiant) {
    $id = mysqli_real_escape_string($this->conn, $etudiant->getId());
    $nom = mysqli_real_escape_string($this->conn, $etudiant->getNom());
    $prenom = mysqli_real_escape_string($this->conn, $etudiant->getPrenom());
    $classe = mysqli_real_escape_string($this->conn, $etudiant->getClasse());
    $salle_id = mysqli_real_escape_string($this->conn, $etudiant->getSalleId());
    $sql = "UPDATE etudiant 
            SET nom = '$nom', prenom = '$prenom', classe = '$classe', salle_id = $salle_id 
            WHERE id = $id";
    $result = mysqli_query($this->conn, $sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM etudiant WHERE id = $id";
    $result = mysqli_query($this->conn, $sql);
        if ($result) {
          return true;
        } else {
          return false;
        }
      }
  }