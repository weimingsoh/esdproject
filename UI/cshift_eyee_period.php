<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get_Preferred_Shifts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    
    require_once "invoke/invoke_services.php";
    session_start();
    $eid = $_SESSION['eid'];
    $dao = new shift();
    $period_list = $dao->get_periods();

    #check if user chosen a period
    if(isset($_POST["period"])){
        $period_choice = $_POST["period"];
    }
    else{
        $period_choice = "";
    }

    #Nav buttons to payroll_eid and payroll_list
    echo"<form method='post' action='payroll_getall.php'>
    <button type='submit'>Payroll List</button></form>";
    echo"<form method='post' action='payroll_eid.php'>
    <button type='submit'>Payroll By EmployeeID</button></form>";

    #dropdown list for period
    echo "<form action='get_preferred_main.php' method='post'><select name = 'period'>";
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
    <table class='table table-striped' id='payroll-list' border='1'>
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