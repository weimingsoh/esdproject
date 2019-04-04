<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payroll List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #payroll-list {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #payroll-list td, #payroll-list th {
    border: 1px solid #000000;
    padding: 8px;
    }

    #payroll-list tr:nth-child(even){background-color: #DCDCDC;}

    #payroll-list tr:hover {background-color: #ddd;}

    #payroll-list th {
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
    
}
    </style>
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
    echo"<div class='topnav'>
    <a href=employer-view.php>Employer View</a>
    <a href='payroll_getall.php'>Payroll List</a>
    <a href='payroll_eid.php'>Payroll EmployeeID</a>
    </div>";
    

    
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
    
    #dropdown list for period
    echo "<form action='payroll_period.php'  method='post'><select name = 'period'>";
    foreach ($period_list as $period){
        if($period_choice==$period){
            echo"<option value=$period selected = 'selected'>$period</option>";
        }
        else{
            echo"<option value=$period >$period</option>";
        }
      }
    echo "</select><input type='submit' value='Submit'></form><br><br>";
    
    ?>
</body>

</html>