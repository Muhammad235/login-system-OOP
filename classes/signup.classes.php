<?php

class Signup extends Dbh
{
    protected function setUser($username, $email, $password){
        $sql = "INSERT INTO users (username, email, passoword) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }


    protected function checkUser($username, $email){
        $sql = 'SELECT username, email FROM users WHERE username = ? OR email = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
           $resultCheck = false;
        }else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}


?>