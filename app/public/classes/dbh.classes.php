<?php

class Dbh {
    private $host = 'mysql';
    private $user = 'user';
    private $pwd = 'password';
    private $dbName = 'mvc';

    protected function connect(){
        try{
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $db = new PDO($dsn, $this->user, $this->pwd);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        } catch (PDOException $e){
            echo 'error!:' . $e->getMessage();
        } 
    }
}