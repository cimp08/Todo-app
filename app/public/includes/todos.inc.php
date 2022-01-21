<?php 

session_start();

// Instantiate TodosContr class
include '../classes/todos.contr.classes.php';

//If the user is not logged in or logged in. 
if(!isset($_SESSION['user_id'])) {
    // Head back to login page
    header('location: ../login.php?error=notloggedin');
} else {
    // Head back to todos page
    header('location: ../todo.php');
}

    

// If user submitted to create a todo
if(isset($_POST['submit_create'])) {
     
    $todosContr = new TodosContr();

    // Running add method in todos controller
    $todosContr->add();

    // Head to todo page
    header('location: ../todo.php?todo=added');
}

// If user submitted to delete a todo
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $todosContr = new TodosContr();

    // Running delete method in todos controller
    $todosContr->delete($id);

    // Head to todo page
    header('location: ../todo.php?todo=deleted');
}

// If user submitted to mark a todo
if(isset($_GET['as'], $_GET['id'])) {
    $as = $_GET['as'];
    $id = $_GET['id'];

    $todosContr = new TodosContr();

    // Running delete method in todos controller
    $todosContr->mark($as, $id);

    // Head to todo page
    header('location: ../todo.php?');

}