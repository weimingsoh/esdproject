<!DOCTYPE html>
<html lang="en">
<head>
  <title>FUn Fest Payroll</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body >

<div class="container mt-3">
  <h2>Payroll</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item" >
      <a class="nav-link active" data-toggle="tab" href="#full">Payroll Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#byeid">By Employee ID</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#byperiod">By Period</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <?php require_once "invoke/payroll_get_by_eid.php"?>
  <div class="tab-content">
    <div id="full" class="container tab-pane active"><br>
      <h3>Payroll Details</h3>
      <?php
      $payroll_list = get_payroll();
      echo "<div class='col-md-6'>
      <table class='table table-striped' id='payroll-list' border='1'>
          <tr>
              <th>ID</th>
              <th>EmployeeID</th>
              <th>Period</th>
              <th>Hours</th>
              <th>Wage</th>
              <th>Incentive</th>
          </tr>";
          foreach($payroll_list as $payroll) {
            echo '
              <tr>
                  <td>'                             . $payroll["id"]  . '</td>
                  <td>'                             . $payroll["employeeid"] . '</td>
                  <td>'                             . $payroll["period"]  . '</td>
                  <td>'                             . $payroll["hours"]  . '</td>
                  <td>'                             . $payroll["wages"]  . '</td>
                  <td>'                             . $payroll["incentive"]  . '</td>
              </tr>
            ';
              
          }
      ?>
    </div>
    <div id="byeid" class="container tab-pane fade"><br>
      <h3>By Employee ID</h3>
      <?php
      $empids = empids();
      
      #dropdown list for period
      echo "<form action='home.php' method='post'><select name = 'eid'>
      <option value='' selected = 'selected'></option>";
      foreach ($empids as $id){
        echo"<option value=$id>$id</option>";
        }
      echo "</select><input type='submit' value='Submit'></form><br><br>";
      #create headers for table
      echo "<div class='col-md-6'>
      <table class='table table-striped' id='payroll-list' border='1'>
          <tr>
              <th>ID</th>
              <th>EmployeeID</th>
              <th>Period</th>
              <th>Hours</th>
              <th>Wage</th>
              <th>Incentive</th>
          </tr>";
      #chosen period
      if(isset($_POST["eid"])){
        $eid = $_POST["eid"];
        $payroll_eid = get_by_eid($eid);
          foreach($payroll_eid as $payroll) {
            echo '
              <tr>
                  <td>'                             . $payroll["id"]  . '</td>
                  <td>'                             . $payroll["employeeid"] . '</td>
                  <td>'                             . $payroll["period"]  . '</td>
                  <td>'                             . $payroll["hours"]  . '</td>
                  <td>'                             . $payroll["wages"]  . '</td>
                  <td>'                             . $payroll["incentive"]  . '</td>
              </tr>
            ';
            
              
          }
        }
      ?>
    </div>
    <div id="byperiod" class="container tab-pane fade"><br>
      <h3>By Period</h3>
      <?php
      $periods = period();

      #create dropdown list for period
      echo "<form action = 'home.php' action='post'><select name = 'period'>
      <option value='' selected = 'selected'></option>";
      foreach ($periods as $period){
        echo"<option value=$period>$period</option>";
        }
      echo "</select><input type='submit' value='Submit'></form><br><br>";
      
      #create table headers
      echo "<div class='col-md-6'>
      <table class='table table-striped' id='payroll-list' border='1'>
          <tr>
              <th>ID</th>
              <th>EmployeeID</th>
              <th>Period</th>
              <th>Hours</th>
              <th>Wage</th>
              <th>Incentive</th>
          </tr>";
      
      #chosen period
      if(isset($_POST["period"])){
        $period = $_POST["period"];
        $payroll_period = get_by_period($period);
      
      #display table for period
          foreach($payroll_period as $payroll) {
            echo '
              <tr>
                  <td>'                             . $payroll["id"]  . '</td>
                  <td>'                             . $payroll["employeeid"] . '</td>
                  <td>'                             . $payroll["period"]  . '</td>
                  <td>'                             . $payroll["hours"]  . '</td>
                  <td>'                             . $payroll["wages"]  . '</td>
                  <td>'                             . $payroll["incentive"]  . '</td>
              </tr>
            ';
              
          }
        }
      ?>
    </div>
  </div>
</div>

</body>
</html>
