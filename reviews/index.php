<?php

//REVIEWS CONTROLLER

// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';
require_once '../model/products-model.php';
require_once '../model/reviews-model.php';

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
buildNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//build a switch control structure for process control
switch ($action) {
//add new review
case 'addNewReview':
    $newreview = filter_input(INPUT_POST, 'newReview', FILTER_SANITIZE_STRING);
    //deliver view to edit a review
        if (empty($newreview)) {
            $message = '<p><b>ERROR: Please provide information for all empty form fields.</b></p>';
            include '../view/product-detail.php';
            exit;
        }
//handle the review update
        $newReview = newReview($newreview);

//deliver a view to confirm deletion of review 
        if ($newReview === 1) {
            header('Location:/acme/products/index.php?action=addNewReview');
        } else {
            $message = "<p>Sorry but your review has failed to be added. Please try again.</p>";
        }
        include '../view/product-detail.php';
        exit;
    
    //handle the review deletion
          $updateResult = updateReview($updateReview);
        if ($updateReview) {
            $message = "<p class='notify'>Congratulations your review was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p>Error. The new review was not updated.</p>";
            include '../view/product-detail.php';
            exit;
        }
        break;
//default to deliver admin view if client is logged in or the acme home view if not

       if ($_SESSION['loggedin'] = TRUE){
        // Send them to the admin view
        include '/acme/view/admin.php';
       } else {
           include '/acme/index.php';
       }
        exit;
        break;
}