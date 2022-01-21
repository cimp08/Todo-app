<?php
class Login extends Dbh{

    protected function getUser($username, $password){
        $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE users_username=? OR users_email = ?;');
        
        if(!$stmt->execute([$username, $password])){
            $stmt = null;
            header('location: ../login.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../login.php?error=usersnotfound');
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]['users_password']);

        if($checkPassword == false) {
            $stmt = null;
            header('location: ../login.php?error=wrongpassword');
            exit();
        } elseif($checkPassword == true) {
           $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ? AND users_password = ?;'); 
        
           if(!$stmt->execute([$username, $username, $password])){
            $stmt = null;
            header('location: ../login.php?error=stmtfailed');
            exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header('location: ../login.php?error=usernotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            session_start();
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['user_username'] = $user[0]['users_username'];
        }
        $stmt = null;
    }
}