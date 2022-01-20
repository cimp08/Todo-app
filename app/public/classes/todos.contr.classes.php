<?php 

include 'todos.classes.php';

class TodosContr extends Todos{

    public function __construct(){
        if(!isset($_SESSION['user_id'])) {
            header('location: ../index.php');
        } else {
            $this->setTodos();
        }
    }

    public function setTodos(){
        $result = $this->getTodos();
        return $result;
    }
}