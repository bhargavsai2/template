<?php
require('connection/connection1.php');
session_start();
// If form submitted, insert values into the database.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // removes backslashes
	$email = stripslashes($_REQUEST['f_email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($conn,$email);
	$password = stripslashes($_REQUEST['f_password']);
	$password = mysqli_real_escape_string($conn,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `register` WHERE email='$email'
and pass='".$password."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['f_email'] = $email;
            // Redirect user to index.php
	   // header("Location: index.php");
	    http_response_code(200);
            //echo "Logged in as: $email";
	    echo "Success!";
         }
         else{
			http_response_code(500);
            echo "Email or Password are in valid";
    }
   }
    else{
    	 http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>