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
}