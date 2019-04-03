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
    $eid_list = $dao->empids();
    
    #check if user chosen a period
    if(isset($_POST["eid"])){
        $eid_choice = $_POST["eid"];
    }
    else{
        $eid_choice = "";
    }

    #Nav buttons to payroll_eid and payroll_list
    echo"<form method='post' action='payroll_getall.php'>
    <button type='submit'>Payroll List</button></form>";
    echo"<form method='post' action='payroll_period.php'>
    <button type='submit'>Payroll By Period</button></form>";

    #dropdown list for eids
    echo "<form action='payroll_eid.php' method='post'><select name = 'eid'>";
    foreach ($eid_list as $eid){
        if($eid_choice==$eid){
            echo"<option value=$eid selected = 'selected'>$eid</option>";
        }
        else{
            echo"<option value=$eid >$eid</option>";
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
    
    if(isset($_POST["eid"])){
        $eid = $_POST["eid"];
        $payroll_list = $dao->get_by_eid($eid);
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