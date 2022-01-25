<?php

if(isset($_POST['submit'])) {
    // Init data and sanitize
    $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  
    // Instantiate SignupContr class
    include '../classes/dbh.classes.php';
    include '../classes/login.classes.php';
    include '../classes/login.contr.classes.php';
    $login = new LoginContr($username, $password);
    
    // Running error handlers and user login
    $login->loginUser();

    // Head to todo page
    header('location: ../todo.php');
}