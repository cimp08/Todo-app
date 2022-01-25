<?php 

session_start();

// Instantiate TodosContr class ($task = new TodosContr())
include '../classes/todos.contr.classes.php';


// If user submitted to create a todo
if(isset($_POST['submit_create'])) {
    // Gets data and sanitize
    $todo = trim(filter_input(INPUT_POST, "task", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $my_date_time = date("Y-m-d H:i:s", strtotime("+1 hours"));
     
    // Running add method in todos controller
    $task->add($todo, $my_date_time);
}

// If user submitted to delete a todo
if(isset($_GET['delete'])) {
    // Gets data and sanitize
    $id = trim(filter_input(INPUT_GET, "delete", FILTER_SANITIZE_NUMBER_INT));
    
    // Running delete method in todos controller
    $task->delete($id);
}

// If user submitted to mark a todo
if(isset($_GET['as'], $_GET['id'])) {
    // Gets data and sanitize
    $as = trim(filter_input(INPUT_GET, "as", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $id = trim(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));

    // Running mark method in todos controller
    $task->mark($as, $id);
}

// If user submitted to edit a todo
if(isset($_GET['edit'])) {
    // Gets data and sanitize
    $id = trim(filter_input(INPUT_GET, "edit", FILTER_SANITIZE_NUMBER_INT));
    
    // Running edit method in todos controller
    $task->edit($id);
}

// If user submitted to update a todo
if(isset($_POST['update'])) {
    // Gets data and sanitize
    $id = trim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT));
    $newTask = trim(filter_input(INPUT_POST, "task", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $my_date_time = date("Y-m-d H:i:s", strtotime("+1 hours"));
    
    // Running update method in todos controller
    $task->update($id, $newTask, $my_date_time);
}

//If the user is not logged in or logged in. 
if(!isset($_SESSION['user_id'])) {
    // Head back to login page
    header('location: ../login.php?error=notloggedin');
} else {
    // Head back to todos page
    header('location: ../todo.php');
}  