<?php

if(isset($_POST['submit'])) {
   
    // Init data and sanitize
    $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $repeatPassword = trim(filter_input(INPUT_POST, "repeatpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    

    // Instantiate SignupContr class
    include '../classes/dbh.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup.contr.classes.php';
    $signup = new SignupContr($username, $password, $repeatPassword, $email);
    
    // Running error handlers and user signup
    $signup->signupUser();

    // Head back to front page
    header('location: ../login.php?error=none');
}
