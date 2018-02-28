<?php

class Databases{  
 
public $con;  
public function __construct()  
    {  
        $this->con = mysqli_connect("localhost", "root", "", "finalproject");  
        if(!$this->con)  
        {  
           echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
        }  
    }

public function ses($user_check)
    {
	$sesrs="SELECT username FROM users WHERE username='$user_check' ";
	$sesquery = mysqli_query($this->con, $sesrs);
	$rowrs=mysqli_fetch_assoc($sesquery);
	return $rowrs;
    }    
     
 }
