<?php

require_once 'include/common.php';
$_SESSION["start"];
// isMissingOrEmpty(...) is in common.php
$errors = [ isMissingOrEmpty ('username'), isMissingOrEmpty ('password') ];
$errors = array_filter($errors);

// User list
$employeeIDs = ["","jazreel","junhong","weiming"];
$employeePWs = ["12345"];
$employerIDs = ["weilun","cheng"];
$employerPWs = ["password"];

if(!isEmpty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: login_main.php");
    // include "login_main.php";
    print_r($_SESSION['errors']);

    exit();
}

$choice = $_POST['choice'];
$username = $_POST['username'];
$enteredPwd = $_POST['password'];

//redirect for employer login - location not decided yet
if ($choice == "Employer" && in_array($username,$employerIDs) && in_array($enteredPwd,$employerPWs) ){
    header("Location: employer-view.php");
}
//redirect for employee login location not decided yet
elseif ($choice == "Employee" && in_array($username,$employeeIDs) && in_array($enteredPwd,$employeePWs) ){
    $_SESSION["empid"] = array_search($username,$employeeIDs);
    header("Location: employee-view.php");
}
//error handling
elseif (empty($username) || empty($enteredPwd)){
    $_SESSION['errors'] = [ 'Username/password is empty' ];
    header("Location: login_main.php");
}
elseif (!in_array($username,$employerIDs) || !in_array($enteredPwd,$employerPWs)){
    $_SESSION['errors'] = [ 'Username/password is incorrect' ];
    header("Location: login_main.php");
}
elseif (!in_array($username,$employeeIDs) || !in_array($enteredPwd,$employeePWs)){
    $_SESSION['errors'] = [ 'Username/password is incorrect' ];
    header("Location: login_main.php");
}

/*$dao = new UserDAO();
$user = $dao->retrieve($username);
$status = $user->authenticate($enteredPwd);
echo $status;
*/
# This is for the rest of users
/*
if (isset($user) && $user->authenticate($enteredPwd)) {
    $_SESSION['user'] = $user;
    header("Location: home.php");
} 
else {
    $_SESSION['errors'] = [ 'Username/password is incorrect' ];
    // include 'login_main.php';
    print_r($_SESSION['errors']);
}*/
?>