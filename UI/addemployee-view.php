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
}
</style> 
</head>  
  <body class="w3-light-grey w3-content" style="max-width:1600px">
    <div class ="container">
        
        <h1>Add Employeee</h1>
        

        <form action='addemployee.php' method='POST'>
            <table id="customers">
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