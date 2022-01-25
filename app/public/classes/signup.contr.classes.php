<?php

class SignupContr extends Signup
{
    private $username;
    private $password;
    private $repeatPassword;
    private $email;

    public function __construct($username, $password, $repeatPassword, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header('location:../signup.php?error=emptyinput');
            exit();
        }
        if ($this->invalidUsername() == false) {
            header('location:../signup.php?error=username');
            exit();
        }

        if ($this->invalidLengthUsername() == false) {
            header('location:../signup.php?error=usernamelength');
            exit();
        }

        if ($this->invalidEmail() == false) {
            header('location:../signup.php?error=email');
            exit();
        }

        if ($this->passwordLength() == false) {
            header('location:../signup.php?error=passwordlength');
            exit();
        }

        if ($this->passwordMatch() == false) {
            header('location:../signup.php?error=passwordmatch');
            exit();
        }
        if ($this->userTakenCheck() == false) {
            header('location:../signup.php?error=useroremailtaken');
            exit();
        }

        $this->setUser($this->username, $this->password, $this->email);
    }

    // Checks if any fields are empty
    private function emptyInput()
    {
        $result = '';
        if (empty($this->username || $this->password || $this->repeatPassword || $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks username input
    function invalidUsername()
    {
        $result = '';
        if (!preg_match('/^[a-z\d_]{2,20}$/i', $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks username length input
    function invalidLengthUsername()
    {
        $result = '';
        $username = $this->username;
        if (strlen($username) < 4) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    //Checks email input
    function invalidEmail()
    {
        $result = '';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check passwords length
    function passwordLength()
    {
        $result = '';
        $password = $this->password;
        if (strlen($password) < 6) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check if password match with repeat
    function passwordMatch()
    {
        $result = '';
        if ($this->password !== $this->repeatPassword) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check if the username or email is already taken 
    function userTakenCheck()
    {
        $result = '';
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}