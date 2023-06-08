<?php

if (isset($_POST['submit'])) 
{
    // storing user info into variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Instantiate SignupContoller class 
    include '../classes/dbh.php';
    include '../classes/signup.classes.php';
    include '../classes/signupcontroller.php';
    $signup = new SignupController($username, $email, $password, $confirmpassword);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going back frontpage
    header("location: ../signup.html");
}

