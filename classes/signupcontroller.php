<?php

class SignupController extends Signup{
   private $username;
   private $email;
   private $password;
   private $confirmpassword;

   public function __construct($username, $email, $password, $confirmpassword)
   {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmpassword = $confirmpassword;
   }

   public function signupUser(){
      if ($this->emptyInput() == false) {
           //emptyinput
           header("location: ../index.php?eror=emptyinput");
           exit();
      }
      if ($this->validateUsername() == false) {
         //invalidusername
         header("location: ../index.php?eror=invalidusername");
         exit();
      }
      if ($this->validateEmail() == false) {
        //invalidemail
        header("location: ../index.php?eror=invalidemail");
        exit();
      }
      if ($this->pwdmatch() == false) {
        //invalidpassword
        header("location: ../index.php?eror=invalidpassword");
        exit();
      }
      if ($this->email_username_check() == false) {
        //usernameoremailtaken
        header("location: ../index.php?eror=usernameoremailtaken");
        exit();
      }

      $this->setUser($this->username, $this->email, $this->hashedPwd);

    }

   private function emptyInput(){
      $result;
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmpassword)) {
            $result = false;
        }else {
            $result = true;
        }

     return $result;
   }

    private function validateUsername(){
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

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
           if (password_verify($this->password, $this->confirmpassword)) {
               $result = false;
           }else {
               $result = true;
           }
   
           return $result;
       }


       private function email_username_check(){
        $result;
           if (!$this->checkUser($this->username, $this->email)) {
               $result = false;
           }else {
               $result = true;
           }
   
           return $result;
       }


}