<?php
//<!--PRODUCTS MODEL - SITE VISITORS-->

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


