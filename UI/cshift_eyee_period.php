<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Confirmed Shifts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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
</head>
<body>
    <?php
    
    require_once "invoke/invoke_services.php";
    session_start();
    $eid = $_SESSION['eid'];
    $dao = new confirmed_shift();
    $period_list = $dao->get_periods();

    #check if user chosen a period
    if(isset($_POST["period"])){
        $period_choice = $_POST["period"];
    }
    else{
        $period_choice = "";
    }

    echo"<form method='post' action='employee_nav.php'>
    <button type='submit'>Employee Home</button></form>";

    #dropdown list for period
    echo "<form action='cshift_eyee_period.php' method='post'><select name = 'period'>";
    foreach ($period_list as $period){
        if($period_choice==$period){
            echo"<option value=$period selected = 'selected'>$period</option>";
        }
        else{
            echo"<option value=$period >$period</option>";
        }
      }
    echo "</select><input type='submit' value='Submit'></form><br><br>";
    
    
    #create table headers at first
    echo "<form method='POST' action='process_shifts.php'>";
    echo "<div class='col-md-6'>
    <table class='table table-striped' id='customers' border='1'>
    <tr>
        <th>Shift_ID</th>
        <th>EmployeeID</th>
        <th>Period</th>
        <th>PDay</th>
        <th>Timing</th>
    </tr>";

    if(isset($_POST["period"])){
        $period = $_POST["period"];
        echo '<input type="hidden" id="period" name="period" value="'.$period.'">';
        $confirmed_shifts = $dao->eyee_periods($period,$eid);
        
        foreach($confirmed_shifts as $shift){
            echo "<tr>";
            echo "<td>".$shift['Shift_id']."</td>";
            echo "<td>".$shift['EmployeeID']."</td>";
            echo "<td>".$shift['period']."</td>";
            echo "<td>".$shift['p_day']."</td>";
            echo "<td>".$shift['timing']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
</body>
</html>