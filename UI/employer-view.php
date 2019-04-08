<html>
<head>
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
        <h1>View Employees</h1>
        <form action = "employer_nav.php" method = "post">
        <input type = "submit" value = "Home Page"/>

        <form action = "login_main.php" method = "post">
        <input type = "submit" value = "Logout"/>
        </form>
        <table border='1' id = 'customers'>
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
        //trial api call
        $dao = new employee();
        $curlemployee = $dao->get_employees();

        foreach($curlemployee as $employee) {
            $employeeobj = (object) $employee;
            

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
            ";
            
        }
?>
        
        </table>
        <button type="button"><a href='addemployee-view.php' >Add Employee</button>
        
    </body>
</html>

