<html>
    <body>
        <h1>Employer View</h1>
        <table border='1'>
            <tr>
                <th>Title</th>
                <th>ISBN 13</th>
                <th>Price</th>
                <th></th>
                <th></th>
            </tr>
<?php     
        //api request for employee database
        $apiemployees = 
            '[
              {
                "id": 1,
                "name": "Soh Wei Ming",
                "address": "Blk 523 Abc Road S987935",
                "phone": 91234562,
                "sex": "Male",
                "nationality": "Singaporean"
              },
              {
                "id": 2,
                "name": "Calvin Tan",
                "address": "Blk 674 Glen Falls Road S545675",
                "phone": 81234563,
                "sex": "Male",
                "nationality": "Singaporean"
              },
              {
                "id": 3,
                "name": "Jane Lim",
                "address": "Blk 4604 Walnut Hill Drive S785467",
                "phone": 92234562,
                "sex": "Female",
                "nationality": "Singaporean"
              },
              {
                "id": 4,
                "name": "Ng Jun Hong",
                "address": "Blk 377 Lords Way S908787",
                "phone": 93234562,
                "sex": "Male",
                "nationality": "Singaporean"
              },
              {
                "id": 5,
                "name": "Lee Cheng Leng",
                "address": "Blk 1977 Drummond Street S467873",
                "phone": 94234547,
                "sex": "Female",
                "nationality": "Singaporean"
              },
              {
                "id": 6,
                "name": "Jazreel Tho",
                "address": "Blk 234 Clarence Court S908768",
                "phone": 95234557,
                "sex": "Female",
                "nationality": "Singaporean"
              },
              {
                "id": 7,
                "name": "Hong Seng",
                "address": "Blk 613 Stark Hollow Road S102345",
                "phone": 96234517,
                "sex": "Male",
                "nationality": "Singaporean"
              }
            ]';
        
        $employees = json_decode($apiemployees, true);    
        foreach($employees as $employee) {
            $employeeobj = (object) $employee;
            

            echo "
            <tr>
                <td>$employeeobj->id</td>
                <td>$employeeobj->name</td>
                <td>$employeeobj->address</td>
                <td>$employeeobj->phone</td>
                <td>$employeeobj->sex</td>
                <td>$employeeobj->nationality</td>
                <td><a href='fire.php?id=$employeeobj->id'>FIRE</a></td>
            </tr>
            ";
            
        }
?>
        <tr><td><a href='addemployee-view.php'>ADD</a></td></tr>
        </table>

    </body>
</html>

