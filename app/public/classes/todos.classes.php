<?php 

include 'dbh.classes.php';

class Todos extends Dbh {

    protected function getTodos($userid){
        $query = 'SELECT *, 
                    todos.id as todosId,
                    users.id as userId
                    FROM todos
                    INNER JOIN users
                    ON todos.users_id = users.id 
                    WHERE users.id = :userid
                    ORDER BY todos.created DESC';
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
        return $stmt;
    }

    protected function addTodos($data) {
        $query = 'INSERT INTO todos(users_id, task, completed, created) 
        VALUES (:users_id, :task, :completed, :created)';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($data);

        $_SESSION['message'] = "Task has been saved";
        $_SESSION['msg_type'] = "success";
    }

    protected function deleteTodos($id) {
        $query = 'DELETE FROM todos WHERE id = :id';
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $_SESSION['message'] = "Task has been deleted!";
        $_SESSION['msg_type'] = "danger";
    }

    protected function markTodos($as, $id) {
        
        switch($as) {
        case 'notcompleted':
        $stmt = $this->connect()->prepare("UPDATE todos SET completed = 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $_SESSION['message'] = "Task has been completed";
        $_SESSION['msg_type'] = "secondary";
        break;

        case 'completed':
        $stmt = $this->connect()->prepare("UPDATE todos SET completed = 0 WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $_SESSION['message'] = "Task has set to not done!";
        $_SESSION['msg_type'] = "secondary";
        break;
        }
    }

    protected function editTodos($id) {
        $query = "SELECT * FROM todos WHERE id= :id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $editTask = $result["task"];
        return $editTask;
    }

    protected function updateTodos($data) {
        $query = 'UPDATE todos SET users_id = :users_id, task = :task, completed = :completed, created = :created WHERE id = :id';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($data);

        $_SESSION['message'] = "Task has been updated!";
        $_SESSION['msg_type'] = "primary";
    }
}