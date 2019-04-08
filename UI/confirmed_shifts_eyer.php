<?php
require_once "invoke/invoke_services.php";
echo "<html><head>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: 'Raleway', sans-serif}
#customers {
font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
width: 100%;
}

#customers td, #customers th {
border: 1px solid #000000;
padding: 8px;
}

#customers tr:nth-child(even){background-color: #DCDCDC;}

#customers tr:hover {background-color: #ddd;}

#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #FAEBD7;
color: black;
}.topnav a {
float: left;
display: block;
color: #00000;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}.topnav {
overflow: hidden;
background-color: AntiqueWhite;
width: 100%;
}
</style>
</head>";
echo "<h1>Confirmed Shifts</h1>";
echo"<form method='post' action='employer_nav.php'>
    <button type='submit'>Home Page</button></form><hr>";

echo "<div class='col-md-6'>
<table class='table table-striped' id='customers' border='1'>
    <tr>
        <th>Shift_ID</th>
        <th>EmployeeID</th>
        <th>Period</th>
        <th>PDay</th>
        <th>Timing</th>
    </tr>";

$dao = new confirmed_shift();
$period_list = $dao->get_periods();
$shifts = $dao->cshift_all();

if(isset($_POST['period'])){
    $period_choice = $_POST['period'];
} else {
    $period_choice = "";
}

echo "Select Period: ";
echo "<form action='confirmed_shifts_eyer.php' method='post'>
    <select name = 'period'>";
foreach ($period_list as $period){
    if($period == $period_choice){
        echo"<option value=$period selected = 'selected'>$period</option>";
    } else {
        echo"<option value=$period>$period</option>";
    }
}
echo "</select><input type='submit' value='Submit'></form><br><br>";

if(isset($_POST["period"])){
    $period_choice = $_POST["period"];
    echo '<input type="hidden" id="period" name="period" value="'.$period_choice.'">';
    echo "<h3> Viewing Confirmed Shifts for: $period_choice";
    $confirmed_shifts = $dao->cshift_period($period_choice);

    foreach($confirmed_shifts as $shift){
        echo "<tr>";
        echo "<td>".$shift['Shift_id']."</td>";
        echo "<td>".$shift['EmployeeID']."</td>";
        echo "<td>".$shift['period']."</td>";
        echo "<td>".$shift['p_day']."</td>";
        echo "<td>".$shift['timing']."</td>";
        echo "</tr>";
    }
} else {
    echo "<h3>Viewing All Confirmed Shifts</h3>";
    foreach($shifts as $shift){
        echo "<tr>";
        echo "<td>".$shift['Shift_id']."</td>";
        echo "<td>".$shift['EmployeeID']."</td>";
        echo "<td>".$shift['period']."</td>";
        echo "<td>".$shift['p_day']."</td>";
        echo "<td>".$shift['timing']."</td>";
        echo "</tr>";
    }
}
echo "</table></body><html>";

?>
