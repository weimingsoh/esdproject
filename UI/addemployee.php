<?php
//form json object then api request? maybe can remove this page and just do api call on view
include "invoke/invoke_services.php";
$employeeID = $_POST["id"];
$employeeName = $_POST["name"];
$employeeAddress = $_POST["address"];
$employeePhone = $_POST["phone"];
$employeeSex = $_POST["sex"];
$employeeNationality = $_POST["nationality"];
$employeeEmail = $_POST["email"];
$data = array('id'=>"$employeeID", 'name'=>"$employeeName",'address'=>"$employeeAddress",'phone'=>"$employeePhone",'sex'=>"$employeeSex",'nationality'=>"$employeeNationality", 'email'=>"$employeeEmail");
create_employee($data);
header("Location: employer-view.php");
?>