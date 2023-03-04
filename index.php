<?php
use Controllers\EtudiantController;
require_once '../ProjetDITI/controller/EtudiantController.php';
require_once 'autoload.php';
require_once '../ProjetDITI/model/DB.class.php';


$controller = new EtudiantController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controller->delete($id);
        break;
    default:
        echo 'Invalid action';
        break;
}
