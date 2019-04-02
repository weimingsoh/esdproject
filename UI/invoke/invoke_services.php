<?php
class payroll{
    function get_payroll(){
        $serviceURL = "http://CalvinSiew:8080/payroll1";
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function get_by_eid($id) {
        $serviceURL = "http://CalvinSiew:8080/payroll_by_employeeid/".$id;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function get_by_period($period){
        $serviceURL = "http://CalvinSiew:8080/payroll_by_period/".$period;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function period(){
        $payroll_list = $this->get_payroll();
        $periods = [];
        foreach($payroll_list as $payroll){
            if(!in_array($payroll["period"],$periods )){
                array_push($periods,$payroll["period"]);
            }
        }
        return $periods;
    }
    
    function empids(){
        $payroll_list = $this->get_payroll();
        $empids = [];
        foreach($payroll_list as $payroll){
            if(!in_array($payroll["employeeid"],$empids )){
                array_push($empids  ,$payroll["employeeid"]);
            }
        }
        return $empids;
    }
}

class shift{
    function post_preferred_form($data){
        $url = 'http://CalvinSiew:8080/shifts_add_preferred';
        $ch = curl_init($url);
        $payload = json_encode(array("Add_Shift_Details"=>$data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    function get_preferred_shift_period($period){
        $serviceURL = "http://CalvinSiew:8080/shifts_preferred/".$period;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $preferred_shift_list= $data["PShift_Details"];
        return  $preferred_shift_list;
    }

    function preferred_periods(){
        $serviceURL = "http://CalvinSiew:8080/shifts_getall_preferred";
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $preferred_shift_list= $data['PShift_Details'];
        $periods = [];

        foreach($preferred_shift_list as $shift){
            if(!in_array($shift["period"],$periods )){
                array_push($periods ,$shift["period"]);
            }
        }
        return $periods;
    }






}

?>

