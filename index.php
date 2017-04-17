<?php
    session_start();

       
    if(isset($_GET["Controller"])){
        
        include "Controller/".$_GET["Controller"]."Controller.php";
        
        $class = $_GET["Controller"]."Controller";
    	    
        eval("\$Controller = new $class();");
        
        
        if(isset($_GET["Action"])){
           
           eval("\$Controller->\$_GET['Action']();");
           
        }
    } else{
    	include "Controller/HomeController.php";
    	$class = "HomeController";
    	$Controller = new $class();
    	$Controller->Home();
    }
?>