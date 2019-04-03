<?php
include "invoke/invoke_services.php";
#api call put
$employeeID = $_POST["id"];
$employeeName = $_POST["name"];
$employeeAddress = $_POST["address"];
$employeePhone = $_POST["phone"];
$employeeSex = $_POST["sex"];
$employeeNationality = $_POST["nationality"];
$employeeEmail = $_POST["email"];

$data = array('id'=>"$employeeID", 'name'=>"$employeeName",'address'=>"$employeeAddress",'phone'=>"$employeePhone",'sex'=>"$employeeSex",'nationality'=>"$employeeNationality", 'email'=>"$employeeEmail");

update_employee($employeeID, $data);
header("Location: employer-view.php");
echo "hello world";
?>