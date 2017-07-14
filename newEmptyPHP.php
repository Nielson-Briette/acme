<?php

function checkExistingReview($clientId, $prodId){
    $db = acmeConnect();
    $sql = "SELECT reviewId, reviewText, reviewDate, invId, clientId FROM reviews  WHERE invId = :prodId AND clientId = :clientId";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId);    
    $stmt->bindValue(':prodId', $prodId);
    $stmt->execute();
    $checkReviewArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $checkReviewArray;    
    
}
    
function getReviewByClient($clientId){
    $db = acmeConnect();
    $sql = "SELECT reviews.reviewId, reviews.reviewText, reviews.reviewDate, reviews.clientId, reviews.invId, "
         . "invName FROM inventory INNER JOIN reviews ON reviews.clientId = :clientId AND "
         . "reviews.invId = inventory.invId ORDER BY reviews.reviewDate DESC";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId);
    $stmt->execute();
    $reviewArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewArray;    
    
}
function getReview($reviewId){
    $db = acmeConnect();
    $sql = "SELECT reviewText, reviewDate, invId, clientId FROM reviews  WHERE reviewId = :reviewId ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId);
    $stmt->execute();
    $reviewArray = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewArray;
}
// Update a product
function updateReview($reviewId, $reviewText){
    $db = acmeConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText, reviewDate = NOW() WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();    
    return $rowsChanged;
}

function getProductName($invId){
 $db = acmeConnect();
 $sql = 'SELECT invName FROM inventory WHERE invId = :invId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
 $stmt->execute();
 $nameInfo = $stmt->fetch(PDO::FETCH_NAMED);
 $stmt->closeCursor();
 return $nameInfo;
}

function deleteReview($reviewId){
    $db = acmeConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();    
    return $rowsChanged;        
}