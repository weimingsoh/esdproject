<html>
    <body>
        
        <h1>Edit Employee View</h1>
        <?php
        $employeeid = $_GET["id"];
        #api call for employee detail base on employee id
        include "invoke/new_service_call.php";
        $employee = get_employee($employeeid);
         
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