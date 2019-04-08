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
<h1>Payroll List (EmployeeID)</h1>
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

    #Nav buttons to homepage, payroll_period and payroll_list
    echo"<form method='post' action='employer_nav.php'>
    <button type='submit'>Home Page</button></form>";
    echo"<form method='post' action='payroll_getall.php'>
    <button type='submit'>Payroll List</button></form>";
    echo"<form method='post' action='payroll_period.php'>
    <button type='submit'>Payroll By Period</button></form><hr>";

    #dropdown list for eids
    echo "Select EID: ";
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
      <table class='table table-striped' id='customers' border='1'>
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
        echo "<h3> Viewing Records for EmployeeID: $eid</h3>";
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