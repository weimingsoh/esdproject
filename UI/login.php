<?php
$username = $_POST['username'];
$enteredPwd = $_POST['password'];

//employer
if ($username == "admin" && $enteredPwd == "admin"){
	header("Location: employer-view.php");
}//employee
elseif ($username == "" && $enteredPwd =="") {
	
    header("Location: employee-view.php");
}

?>