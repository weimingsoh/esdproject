<?php
class ConnectionManager {
    
   
    public function getConnection() {

        $host = "localhost";
        $username = "root";
        $password = "";  
        $dbname = "users";
        $port = 3306;    
        
        $url  = "mysql:host={$server};dbname={$dbname}";
        $conn = new PDO($url, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $conn;  
        
    }
    
}

