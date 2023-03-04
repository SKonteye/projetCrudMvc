<?php
namespace Model;
interface ISalleDAO {
    public function getAll();
    public function getById($id);
    public function create($salle);
    public function update($salle);
    public function delete($id);
  }
  