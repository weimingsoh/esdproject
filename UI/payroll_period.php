<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payroll List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    
    require_once "invoke/invoke_services.php";
    $dao = new payroll();
    $period_list = $dao->period();

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
    echo "<form action='payroll_period.php' method='post'><select name = 'period'>";
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
    echo "<div class='col-md-6'>
      <table class='table table-striped' id='payroll-list' border='1'>
          <tr>
              <th>ID</th>
              <th>EmployeeID</th>
              <th>Period</th>
              <th>Hours</th>
              <th>Wage</th>
              <th>Incentive</th>
          </tr>";
    
    if(isset($_POST["period"])){
        $period = $_POST["period"];
        $payroll_list = $dao->get_by_period($period);
        #print results of payroll
        foreach($payroll_list as $payroll) {
        echo '
            <tr>
                <td>'                             . $payroll["id"]  . '</td>
                <td>'                             . $payroll["employeeid"] . '</td>
                <td>'                             . $payroll["period"]  . '</td>
                <td>'                             . $payroll["hours"]  . '</td>
                <td>'                             . $payroll["wages"]  . '</td>
                <td>'                             . $payroll["incentive"]  . '</td>
            </tr>
        ';
    
        }
    }
    ?>
</body>
</html>