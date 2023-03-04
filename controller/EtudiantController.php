<?php

namespace Controllers;
//require_once('../model/EtudiantDAOImpl.class.php');
//require_once('../model/SalleDAOImpl.class.php');
use Entities\Etudiant;
use Model\EtudiantDAOImpl;
use Model\SalleDAOImpl;
class EtudiantController {
  private $dao;

  public function __construct($dao) {
    $this->dao = $dao;
  }

  public function index() {
    $etudiants = $this->dao->getAll();
    include('views/etudiant/index.php');
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $etudiant = new Etudiant();
      $etudiant->setNom($_POST['nom']);
      $etudiant->setPrenom($_POST['prenom']);
      $etudiant->setClasse($_POST['classe']);
      $etudiant->setSalleId($_POST['salle_id']);
      $result = $this->dao->create($etudiant);
      if ($result) {
        header('Location: index.php?action=index');
      } else {
        echo "Error creating etudiant.";
      }
    } else {
      include('views/etudiant/create.php');
    }
  }

  public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $etudiant = new Etudiant();
      $etudiant->setId($id);
      $etudiant->setNom($_POST['nom']);
      $etudiant->setPrenom($_POST['prenom']);
      $etudiant->setClasse($_POST['classe']);
      $etudiant->setSalleId($_POST['salle_id']);
      $result = $this->dao->update($etudiant);
      if ($result) {
        header('Location: index.php?action=index');
      } else {
        echo "Error updating etudiant.";
      }
    } else {
      $etudiant = $this->dao->getById($id);
      include('views/etudiant/edit.php');
    }
  }

  public function delete($id) {
    $result = $this->dao->delete($id);
    if ($result) {
      header('Location: index.php?action=index');
    } else {
      echo "Error deleting etudiant.";
    }
  }
}