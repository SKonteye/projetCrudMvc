<?php

namespace Model;

interface IEtudiantDAO
{
    public function getAll();
    public function getById($id);
    public function create($etudiant);
    public function update($etudiant);
    public function delete($id);
}

