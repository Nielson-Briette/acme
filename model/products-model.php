<?php
//<!--PRODUCTS MODEL - SITE VISITORS-->

//Function to call categories and ids
function getCategoriesAndIds() {
    $db = acmeConnect();
    $sql = 'SELECT categoryName, categoryId FROM categories ORDER BY categoryName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $categoriesAndIds = $stmt->fetchAll();
    $stmt->closeCursor();
    return $categoriesAndIds;
}

//Contain a function for inserting a new category to the categories table.
function newCategory($categoryid, $categoryname){
     $db = acmeConnect();
      $sql = 'INSERT INTO categories (categoryId, categoryName)
           VALUES (:categoryid, :categoryname )';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_STR);
   $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_STR);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}

//Contain a function for inserting a new product to the inventory table.
function newProduct($invId, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle){
     $db = acmeConnect();
      $sql = 'INSERT INTO inventory (invId, invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle)
           VALUES (:invId, :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
   $stmt->bindValue(':invName', $invId, PDO::PARAM_STR);
   $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
   $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
   $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
   $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
   $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
   $stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
   $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
   $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
   $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
   $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
   $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}
