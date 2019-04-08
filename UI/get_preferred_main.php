<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get Preferred Shifts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <html><head>
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
    <?php
    
    require_once "invoke/invoke_services.php";
    $dao = new shift();
    $period_list = $dao->preferred_periods();

    #check if user chosen a period
    if(isset($_POST["period"])){
        $period_choice = $_POST["period"];
    }
    else{
        $period_choice = "";
    }

    echo "<h1> Preferred Shifts </h1>";
    echo"<form method='post' action='employer_nav.php'>
    <button type='submit'>Home Page</button></form>";
    echo "<hr>";

    #dropdown list for period
    echo "Select Period:";
    echo "<form action='get_preferred_main.php' method='post'><select name = 'period'>";
    
    foreach ($period_list as $period){
        if($period_choice==$period){
            echo"<option value=$period selected = 'selected'>$period</option>";
        }
        else{
            echo"<option value=$period >$period</option>";
        }
      }
    echo "</select><input type='submit' value='Submit'></form><br><br>";
    
    
    #create table headers at first
    echo "<form method='POST' action='process_shifts.php'>";
    echo "<div class='col-md-6'>
      <table class='table table-striped' id='customers' border='1'>
          <tr>
              <th></th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
              <th>Saturday</th>
              <th>Sunday</th>
          </tr>";

    if(isset($_POST["period"])){
        $period = $_POST["period"];        
        echo "<h3> Viewing Preferred Shifts for Period $period</h3>";
        echo '<input type="hidden" id="period" name="period" value="'.$period.'">';
        $preferred_shifts = $dao->get_preferred_shift_period($period);
        // print_r($preferred_shifts);
        $timings = ["Morning","Afternoon","Night"];
        $days = ["Monday","Tuesday","Wednesday","Thursday","Friday", "Saturday","Sunday"];
        $eid_sid = [];
        $timing_days = [];

        foreach($preferred_shifts as $shift){
            $eid = $shift["EmployeeID"];
            $sid = $shift["Shift_id"];
            array_push($eid_sid,[$eid,$sid]);
            $timing_index = array_search($shift["timing"],$timings)+1;
            $day_index = array_search($shift["p_day"],$days)+1;
            array_push($timing_days,[$timing_index,$day_index]);
        }
        
        for($i=1;$i<4;$i++){ // for each timing
            for($j=0;$j<8;$j++){ // for each day
                if($j == 0){ // timings row
                    echo "<tr><td>".$timings[$i-1]."</td>"; 
                }
                elseif($j==7){
                    $pair_index = [$i,$j]; // for sunday
                    if(!in_array($pair_index,$timing_days)){
                        echo "<td></td></tr>";
                    }
                    else{
                        echo "<td>";
                        foreach($timing_days as $index){
                            if($index == $pair_index){
                                echo $eid_sid[array_search($index,$timing_days)][0].
                                "<input type='checkbox' name='tick' value='".$eid_sid[array_search($index,$timing_days)][1]."'>";
                                $remove_index = array_search($index, $timing_days);
                                unset($eid_sid[$remove_index]);
                                unset($timing_days[$remove_index]);
                            }
                        }
                        echo "</td></tr>";
                    }
                }
                else{
                    $pair_index = [$i,$j];
                    if(!in_array($pair_index,$timing_days)){
                        echo "<td></td>";
                    }
                    else{
                        echo "<td>";
                        foreach($timing_days as $index){
                            if($index == $pair_index){
                                echo $eid_sid[array_search($index,$timing_days)][0].
                                "<input type='checkbox' name='tick[]' value='".$eid_sid[array_search($index,$timing_days)][1]."'>";
                                $remove_index = array_search($index, $timing_days);
                                unset($eid_sid[$remove_index]);
                                unset($timing_days[$remove_index]);
                            }
                        }
                        echo "</td>";
                    }
                }
                
            }
        }
        echo"</table>";
        echo "<input type='submit' value='Confirm Shift Schedule'/>";
        echo "</form>";
    }

    ?>
</body>
</html>