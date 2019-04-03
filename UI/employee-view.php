<html>
<body>
<h1>Employee View</h1>
<form action = "login_main.php" method = "post">
        <input type = "submit" value = "Logout"/>
        </form>
        <table border='1'>
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