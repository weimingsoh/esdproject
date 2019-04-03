<html>
<head>
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
  border-collapse: collapse;
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
        <h1>Employer View</h1>
        <div class='topnav'>
        <a href='#'>Confirmed Shift</a>
        <a href='payroll_getall.php'>Payroll</a>
        <a href='preferred_shift.php'>Preferred Shift</a>
        <button type ='button'><a href='login_main.php' > Logout</button>
        </div>

        <table id ="customers"border='1'>
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

        //api request for employee database
        $apiemployees = 
            '[
              {
                "id": 1,
                "name": "Soh Wei Ming",
                "address": "Blk 523 Abc Road S987935",
                "phone": 91234562,
                "sex": "Male",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 2,
                "name": "Calvin Tan",
                "address": "Blk 674 Glen Falls Road S545675",
                "phone": 81234563,
                "sex": "Male",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 3,
                "name": "Jane Lim",
                "address": "Blk 4604 Walnut Hill Drive S785467",
                "phone": 92234562,
                "sex": "Female",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 4,
                "name": "Ng Jun Hong",
                "address": "Blk 377 Lords Way S908787",
                "phone": 93234562,
                "sex": "Male",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 5,
                "name": "Lee Cheng Leng",
                "address": "Blk 1977 Drummond Street S467873",
                "phone": 94234547,
                "sex": "Female",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 6,
                "name": "Jazreel Tho",
                "address": "Blk 234 Clarence Court S908768",
                "phone": 95234557,
                "sex": "Female",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              },
              {
                "id": 7,
                "name": "Hong Seng",
                "address": "Blk 613 Stark Hollow Road S102345",
                "phone": 96234517,
                "sex": "Male",
                "nationality": "Singaporean",
                "email": "@hotmail.com"
              }
            ]';
        
        #$employees = json_decode($curlemployee, true);
        #$singleemployee = get_employee("1");
        #how to call single employee as object
        #var_dump ($singleemployee); 
        #$testemp = (object) $singleemployee;
        #echo $testemp->id;   
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
        </div>
    </body>
</html>

