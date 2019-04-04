<?php
require_once "invoke/invoke_services.php";
$dao = new shift();
session_start();
// if (isset($_POST['tick'])) {
//     $approved_shifts = $dao->approve_shifts($_POST['period']);

//     $reject_shifts = $dao->reject_shifts($_POST['period']);

//     header("Location: confirmed_shifts.php");
//     exit;
// }
$period = $_POST['period'];
$shift_ids = $_POST['tick'];
foreach($shift_ids as $shift_id){
    $dao->approve_shifts($shift_id);
}
$dao->reject_shifts($period);
$dao->send_approved();
$dao->confirm_shifts();

$apiToken = "800648991:AAGYAmp26T-kX5FeHe3M44LukCZnfsstUdA";

$data = [
    'chat_id' => '-382359907',
    'text' => 'The schedule has been posted online.Please access the employee portal for the finalized schedule'
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

echo "<form action = 'confirmed_process.php' method = 'post'>
<input type='hidden' value=".$period." name='period' />
</form>
";

$_SESSION['period'] = $period;
header('Location: confirmed_process.php');


?>