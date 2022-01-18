<?php

class Dbh {
    private $host = 'mysql';
    private $user = 'user';
    private $pwd = 'password';
    private $dbName = 'mvc';

    protected function connect(){
        try{
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e){
            echo 'error!:' . $e->getMessage();
        } 
    }
}