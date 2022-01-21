<?php 

include 'dbh.classes.php';

class Todos extends Dbh {

    protected function getTodos(){
        $query = 'SELECT *, 
                    todos.id as todosId,
                    users.id as userId
                    FROM todos
                    INNER JOIN users
                    ON todos.users_id = users.id
                    ORDER BY todos.created DESC';
        $result = $this->connect()->prepare($query);
        $result->execute();
        return $result;
    }

    protected function addTodos($data) {
        $query = 'INSERT INTO todos(users_id, task, completed, created) 
        VALUES (:users_id, :task, :completed, :created)';
        $result = $this->connect()->prepare($query);
        $result->execute($data);
    }

    protected function deleteTodos($id) {
        $query = 'DELETE FROM todos WHERE id = :id';
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    protected function markTodos($as, $id) {
        
        switch($as) {
        case 'notcompleted':
        $stmt = $this->connect()->prepare("UPDATE todos SET completed = 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $_SESSION['message'] = "Task has been completed";
        $_SESSION['msg_type'] = "grey";
        break;

        case 'completed':
        $stmt = $this->connect()->prepare("UPDATE todos SET completed = 0 WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $_SESSION['message'] = "Task has set to not done!";
        $_SESSION['msg_type'] = "grey";
        break;
    }
    }
}