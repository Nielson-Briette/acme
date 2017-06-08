<!--// ACCOUNTS CONTROLLER-->
<?php
// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';
require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
buildNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//enhancement 3
switch ($action) {

    case 'home':
        include '../view/home.php';
        break;

    case 'registration':
        include '../view/registration.php';
        break;

    case 'Register':
        // Filter and store the data
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $email = checkEmail($email);
        $checkPassword = checkPassword($password);
        // Check for missing data
        if (empty($firstname) || empty($lastname) || empty($email) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }
        //Hash the checked password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Send the data to the model
        $regOutcome = regVisitor($firstname, $lastname, $email, $password);

        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $firstname, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $firstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;

    case 'login':
        include '../view/login.php';
        break;

    case 'Login':
//        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
//        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
//        $email = filter_input(INPUT_POST, 'email');
//        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//        $email = checkEmail($email);
//        $checkPassword = checkPassword($password);
//        break;

        $email = filter_input(INPUT_POST, 'username');
        $checkEmail = checkEmail($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($password);

        // Run basic checks, return if errors
        if (empty($email) || empty($password)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($email);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;

    case 'Logout':
        session_destroy();
        header('location:/index.php');
        exit;  
        }