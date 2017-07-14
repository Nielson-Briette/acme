<?php
//<!--ACCOUNTS MODEL - SITE VISITORS-->
//<!--new function to handle site's registrations-->
function regVisitor($firstname, $lastname, $email, $password){
// Create a connection object using the acme connection function
   $db = acmeConnect();
// The SQL statement
   $sql = 'INSERT INTO clients (clientFirstname, clientLastname,
           clientEmail, clientPassword)
           VALUES (:firstname, :lastname, :email, :password)';
// Create the prepared statement using the acme connection
   $stmt = $db->prepare($sql);
// The next four lines replace the placeholders in the SQL
// statement with the actual values in the variables
// and tells the database the type of data it is
   $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
   $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
   $stmt->bindValue(':email', $email, PDO::PARAM_STR);
   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// Insert the data
   $stmt->execute();
// Ask how many rows changed as a result of our insert
   $rowsChanged = $stmt->rowCount();
// Close the database interaction
   $stmt->closeCursor();
// Return the indication of success (rows changed)
   return $rowsChanged;
}

 function checkExistingEmail($email){
 $db = acmeConnect();
 //the SQL statement
 $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
 //Create the prepared statment using the acme connection
 $stmt = $db->prepare($sql);
 //place actual variables and tell the databse they type of data
 $stmt->bindValue(':email', $email, PDO::PARAM_STR);
 $stmt->execute ();
 //tells the system to look for the existing email
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 //close the datebase interaction
 $stmt->closeCursor();
 if (empty($matchEmail)){
     return 0;
 } else {
     return 1;
 }
 }

// Get client data based on an email address
function getClient($email){
  $db = acmeConnect();
  $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}

function getClientByEmailAndPassword($emailaddress, $updatePass) {
    $db = acmeConnect();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :emailaddress AND clientPassword = :updatePass";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':emailaddress', $emailaddress, PDO::PARAM_STR);
    $stmt->bindValue(':updatePass', $updatePass, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}


function updateData($updateId) {
     $db = acmeConnect();
     $sql = 'SELECT * FROM clients WHERE clientId = :updateId';
     $stmt = $db->prepare($sql);
     $stmt->bindValue (':updateId', $updateId, PDO::PARAM_INT);
     $stmt->execute();
     $clientInfo = $stmt->fetch(PDO::FETCH_NAMED);
     $stmt->closeCursor();
     return $clientInfo;
 }
 
 function updateAccount($updateId, $upfirstName, $uplastName, $upEmail){
     $db = acmeConnect();
      $sql = 'UPDATE clients SET clientFirstname = :upfirstName, clientLastname = :uplastName, clientEmail = :upEmail WHERE clientId = :updateId';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':updateId', $updateId, PDO::PARAM_INT);
   $stmt->bindValue(':upfirstName', $upfirstName, PDO::PARAM_STR);
   $stmt->bindValue(':uplastName', $uplastName, PDO::PARAM_STR);
   $stmt->bindValue(':upEmail', $upEmail, PDO::PARAM_STR);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
  
 }
   
function updatePassword($updateId, $updatePass) {
    $db = acmeConnect();
    $sql = 'UPDATE clients Set clientPassword = :updatePass WHERE clientId= :updateId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':updateId', $updateId, PDO::PARAM_INT);
    $stmt->bindValue(':updatePass', $updatePass, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}     