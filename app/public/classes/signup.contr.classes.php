<?php

class SignupContr {
    private $username;
    private $password;
    private $repeatPassword;
    private $email;

    public function __construct($username, $password, $repeatPassword, $email){
        $this->username = $username;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
    }

    // Checks if any fields are empty
    private function emptyInput(){
        $result;
        if(empty($this->username || $this->password || $this->repeatPassword || $this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks username input
    function invalidUsername() {
        $result;
        if (!preg_match('/^[a-z\d_]{2,20}$/i', $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
    //Checks email input
    function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check if password match with repeat
    function passwordMatch() {
        $result;
        if ($this->password !== $this->repeatPassword){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}