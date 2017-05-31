<?php

function checkEmail($email){
  $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
  $valEmail = filter_var($sanEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function checkPassword($password){
    // Check the password for a minimum of 8 characters,
    // at least one 1 capital letter, at least 1 number and
    // at least 1 special character
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $password);
}