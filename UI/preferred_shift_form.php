<!DOCTYPE html>
<html>

   <head>
      <title>Preferred Shift Form</title>
      <style>
            table {
              width:100%;
            }
            table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            th, td {
              padding: 15px;
              text-align: left;
            }
            table#t01 tr:nth-child(even) {
              background-color: #eee;
            }
            table#t01 tr:nth-child(odd) {
             background-color: #fff;
            }
            table#t01 th {
              background-color: black;
              color: white;
            }
            </style>
   </head>
	
   <body>
       <h3>Preferred Schedule</h3>
      <form action="shift_check.php" method='post'>
        <input name="empid" type="hidden" value="1"/>
        <input name="period" type="hidden" value="20190101"/>
         <table id='t01'>
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
                 <td><input type="checkbox" name="Shift[]" value="Monday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Tuesday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Wednesday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Thursday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Friday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Saturday-Morning"></td>
                 <td><input type="checkbox" name="Shift[]" value="Sunday-Morning"></td>
             </tr>
             <tr>
                <td>Afternoon</td>
                <td><input type="checkbox" name="Shift[]" value="Monday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Tuesday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Wednesday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Thursday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Friday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Saturday-Afternoon"></td>
                <td><input type="checkbox" name="Shift[]" value="Sunday-Afternoon"></td>
            </tr>
            <tr>
                <td>Night</td>
                <td><input type="checkbox" name="Shift[]" value="Monday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Tuesday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Wednesday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Thursday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Friday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Saturday-Night"></td>
                <td><input type="checkbox" name="Shift[]" value="Sunday-Night"></td>
            </tr>
         </table>
         <input type='submit' value='Submit'>   
      </form>
   </body>
	
</html>