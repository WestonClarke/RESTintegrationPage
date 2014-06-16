<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if (array_key_exists("card", $_POST) && array_key_exists("fname", $_POST) && array_key_exists("lname", $_POST) && array_key_exists("username", $_POST) && array_key_exists("pw", $_POST)){
        
        if ($_POST['card'] != "") {
            
            if ($_POST['username'] != ""){
                
                if ($_POST['pw'] != ""){
                    
                    //Required fields are validated here 
                    echo "Success";
                    
                } else {
                    
                    echo "Password is required";
                    
                }
                
            } else {
                
                echo "Username is required";
                
            }
            
        } else {
            
            echo "Card number is required";
            
        }
        
    }
    
}

?>