<?php

if(isset($_POST['submit'])) {
    // Takes data from sign up form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatpassword'];
    $email = $_POST['email'];

    // Instantiate SignupContr class
    include '../classes/signup.classes.php';
    include '../classes/signup.contr.classes.php';
    $signup = new SignupContr($username, $password, $repeatPassword, $email);
    
}