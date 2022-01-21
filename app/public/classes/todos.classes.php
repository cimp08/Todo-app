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
}