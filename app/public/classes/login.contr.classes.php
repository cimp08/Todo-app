<?php

class LoginContr extends Login {
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header('location:../login.php?error=emptyinput');
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    // Checks if any fields are empty
    private function emptyInput(){
        $result = '';
        if(empty($this->username || $this->password)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}