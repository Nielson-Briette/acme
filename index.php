<!--//ACME CONTROLLER-->
<?php
// Create or access a Session
session_start();

require_once 'library/connections.php';
require_once 'model/acme-model.php';
require_once 'model/products-model.php';
require_once 'library/functions.php';

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
buildNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
if($action == NULL){
 $action = 'home';
}
}

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
 case 'home':
  include 'view/home.php';
 
}