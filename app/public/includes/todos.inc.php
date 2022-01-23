<?php 

session_start();

// Instantiate TodosContr class ($task = new TodosContr())
include '../classes/todos.contr.classes.php';


// If user submitted to create a todo
if(isset($_POST['submit_create'])) {
     
    // Running add method in todos controller
    $task->add();

}

// If user submitted to delete a todo
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Running delete method in todos controller
    $task->delete($id);
}

// If user submitted to mark a todo
if(isset($_GET['as'], $_GET['id'])) {
    $as = $_GET['as'];
    $id = $_GET['id'];

    // Running mark method in todos controller
    $task->mark($as, $id);

}

// If user submitted to edit a todo
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
    // Running edit method in todos controller
    $task->edit($id);
}

// If user submitted to update a todo
if(isset($_POST['update'])) {
    $id = $_POST["id"];
    $newTask = $_POST['task'];
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