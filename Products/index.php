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

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

  case 'addNewCategory':
    $categoryid = filter_input(INPUT_POST, 'categoryid');
    $categoryname = filter_input(INPUT_POST, 'categoryname');
    if(empty($categoryid) || empty($categoryname)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/product-management.php';
        exit; 
    }
    $newCategory = newCategory($categoryid, $categoryname);
    if($newCategory === 1) {
        $message = "<p>Thanks for adding the new cat $categoryname.</p>";
        exit;
    } else {
        $message = "<p>Sorry but the new cat $categoryname has failed to be added. Please try again.</p>";
        include '../view/product-management.php';
        exit;
    }
    break;
    
  case 'addNewProduct':
      $invid = filter_input(INPUT_POST, 'invid');
      $invname = filter_input(INPUT_POST, 'invname');
      $invdescription = filter_input(INPUT_POST, 'invdescription');
      $invimage = filter_input(INPUT_POST, 'invimage');
      $invthumbnail = filter_input(INPUT_POST, 'invthumbnail');
      $invprice = filter_input(INPUT_POST, 'invprice');
      $invstock = filter_input(INPUT_POST, 'invstock');
      $invsize = filter_input(INPUT_POST, 'invsize');
      $invweight = filter_input(INPUT_POST, 'invweight');
      $invlocation = filter_input(INPUT_POST, 'invlocation');
      $categoryid = filter_input(INPUT_POST, 'categoryid');
      $invvendor = filter_input(INPUT_POST, 'invvendor');
      $invstyle = filter_input(INPUT_POST, 'invstyle');
      if(empty($invid) || empty($invname) || empty($invdescription) || empty($invimage) || empty($invthumbnail)
              || empty($invprice) || empty($invstock) || empty($invstock) || empty($invsize) || empty($invweight)
              || empty($invlocation) || empty($categoryid) || empty($invvendor) || empty($invstyle)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/product-management.php';
        exit; 
    }
    $newProduct = newProduct($invId, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
    if($newProduct === 1) {
        $message = "<p>Thanks for adding the new product $invname to the inventory.</p>";
        exit;
    } else {
        $message = "<p>Sorry but the new product $invname has failed to be added. Please try again.</p>";
        include '../view/product-management.php';
        exit;
    }
    break;
   
}
