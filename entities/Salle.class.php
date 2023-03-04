<?php
namespace Entities;
class Salle {
    private $id;
    private $nom;
  
    public function __construct()
    {
        $num = func_num_args();
        $args= func_get_args();
        switch ($num) {
            case 0:
                $this->constructeurSansArgument();
                break;
            
            case 5:
                $this->constructeurAvecArgument($args[0],$args[1]);
                break;
        }
    }
    function constructeurSansArgument() {
    }
    function constructeurAvecArgument($id,$nom){
        $this->id = $id;
        $this->nom = $nom;
    }
  
    public function getId() {
      return $this->id;
    }
  
    public function getNom() {
      return $this->nom;
    }
  
    public function setId($id) {
        $this->id = $id;
      }
    public function setNom($nom) {
    $this->nom = $nom;
    }
}  