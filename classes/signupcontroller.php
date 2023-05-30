<?php

class SignupController{
   private $username;
   private $email;
   private $password;
   private $confirmpassword;

   public function __construct($username, $email, $password, $confirmpassword)
   {
    $this->$username;
    $this->$email;
    $this->$password;
    $this->$confirmpassword;
   }

   private function emptyInput(){
      $result;
        if (empty($username) || empty($email) || empty($password) || empty($confirmpassword)) {
            $result = false;
        }else {
            $result = true;
        }

    return $result;
   }

//    private function validateUsername(){
//     $result;
//     if (!preg_match("/")) {
//         $result = false;
//     }else {
//         #result = true;
//     }

//     return $result;
//    }

    private function validateEmail(){
     $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }


    private function pwdmatch(){
        $result;
           if (password_verify($this->password, $this->$confirmpassword)) {
               $result = false;
           }else {
               $result = true;
           }
   
           return $result;
       }

}