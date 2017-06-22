<!--//PRODUCTS CONTROLLER-->
<?php
// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/products-model.php';
require_once '../library/functions.php';
require_once '../model/accounts-model.php';

// Get the array of categories
$categoriesAndIds = getCategoriesAndIds();

//call the buildNav function
buildNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'product-management';
    }
}

switch ($action) {

    case'product-management':
        $products = getProductBasics();
        if (count($products) > 0) {
            $prodList = '<table>';
            $prodList .= '<thead>';
            $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
            $prodList .= '</thead>';
            $prodList .= '<tbody>';
            foreach ($products as $product) {
                $prodList .= "<tr><td>$product[invName]</td>";
                $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
                $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
            }
            $prodList .= '</tbody></table>';
        } else {
            $message = '<p class="notify">Sorry, no products were returned.</p>';
        }

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
            header('Location:/acme/products/index.php?action=addCategory');
        } else {
            $message = "<p>Sorry but the new cat $categoryname has failed to be added. Please try again.</p>";
        }
        include '../view/addCategory.php';
        exit;

    case 'addNewProduct':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_STRING);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);

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

    case 'mod':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;

        break;

    case 'updateProd':
        $catType = filter_input(INPUT_POST, 'catType', FILTER_SANITIZE_NUMBER_INT);
        $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
        $prodDesc = filter_input(INPUT_POST, 'prodDesc', FILTER_SANITIZE_STRING);
        $prodImage = filter_input(INPUT_POST, 'prodImage', FILTER_SANITIZE_STRING);
        $prodThumbnail = filter_input(INPUT_POST, 'prodThumbnail', FILTER_SANITIZE_STRING);
        $prodPrice = filter_input(INPUT_POST, 'prodPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $prodStock = filter_input(INPUT_POST, 'prodStock', FILTER_SANITIZE_NUMBER_INT);
        $prodSize = filter_input(INPUT_POST, 'prodSize', FILTER_SANITIZE_NUMBER_INT);
        $prodWeight = filter_input(INPUT_POST, 'prodWeight', FILTER_SANITIZE_NUMBER_INT);
        $prodLocation = filter_input(INPUT_POST, 'prodLocation', FILTER_SANITIZE_STRING);
        $prodVendor = filter_input(INPUT_POST, 'prodVendor', FILTER_SANITIZE_STRING);
        $prodStyle = filter_input(INPUT_POST, 'prodStyle', FILTER_SANITIZE_STRING);
        $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);
        
        if (empty($catType) || empty($prodName) || empty($prodDesc) || empty($prodImage) || empty($prodThumbnail) || empty($prodPrice) || empty($prodStock) || empty($prodSize) || empty($prodWeight) || empty($prodLocation) || empty($prodVendor) || empty($prodStyle)) {
            $message = '<p>Please complete all information for the update item.</p>';
            include '../view/prod-update.php';
            exit;
        }
        $updateResult = updateProduct($catType, $prodName, $prodDesc, $prodImage, $prodThumbnail, $prodPrice, $prodStock, $prodSize, $prodWeight, $prodLocation, $prodVendor, $prodStyle, $prodId);
        if ($updateResult) {
            $message = "<p class='notify'>Congratulations, $prodName was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p>Error. The new product was not updated.</p>";
            include '../view/prod-update.php';
            exit;
        }
        break;
        
    case 'del':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if (count($prodInfo) < 1) {
         $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
    break;
    
    case 'deleteProd':
        $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
        $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteProduct($prodId);
        if ($deleteResult) {
         $message = "<p class='notice'>Congratulations, $prodName was successfully deleted.</p>";
         $_SESSION['message'] = $message;
         header('location: /acme/products/');
         exit;
        } else {
         $message = "<p class='notice'>Error: $prodName was not deleted.</p>";
         $_SESSION['message'] = $message;
         header('location: /acme/products/');
         exit;
        }
    break;
        
    case 'category':
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $products = getProductsByCategory($type);
        if(!count($products)){
            $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
        }
        include '../view/category.php';
        break;
        
    case 'details':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $product = getProductInfo($prodId);
        
        if(!count($product)){
        $message = "<p class='notice'>Sorry, no $prodId  could be found.</p>";
        } else {
        $prodDetail = buildProductsDetail($product);
        }
        include '../view/product-detail.php';
        break;
}


        
        