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
        $serviceURL = "http://CalvinSiew:8080/payroll_by_employeeid".$id;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function get_by_period($period){
        $serviceURL = "http://CalvinSiew:8080/payroll_by_period".$period;
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
    function submit_form($data){
        // $data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                            
        $ch = curl_init('http://CalvinSiew:8080/pshifts');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);

        curl_close($ch);

        var_dump($result);
    }
}
?>

