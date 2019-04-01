<?php

class User {
    // property declaration
    public $id;
    public $username;    
    public $password;
    
    
    public function __construct($id,$username,$password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        
    }
    
    public function authenticate($enteredPwd) {
        return password_verify ($enteredPwd, $this->password);
    }
}

?>