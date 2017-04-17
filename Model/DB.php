<?php

	class db{
		private $conn;
	    
	    public function getConnection(){
	        $this->conn = new mysqli("mysql.hostinger.com.br", "u384895831_quent", "123456", "u384895831_quent");
	    }
	    
	    public function execReader($SQL){
	        return $this->conn->query($SQL);
	    }
	    
	    public function execSQL($SQL){
	        return $this->conn->prepare($SQL);
	    }
	    
	    public function __destruct(){
	        $this->conn->close();
	    }
	}

?>
