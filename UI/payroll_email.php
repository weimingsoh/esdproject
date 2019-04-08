<?php
require_once "invoke/invoke_services.php";
$period = $_POST['period'];
$dao = new payroll();
$dao->send_payroll_email($period);
header("Location: payroll_period.php");
?>