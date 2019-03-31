<?php

require_once 'include/common.php';

// isMissingOrEmpty(...) is in common.php
$errors = [ isMissingOrEmpty ('username'), isMissingOrEmpty ('password') ];
$errors = array_filter($errors);


if (!isEmpty($errors)) {
    $_SESSION['errors'] = $errors;
    // include "login_main.php";
    print_r($_SESSION['errors']);

    exit();
}

$username = $_POST['username'];
$enteredPwd = $_POST['password'];



$dao = new UserDAO();
$user = $dao->retrieve($username);
$status = $user->authenticate($enteredPwd);
echo $status;

# This is for the rest of users
if (isset($user) && $user->authenticate($enteredPwd)) {
    $_SESSION['user'] = $user;
    header("Location: home.php");
} 
else {
    $_SESSION['errors'] = [ 'Username/password is incorrect' ];
    // include 'login_main.php';
    print_r($_SESSION['errors']);
}
?>