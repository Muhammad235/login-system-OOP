<?php

if (isset($_POST['submit'])) 
{
    // storing user info into variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Instantiate SignupContoller class 
    include '../classes/signupupcontroller.php';

    // Running error handlers and user signup
    $signup = new SignupController($username, $email, $password, $confirmpassword);

    // Going back frontpage
}

