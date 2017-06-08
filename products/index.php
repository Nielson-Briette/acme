<!--//PRODUCTS CONTROLLER-->
<?php
// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/products-model.php';
require_once '../library/functions.php';

// Get the array of categories
$categoriesAndIds = getCategoriesAndIds();

//call the buildNav function
buildNav();

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
        $categoryname = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
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
        $invName = filter_input(INPUT_POST, 'invName',FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription',FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage',FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice',FILTER_SANITIZE_NUMBER_FLOAT);
        $invStock = filter_input(INPUT_POST, 'invStock',FILTER_SANITIZE_NUMBER_INT);
        $invSize = filter_input(INPUT_POST, 'invSize',FILTER_SANITIZE_NUMBER_INT);
        $invWeight = filter_input(INPUT_POST, 'invWeight',FILTER_SANITIZE_NUMBER_FLOAT);
        $invLocation = filter_input(INPUT_POST, 'invLocation',FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId',FILTER_SANITIZE_STRING);
        $invVendor = filter_input(INPUT_POST, 'invVendor',FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle',FILTER_SANITIZE_STRING);

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
