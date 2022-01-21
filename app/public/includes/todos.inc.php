<?php 

session_start();

// Instantiate TodosContr class
include '../classes/todos.contr.classes.php';

//If the user is not logged in or logged in. 
if(!isset($_SESSION['user_id'])) {
    // Head back to log in page
    header('location: ../login.php?error=notloggedin');
} else {
    // Head back to todos page
    header('location: ../todo.php');
}


if(isset($_POST['submit_create'])) {
    
    $create = new TodosContr();
    
    // Running add method in todos controller
    $create->add();

    // Head to todo page
    header('location: ../todo.php?todo=added');
}