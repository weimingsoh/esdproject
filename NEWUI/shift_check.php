<?php
require_once "invoke/invoke_services.php";
$dao = new shift();

$shifts=$_POST['Shift'];
$period = $_POST['period'];
$id = $_POST['empid'];
$id = intval($id);
$data = array();
foreach($shifts as $shift){
    $day_timing = explode("-", $shift);
    $day = $day_timing[0];
    $timing = $day_timing[1];
    $var = array('ID'=> 1, 'EmployeeID'=>$id,'Period'=>$period,'Pday'=>$day,'Timing'=>$timing,'Status'=>'pending');
    var_dump($var);
    array_push($data,$var);
}
$submit = $dao->submit_form($data);

// print_r($shifts);
// echo"<br>";
// print_r($id);
// echo"<br>";
// print_r($period)
?>