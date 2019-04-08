<html>
<head>
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
        
        <h1>Add Employeee</h1>
        

        <form action='addemployee.php' method='POST'>
            <table>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        <input type='text' name='id'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <input type='text' name='name'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        <input type='text' name='address'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone
                    </td>
                    <td>
                        <input type='text' name='phone'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sex
                    </td>
                    <td>
                        <input type='text' name='sex' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Nationality
                    </td>
                    <td>
                        <input type='text' name='nationality'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type='text' name='email'/>
                    </td>
                </tr>
            </table>
            
            <input type='submit' action ='addemployee.php'/>
        
        </form>
        
    </body>
</html>