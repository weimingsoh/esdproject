<?php
session_start();
require_once "invoke/invoke_services.php";
// var_dump($_POST);
$dao = new shift();
$shifts = $_POST['Shift'];
$period = $_POST['period'];
$_SESSION['period'] = $period;
$id = $_POST['empid'];
$_SESSION['eid'] = $id;
$id = intval($id);
$data = array();
foreach($shifts as $shift){
    $day_timing = explode(",", $shift);
    $day = $day_timing[0];
    $timing = $day_timing[1];
    // $data["EmployeeID"] = $id;
    // $data["Period"] = $period;
    // $data["Pday"] = $day;
    // $data["Timing"] = $timing;
    // $data["Status"] = "pending";
    $var = array('EmployeeID'=>$id,'period'=>$period,'p_day'=>$day,'timing'=>$timing,'status'=>'pending');
    
    array_push($data,$var);
    var_dump($var);
    
}
var_dump($data);
$submit = $dao->post_preferred_form($data);
header("Location: confirmed_preferred.php");

?>