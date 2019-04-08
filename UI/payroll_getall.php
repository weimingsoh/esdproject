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
    <h1>Payroll List</h1>
    <?php
    require_once "invoke/invoke_services.php";
    $dao = new payroll();
    $payroll_list = $dao->get_payroll();

    echo"<form method='post' action='microservices_access.php'>
    <button type='submit'>Home Page</button></form>";
    echo"<form method='post' action='payroll_period.php'>
    <button type='submit'>Payroll By Period</button></form>";
    echo"<form method='post' action='payroll_eid.php'>
    <button type='submit'>Payroll By EmployeeID</button></form><hr>";

    #create table headers
    echo "<div class='col-md-6'>
      <table class='table table-striped' id='customers' border='1'>
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