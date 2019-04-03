<?php
require_once "invoke/invoke_services.php";
$dao = new shift();
// if (isset($_POST['tick'])) {
//     $approved_shifts = $dao->approve_shifts($_POST['period']);

//     $reject_shifts = $dao->reject_shifts($_POST['period']);

//     header("Location: confirmed_shifts.php");
//     exit;
// }

$shift_ids = $_POST['tick'];
foreach($shift_ids as $shift_id){
    $dao->approve_shifts($shift_id);
}
$dao->reject_shifts($period);
$dao->send_approved();
$dao->send_email();
?>