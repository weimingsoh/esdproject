<?php
require_once "invoke/invoke_services.php";
session_start();
if (isset($_SESSION['period'])) {
    $period = $_SESSION['period'];
} 
if (isset($_SESSION['eid'])) {
    $eid = $_SESSION['eid'];
}

$dao = new shift();
$shifts = $dao->get_preferred_shift_period($period);


echo "<h1>Confirmation of Submitted Preferred Shifts for Period: 20190101 :)";
#Nav buttons to 
echo"<form method='post' action='employee_nav.php'>
<button type='submit'>Back To Home</button></form>";

echo "<div class='col-md-6'>
<table class='table table-striped' id='payroll-list' border='1'>
    <tr>
        <th>EmployeeID</th>
        <th>Period</th>
        <th>PDay</th>
        <th>Timing</th>
    </tr>";

foreach($shifts as $shift){
    if ($shift['EmployeeID'] == $eid) {
    echo "<tr>";
    echo "<td>".$shift['EmployeeID']."</td>";
    echo "<td>".$shift['period']."</td>";
    echo "<td>".$shift['p_day']."</td>";
    echo "<td>".$shift['timing']."</td>";
    echo "</tr>";
    }
}
echo "</table>";

?>
