<html><head>
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
    <body>
        
        <h1>Edit Employee View</h1>
        <?php
        $employeeid = $_GET["id"];
        #api call for employee detail base on employee id
        include "invoke/invoke_services.php";
        $dao = new employee();
        
        $employee = $dao->get_employee($employeeid);
         
        $employeeobj = (object) $employee;          
        
        echo "
        <form action='editemployee.php' method='post'>
            <table>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        <input type='text' name='id' value= '$employeeobj->id'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <input type='text' name='name' value= '$employeeobj->name'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        <input type='text' name='address' value= '$employeeobj->address'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone
                    </td>
                    <td>
                        <input type='text' name='phone' value= '$employeeobj->phone'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sex
                    </td>
                    <td>
                        <input type='text' name='sex' value= '$employeeobj->sex'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nationality
                    </td>
                    <td>
                        <input type='text' name='nationality' value= '$employeeobj->nationality'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type='text' name='email' value= '$employeeobj->email'/>
                    </td>
                </tr>
            </table>
            
            <input type='submit' action ='editemployee.php' />
        
        </form>
        
    </body>
</html>
"



?>