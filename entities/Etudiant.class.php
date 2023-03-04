<?php
namespace Entities;

class Etudiant {
    private $id;
    private $nom;
    private $prenom;
    private $classe;
    private $salle_id;
  
    public function __construct()
    {
        $num = func_num_args();
        $args= func_get_args();
        switch ($num) {
            case 0:
                $this->constructeurSansArgument();
                break;
            
            case 5:
                $this->constructeurAvecArgument($args[0],$args[1],$args[2],$args[3],$args[4]);
                break;
        }
    }
    function constructeurSansArgument() {

    }
    function constructeurAvecArgument($nom, $prenom, $classe, $salle_id) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->classe = $classe;
        $this->salle_id = $salle_id;
      }
  
    public function getId() {
      return $this->id;
    }
    public function setid($id) {
        $this->id = $id;
      }
  
    public function getNom() {
      return $this->nom;
    }
  
    public function setNom($nom) {
      $this->nom = $nom;
    }
  
    public function getPrenom() {
      return $this->prenom;
    }
  
    public function setPrenom($prenom) {
      $this->prenom = $prenom;
    }
  
    public function getClasse() {
      return $this->classe;
    }
  
    public function setClasse($classe) {
      $this->classe = $classe;
    }
  
    public function getSalleId() {
      return $this->salle_id;
    }
  
    public function setSalleId($salle_id) {
      $this->salle_id = $salle_id;
    }
  
}