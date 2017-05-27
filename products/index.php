<?php

//PRODUCTS CONTROLLER
// Get the database connection file
require_once '../library/connections.php';
// Get the products model
require_once '../model/acme-model.php';
// Get the acme model
require_once '../model/products-model.php';

// Get the array of categories
$categoriesAndIds = getCategoriesAndIds();


//create $navList vairable to build dynamic menu from an array of categories
//obtained by calling the function in the acme model
$navList = '<ul>';
$navList .= "<li><a href='../index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categoriesAndIds as $categoryAndId) {
    $navList .= "<li><a href='../index.php?action=$categoryAndId[categoryName]' title='View our $categoryAndId[categoryName] product line'>$categoryAndId[categoryName]</a></li>";
}
$navList .= '</ul>';

//Create a $catList variable to build a dynamic drop-down select list
$catList = "<select name='categoryId'>";
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'>$catAndId[categoryName]</option>";
}
$catList .= "</select>";

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
     $action= 'product-management';
 }
}

switch ($action) {
       
     case'product-management':
        include '../view/product-management.php';
        break;
    
    case 'addCategory':
        include '../view/addCategory.php';
        break;

    case 'addProduct':
        $message = '';
        include '../view/addProduct.php';
        break;

    case 'addNewCategory':
        $categoryname = filter_input(INPUT_POST, 'categoryName');
        if (empty($categoryname)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/addCategory.php';
            exit;
        }
        $newCategory = newCategory($categoryname);

        if ($newCategory === 1) {
            header('Location:/products/index.php?action=addCategory');
        } else {
            $message = "<p>Sorry but the new cat $categoryname has failed to be added. Please try again.</p>";
        }
        include '../view/addCategory.php';
        exit;

    case 'addNewProduct':
        $invName = filter_input(INPUT_POST, 'invName');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invSize = filter_input(INPUT_POST, 'invSize');
        $invWeight = filter_input(INPUT_POST, 'invWeight');
        $invLocation = filter_input(INPUT_POST, 'invLocation');
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor');
        $invStyle = filter_input(INPUT_POST, 'invStyle');

        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/addProduct.php';
            exit;
        }
        $newProduct = newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

        if ($newProduct === 1) {
            $message = "<p>Thanks for adding the new product $invName to the inventory.</p>";
        } else {
            $message = "<p>Sorry but the new product $invName has failed to be added. Please try again.</p>";
        }
        include '../view/addProduct.php';
        exit;

}
