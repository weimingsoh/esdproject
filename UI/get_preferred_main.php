<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get_Preferred_Shifts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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

    #Nav buttons to payroll_eid and payroll_list
    echo"<form method='post' action='payroll_getall.php'>
    <button type='submit'>Payroll List</button></form>";
    echo"<form method='post' action='payroll_eid.php'>
    <button type='submit'>Payroll By EmployeeID</button></form>";

    #dropdown list for period
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
    echo "<div class='col-md-6'>
      <table class='table table-striped' id='payroll-list' border='1'>
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
        print_r($timing_days);

        for($i=1;$i<4;$i++){
            for($j=0;$j<8;$j++){
                if($j == 0){
                    echo "<tr><td>".$timings[$i-1]."</td>";
                }
                elseif($j==7){
                    $pair_index = [$i,$j];
                    if(!in_array($pair_index,$timing_days)){
                        echo "<td></td></tr>";
                    }
                    else{
                        echo "<td>";
                        foreach($timing_days as $index){
                            if($index == $pair_index){
                                echo $eid_sid[array_search($index,$timing_days)][0].
                                "<input type='checkbox' name='tick' value='".$eid_sid[array_search($index,$timing_days)][1]."'>";
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
                                "<input type='checkbox' name='tick' value='".$eid_sid[array_search($index,$timing_days)][1]."'>";
                            }
                        }
                        echo "</td>";
                    }
                }
                
            }
        }
        echo"</table>";
    }
    ?>
</body>
</html>