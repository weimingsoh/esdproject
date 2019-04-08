<?php

class payroll{
    // change const MACHINE to your local machine name
    const MACHINE = "LAPTOP-IP54NA0O";
    function get_payroll(){
        $serviceURL = "http://" . self::MACHINE. ":8085/payroll1";
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function get_by_eid($id) {
        $serviceURL = "http://". self::MACHINE . ":8085/payroll_by_employeeid/".$id;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $payroll_list= $data['Payroll'];
        return  $payroll_list;
    }
    
    function get_by_period($period){
        $serviceURL = "http://". self::MACHINE . ":8085/payroll_by_period".$period;
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
    function send_payroll_email($period){
        $url = "http://". self::MACHINE . ":8085/payroll/".$period;
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 
        $output=curl_exec($ch);
    }
}

class shift{
    // change const MACHINE to your local machine name
    const MACHINE = "LAPTOP-IP54NA0O";

    function post_preferred_form($data){
        $url = "http://". self::MACHINE . ":8082/shifts_add_preferred";
        $ch = curl_init($url);
        $payload = json_encode(array("Add_Shift_Details"=>$data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    function get_preferred_shift_period($period){
        $serviceURL = "http://". self::MACHINE . ":8082/shifts_get_preferred".$period;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $preferred_shift_list= $data["PShift_Details"];
        return  $preferred_shift_list;
    }

    function preferred_periods(){
        $serviceURL = "http://". self::MACHINE . ":8082/shifts_get_all";
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

    function approve_shifts($shift_id){
        $arr = '{
            "Shift_id": '.$shift_id.',
            "EmployeeID": 0,
            "period": "string",
            "p_day": "string",
            "timing": "string",
            "status": "string"
          }';
        $url ="http://". self::MACHINE . ":8082/shifts_approved/".$shift_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        // execute!
        $response = curl_exec($ch);
        //Error handling
        if (curl_error($ch)){
            throw new Exception(curl_error($ch));
    }
    // close the connection, release resources used
    curl_close($ch);
    return $response;
    }

    function reject_shifts($period){
        $url ="http://". self::MACHINE . ":8082/shift_put_rejected/".$period;
        $arr = '{
            "Shift_id": 0,
            "EmployeeID": 0,
            "period": '.$period.',
            "p_day": "string",
            "timing": "string",
            "status": "string"
          }';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        // execute!
        $response = curl_exec($ch);
        //Error handling
        if (curl_error($ch)){
            throw new Exception(curl_error($ch));
        }
        // close the connection, release resources used
        curl_close($ch);
        return $response;
    }

    function send_approved($period){
        $url ="http://". self::MACHINE . ":8082/shifts_send_approved/" . $period;
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 
        $output=curl_exec($ch);

        curl_close($ch);
        return $output;
    }
}

class confirmed_shift{    
    // change const MACHINE to your local machine name
    const MACHINE = "LAPTOP-IP54NA0O";

    function cshift_period($period){
        $url = "http://". self::MACHINE . ":8088/cshifts_get_period/".$period;
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $confirmed_shifts= $data['CShift_Details'];
        return $confirmed_shifts;
    }

    function cshift_all(){
        $url = "http://". self::MACHINE . ":8088/cshifts";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $confirmed_shifts= $data['CShift_Details'];
        return $confirmed_shifts;
    }

    function cshift_eid($eid){
        $url = "http://". self::MACHINE . ":8088/cshifts_get_eid/".$eid;
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $confirmed_shifts= $data['CShift_Details'];
        return $confirmed_shifts;
    }

    function get_periods(){
        $shifts = $this->cshift_all();
        $periods = [];
        foreach($shifts as $shift){
            if (!in_array($shift['period'], $periods)) {
                array_push($periods,$shift['period']);
            }
        }
        return $periods;
    }

    function eyee_periods($period,$eid){
        $url = "http://". self::MACHINE . ":8088/cshifts_get_periodeid/".$period."/".$eid;
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $confirmed_shifts= $data['CShift_Details'];
        return $confirmed_shifts;
    }
}


class employee{
    // change const MACHINE to your local machine name
    const MACHINE = "LAPTOP-IP54NA0O";

    function get_employees(){
        $serviceURL = "http://" . self::MACHINE . ":8081/employees";
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $employee_list= $data['Employee'];
        return $employee_list;
        #return  $payroll_list;
    }
    
    function get_employee($id) {
        $serviceURL = "http://". self::MACHINE . ":8081/employee/".$id;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        #$employee_list= $data['Employee'];
        return  $data;
    }
    
    #put
    function update_employee($id,$data){
        $url = "http://". self::MACHINE . ":8081/employees1/".$id;
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $x = Json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$x);
        $result = curl_exec($ch);
        curl_close($ch);

    }
    
    function create_employee($data){
        $url = "http://". self::MACHINE . ":8081/employee";
        $ch = curl_init($url);
        $payload = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}

?>

