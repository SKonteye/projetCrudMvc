<?php

require_once('../model/SalleDAOImpl.class.php');
require_once('../entities/Salle.class.php');
namespace Controllers;
use Entities\Salle;
class SalleController {
  private $dao;

  public function __construct($dao) {
    $this->dao = $dao;
  }

  public function index() {
    $salles = $this->dao->getAll();
    require('views/salle/index.php');
  }

  public function create() {
    $salle = new Salle();
    $salle->setNom($_POST['nom']);
    if ($this->dao->create($salle)) {
      header('Location: index.php');
    } else {
      echo 'Failed to create salle';
    }
  }

  public function edit($id) {
    $salle = $this->dao->getById($id);
    require('views/salle/edit.php');
  }

  public function update() {
    $salle = new Salle();
    $salle->setId($_POST['id']);
    $salle->setNom($_POST['nom']);
    if ($this->dao->update($salle)) {
      header('Location: index.php');
    } else {
      echo 'Failed to update salle';
    }
  }

  public function delete($id) {
    if ($this->dao->delete($id)) {
      header('Location: index.php');
    } else {
      echo 'Failed to delete salle';
    }
  }
}
