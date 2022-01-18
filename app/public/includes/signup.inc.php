<?php

if(isset($_POST['submit'])) {
    // Takes data from sign up form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatpassword'];
    $email = $_POST['email'];

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
