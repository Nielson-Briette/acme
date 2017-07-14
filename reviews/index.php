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

switch ($action) {
    case 'addReview':
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $prodId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    
        if (empty($reviewText)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/product-detail.php';
            exit;
        }
        
        $reviewOutcome = insertReview($reviewText, $invId, $clientId);

        if ($reviewOutcome === 1) {
            $message = "<p>Thanks for adding a review to the product.</p>";
             include '../view/product-detail.php';
            exit;
        } else {
            $message = "<p>Sorry, but the creation of a new product review failed. Please try again.</p>";
            include '../view/product-detail.php';
            exit;
        }
        break;
        
           case'review-management':
        $reviews = getReviews();
        if (count($reviews) > 0) {
            $reviewList = '<table>';
            $reviewList .= '<thead>';
            $reviewList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
            $reviewList .= '</thead>';
            $reviewList .= '<tbody>';
            foreach ($reviews as $review) {
                $reviewList .= "<tr><td>$review[invName]</td>";
                $reviewList .= "<td><a href='/acme/products?action=mod&id=$review[invId]' title='Click to modify'>Modify</a></td>";
                $reviewList .= "<td><a href='/acme/products?action=del&id=$review[invId]' title='Click to delete'>Delete</a></td></tr>";
            }
            $reviewList .= '</tbody></table>';
        } else {
            $message = '<p class="notify">Sorry, no reviews were returned.</p>';
        }

    case 'editReview':

        $reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $reviewInfo = getReview($reviewId);
        $reviewText = $reviewInfo['reviewText'];
        $invId = $reviewInfo['invId'];

        if (count($reviewInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/review-update.php';
        exit;

        break;

    case 'updateReview':
        $reviewText = filter_input(INPUT_POST, 'reviewtext', FILTER_SANITIZE_STRING);
        $reviewId = filter_input(INPUT_POST, 'reviewid', FILTER_SANITIZE_NUMBER_INT);
        $invId = filter_input(INPUT_POST, 'invid', FILTER_SANITIZE_NUMBER_INT);
        
        // Check for missing data
        if (empty($reviewText) || empty($reviewId)) {
            $message = '<p>Please provide complete and correct information for all item fields!</p>';
            include '../view/review-update.php';
            exit;
        }
        // Send the data to the model
        $updateResult = updateReview($reviewId, $reviewText);
        
        // Check and report the result
        if ($updateResult) {
            $message = "<p class='notice'>Congratulations, the review was successfully updated.</p>";
            $_SESSION['message'] = $message;     
            header('location: /acme/accounts/?action=loggedin');
            exit;
        } else {
            $message = "<p class='notice'>Error. The review was not updated.</p>";
            include '../view/review-update.php';
            exit;
        }
        break;
        
    case 'deleteReview':
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $reviewInfo = getReview($reviewId);
        $reviewText = $reviewInfo['reviewText'];
        $invId = $reviewInfo['invId'];
        $invReviewNameInfo = getProductName($invId);
    
        if (count($reviewInfo) < 1) {
            $message = "<p class='notice'>Sorry, no review information could be found.</p>";
        }
        include '../view/review-delete.php';
        exit;
        break;

    case 'delete':
        $reviewId = filter_input(INPUT_POST, 'reviewid', FILTER_SANITIZE_NUMBER_INT);
        $reviewInfo = getReview($reviewId);
        $invId = $reviewInfo['invId'];
        $invReviewNameInfo = getProductName($invId);
        $invReviewName = $invReviewNameInfo['invName'];
        
        // Send the data to the model
        $deleteResult = deleteReview($reviewId);

        // Check and report the result
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations! The " . $invReviewName . " review was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/accounts/?action=loggedin');
            exit;
        } else {
            $message = "<p class='notice'>Error. The " . $invReviewName . " review was not deleted.</p>";
            header('location: /acme/accounts/?action=loggedin');
            exit;
        }
        break;
    case 'confirm-del':

        break;
    case 'default':

        if (isset($_SESSION['loggedin'])) {
            include '../view/admin.php';
            exit;
        } else {
            header("Location: /acme/");
            exit;
        }


        break;
}