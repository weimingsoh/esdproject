<?php

#class Employee{
    function get_employees(){
        $serviceURL = "http://DESKTOP-I09E16I0:8080/employees";
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        $employee_list= $data['Employee'];
        return $employee_list;
        #return  $payroll_list;
    }
    
    function get_employee($id) {
        $serviceURL = "http://DESKTOP-I0E16I0:8080/employee/".$id;
        $json = file_get_contents($serviceURL);
        $data = json_decode($json, TRUE);
        #$employee_list= $data['Employee'];
        return  $data;
    }
    
    #put
    function update_employee($id,$data){
        $url = 'http://DESKTOP-I0E16I0:8080/employees1/'.$id;
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $x = Json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$x);
        $result = curl_exec($ch);
        curl_close($ch);

    }
    
    function create_employee($data){
        $url = 'http://DESKTOP-I0E16I0:8080/employee';
        $ch = curl_init($url);
        $payload = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }
#}


?>