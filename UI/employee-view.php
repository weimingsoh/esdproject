<html><head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
  <body class="w3-light-grey w3-content" style="max-width:1600px">
    <div class ="container">
<h1>Employee View</h1>
<div class='topnav'>
        <a href='#'>Confirmed Shift</a>
        <a href='preferred_shift.php'>Preferred Shift</a>
        <button type ='button'><a href='login_main.php' > Logout</button>
        </div>
        <table id ="customers" border='1'>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
<?php
include "invoke/invoke_services.php";
Session_start();
$employeeid = $_SESSION["empid"];
// $employeeid = 1;
$dao = new employee();
$employee = $dao->get_employee($employeeid);
#missing cfm shift and preferred shift.
echo "
            
                <tr>
                    <td>".$employee['id']."</td>
                    <td>".$employee['name']."</td>
                    <td>".$employee['address']."</td>
                    <td>".$employee['phone']."</td>
                    <td>".$employee['sex']."</td>
                    <td>".$employee['nationality']."</td>
                    <td>".$employee['email']."</td>
                    <td><a href='edit-employee-view.php?id=".$employee['id'].">Edit</a></td>
                </tr>
                
            </table>";
?>
</body>
</html>