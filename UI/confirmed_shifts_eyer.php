<?php
require_once "invoke/invoke_services.php";

echo "<div class='col-md-6'>
<table class='table table-striped' id='payroll-list' border='1'>
    <tr>
        <th>Shift_ID</th>
        <th>EmployeeID</th>
        <th>Period</th>
        <th>PDay</th>
        <th>Timing</th>
    </tr>";

$dao = new confirmed_shift();
$shifts = $dao->cshift_all();


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
