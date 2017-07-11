<?php
//REVIEWS MODEL


//function for inserting a new review into the reviews table
    function newReview($newreview) {
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews (newReview)
           VALUES (:newreview )';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':newreview', $newreview, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
//function for getting reviews by invId
function getReviewInvId($reviewInvId){
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewInvId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewInvId', $reviewInvId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewIdInfo = $stmt->fetch(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $reviewIdInfo;
}

//function for getting reviews based by client id
function getClientInfo($clientInfoId){
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE clientId = :clientInfoId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientInfoId', $clientInfoId, PDO::PARAM_INT);
    $stmt->execute();
    $clientInfo = $stmt->fetch(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $clientInfo;
}
//function for getting a review based by review id
function getReviewInfo($clientReviewId){
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :clientReviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientReviewId', $clientReviewId, PDO::PARAM_INT);
    $stmt->execute();
    $clientReview = $stmt->fetch(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $clientReview;
}
//function to update a review
function updateReview($clientReviewId) {
    $db = acmeConnect();
    $sql = 'UPDATE reviews SET reviewId = :clientReviewId = WHERE reviewId = :clientReviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientReviewId', $clientReviewId, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
//function to delete a review
function deleteReview($clientReviewId) {
    $db = acmeConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :clientReviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientReviewId', $clientReviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
