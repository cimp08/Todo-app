<?php 

include 'todos.classes.php';

class TodosContr extends Todos{
 

    public function setTodos(){
        $result = $this->getTodos($_SESSION['user_id']);
        return $result;
    }

    public function add($todo, $my_date_time) {
        
        if(empty($todo)) {
            header('location: ../todo.php');
        } else {
            $data = [
            'users_id' => $_SESSION['user_id'],
            'task' => $todo,
            'completed' => 0,
            'created' => $my_date_time
            ];
        }
        $this->addTodos($data);  
    }

    public function delete($id){
        $this->deleteTodos($id);
    }

    public function mark($as, $id){
        $this->markTodos($as, $id);
    }

    public function edit($id) {
        $editTask = $this->editTodos($id);
        
        return $editTask;
    }

    public function update($id, $newTask, $my_date_time) {
        
        if(empty($newTask)) {
            header('location: ../todo.php');
        } else {
            $data = [
            'id' => $id,
            'users_id' => $_SESSION['user_id'],
            'task' => $newTask,
            'completed' => 0,
            'created' => $my_date_time
            ];
        }
        $this->updateTodos($data);  
    }
}

$task = new TodosContr();