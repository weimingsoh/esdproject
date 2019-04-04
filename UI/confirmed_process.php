<?php
require_once "invoke/invoke_services.php";
session_start();
$period = $_SESSION['period'];
$dao = new confirmed_shift();
$shifts = $dao->cshift_period($period);

#Nav buttons to 
echo"<form method='post' action='confirmed_shifts_eyer.php'>
<button type='submit'>Confirmed Shifts</button></form>";

echo "<div class='col-md-6'>
<table class='table table-striped' id='payroll-list' border='1'>
    <tr>
        <th>Shift_ID</th>
        <th>EmployeeID</th>
        <th>Period</th>
        <th>PDay</th>
        <th>Timing</th>
    </tr>";

foreach($shifts as $shift){
    echo "<tr>";
    echo "<td>".$shift['Shift_id']."</td>";
    echo "<td>".$shift['EmployeeID']."</td>";
    echo "<td>".$shift['period']."</td>";
    echo "<td>".$shift['p_day']."</td>";
    echo "<td>".$shift['timing']."</td>";
    echo "</tr>";
}
echo "</table>";

?>
