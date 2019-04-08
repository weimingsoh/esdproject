<!-- <!DOCTYPE html> -->
<html>

   <head>
      <title>Preferred Shift Form</title>
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
   <?php  session_start();
   if (isset($_SESSION['eid'])) {
    $eid = $_SESSION['eid'];
    unset($_SESSION['eid']);
   }
   
   echo "<form action='preferred_shift.php' method='post'>";
   echo "<input name='empid' type='hidden' value='$eid'/>";
   ?>
       <h1>Preferred Schedule</h1>
       <h3> Period: 20190101</h3>
        <input name="period" type="hidden" value="20190101"/>
         <table id='customers'>
             <th>
                <td>Monday</td>
                <td>Tuesday</td>
                <td>Wednesday</td>
                <td>Thursday</td>
                <td>Friday</td>
                <td>Saturday</td>
                <td>Sunday</td>
             </th>
             <tr>
                 <td>Morning</td>
                 <td><input type="checkbox" name="Shift[]" value="Monday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Tuesday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Wednesday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Thursday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Friday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Saturday,Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Sunday,Morning"></td>
             </tr>
             <tr>
                <td>Afternoon</td>
                <td><input type="checkbox" name="Shift[]" value="Monday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Tuesday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Wednesday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Thursday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Friday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Saturday,Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Sunday,Afternoon"></td>
            </tr>
            <tr>
                <td>Night</td>
                <td><input type="checkbox" name="Shift[]" value="Monday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Tuesday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Wednesday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Thursday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Friday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Saturday,Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Sunday,Night"></td>
            </tr>
         </table>
         <input type='submit' value='Submit'>   
      </form>
   </body>
	
</html>