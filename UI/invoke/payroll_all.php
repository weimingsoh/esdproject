<?php
require_once 'include/common.php';
$serviceURL = "http://CalvinSiew:8080/payroll1";
$json = file_get_contents($serviceURL);
$data = json_decode($json, TRUE);
$payroll_list= $data['Payroll'];
$periods = [];
$empids = [];

foreach($payroll_list as $payroll){
    if(!in_array($payroll["period"],$periods )){
        array_push($periods,$payroll["period"]);
    }
        
}
foreach($payroll_list as $payroll){
    if(!in_array($payroll["employeeid"],$empids )){
        array_push($empids  ,$payroll["employeeid"]);
    }
}
?>

<html>
    <body>
        <!-- <?php include 'include/header.php' ; ?> -->
        
        
        <div class="col-md-6">
          <table class='table table-striped' id='payroll-list' border='1'>
              <tr>
                  <th>ID</th>
                  <th>EmployeeID</th>
                  <th>Period</th>
                  <th>Hours</th>
                  <th>Wage</th>
                  <th>Incentive</th>
              </tr>
<?php            
    
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
              
          } // foreach 
        //   <td><a href="add-to-cart.php?id=' . $book['isbn13'] . '">add to cart</a></td>
?>
          </table>
        </div>
    </body>
</html>  


