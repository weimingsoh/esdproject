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
    $payroll_list = $dao->get_payroll();

    echo"<form method='post' action='payroll_period.php'>
    <button type='submit'>Payroll By Period</button></form>";
    echo"<form method='post' action='payroll_eid.php'>
    <button type='submit'>Payroll By EmployeeID</button></form>";

    #create table headers
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
    
    
    ?>
</body>
</html>