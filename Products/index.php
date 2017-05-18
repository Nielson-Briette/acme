<?php
//PRODUCTS CONTROLLER

// Get the database connection file
require_once '../library/connections.php';
// Get the products model
require_once '../model/products-model.php';

// Get the array of categories
$categoriesAndIds = getCategoriesAndIds();

//create $navList vairable to build dynamic menu from an array of categories
//obtained by calling the function in the acme model
$navList = '<ul>';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categoriesAndIds as $categoryAndId) {
    $navList .= "<li><a href='/acme/index.php?action=$categoryAndId[categoryName]' title='View our $categoryAndId[categoryName] product line'>$categoryAndId[categoryName]</a></li>";
}
$navList .= '</ul>';

//Create a $catList variable to build a dynamic drop-down select list
$catList = "<select name='categories'>";
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'>$catAndId[categoryName]</option>";
}
$catList .= "</select>";

echo $navList;
        echo $catList;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

  case 'AddNewCategory':
    // Filter and store the data
    $categoryid = filter_input(INPUT_POST, 'categoryid');
    $categoryname = filter_input(INPUT_POST, 'categoryname');
     
    // Check for missing data
    if(empty($categoryid) || empty($categoryname)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/product-management.php';
    exit; }
    
    // Send the data to the model
    $newCategory = newCategory($categoryid, $categoryname);
    
    // Check and report the result
    if($newCategory === 1){
     $message = "<p>Thanks for adding the new product $categoryname.</p>";
//     include '../view/login.php';
     exit;
    } else {
     $message = "<p>Sorry but the new product $categoryname has failed to be added. Please try again.</p>";
     include '../view/product-management.php';
     exit;
    }
   break;
}
