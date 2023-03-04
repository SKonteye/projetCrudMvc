<?php
namespace database;
// Database connection configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'scolarite');

// Database connection function
function connect() {
  $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  return $conn;
}

// Routing function
function route($controller, $action) {
  $controllerName = $controller . 'Controller';
  $controller = new $controllerName();

  switch ($action) {
    case 'index':
      $controller->index();
      break;
    case 'create':
      $controller->create();
      break;
    case 'edit':
      $controller->edit();
      break;
    case 'update':
      $controller->update();
      break;
    case 'delete':
      $controller->delete();
      break;
    default:
      die('Invalid action');
  }
}

// Get controller and action from the URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Etudiant';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Route the request to the appropriate controller and action
route($controller, $action);