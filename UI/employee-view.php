<html>
<body>
<h1>Employee View</h1>
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
include "invoke/new_service_call.php";
$username = $_GET['username'];
$employeeid = 1;
$employee = get_employee($employeeid);
         
$employeeobj = (object) $employee;     
#missing cfm shift and preferred shift.
echo "
            
                <tr>
                    <td>$employeeobj->id</td>
                    <td>$employeeobj->name</td>
                    <td>$employeeobj->address</td>
                    <td>$employeeobj->phone</td>
                    <td>$employeeobj->sex</td>
                    <td>$employeeobj->nationality</td>
                    <td>$employeeobj->email</td>
                    <td><a href='edit-employee-view.php?id=$employeeobj->id'>Edit</a></td>
                </tr>
                
            </table>";
?>
</body>
</html>