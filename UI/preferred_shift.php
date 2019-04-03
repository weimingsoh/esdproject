<?php
require_once "invoke/invoke_services.php";
$dao = new shift();
$url = "http://CalvinSiew:8080/shifts_add_preferred";
$shifts = $_POST['Shift'];
$period = ($_POST['period']);
$id = $_POST['empid'];
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
    // var_dump($var);
    array_push($data,$var);

    
}

$submit = $dao->post_preferred_form($data);

?>