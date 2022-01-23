<?php 

include 'todos.classes.php';

class TodosContr extends Todos{
 

    public function setTodos(){
        $result = $this->getTodos();
        return $result;
    }

    public function add() {
        $task = trim($_POST["task"]);
        $my_date_time = date("Y-m-d H:i:s", strtotime("+1 hours"));

        if(empty($task)) {
            header('location: ../todo.php');
        } else {
            $data = [
            'users_id' => $_SESSION['user_id'],
            'task' => $task,
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