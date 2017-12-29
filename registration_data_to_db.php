<?php

require('connection/connection1.php');



if((isset($_POST['name'])&& $_POST['name'] !='')  && (isset($_POST['email'])&& $_POST['email'] !='')){

	$name=mysqli_real_escape_string($conn,$_POST['name']);

	$email=mysqli_real_escape_string($conn,$_POST['email']);

	$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);

	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
	$passwordHashed=md5( $pass );//password_hash($pass, PASSWORD_BCRYPT);


	//$id=null;

$query   = "INSERT INTO register(name,email,mobile,pass) VALUES('" . $name . "','" . $email . "','" . $mobile . "','" . $passwordHashed . "')";


	if (mysqli_query($conn, $query)) {
	
/************** updated code *********************/





			/************** MAIL TO USER *********************/
    	/*$to1 = $email;
	$subject1 = "Thank you for your Feedback!!";
	$message = "<html><title>Feedback</title><body>";

  	$message .= "<div style='width:100%; border:2px solid rgba(107, 30, 178, 0.92);'>
    <header style='background:linear-gradient(45deg,rgba(73, 8, 71, 0.92) 0%, rgba(107, 30, 178, 0.92) 100%);'>
      <img style='padding-left:46%; padding-top:5px;' src='https://bhargavsai2.github.io/template/Test/assets/images/logo.png' alt='logo' />
    </header>";
	$message .= " <div style='padding: 10px;'>
      <h3>Hi <b>$name</b>,</h3><br><h3 style='padding-left: 70px;'>Thank you for your Feedback mate we look forward to solve any technical issues.</h3>
      
    </div>";
 
	$message .= "<footer style='padding: 10px; padding-top:40px;'>
      <p><I>Oinky.in<br>Happy Banking :)</I></p>
    </footer>
  </div>"; 
 $message .= "</body></html>";
// Set content-type header for sending HTML email
	$headers1 = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
	$headers1 .= 'From: support@oinky.in' . "\r\n";
	//$headers1 .= 'Cc: welcome@example.com' . "\r\n";
	//$headers1 .= 'Bcc: welcome2@example.com' . "\r\n";

	$usermail=mail($to1,$subject1,$message,$headers1);



				/************** MAIL TO USER *********************/




				/************** MAIL TO Company *********************/




/************** MAIL TO Company *********************/

/*if($usermail){
	//header("location: index-1-1.html?status=thanks");
	//http_response_code(200);
		header( "location: thankyou.php");
      //  header( "refresh: 5;url= index-1-1.html" );
}
else{
	
	header( "url= failed.php" );

} 

    
}	
else {
    header( "url= failed.php" );
}
}
else{
	header( "url= failed.php" );
}
mysqli_close($conn);
*/
header("location: Thankyou_registration.php");
}
else{
	echo "error";
}

}
else
{
	echo "no value found";
}
mysqli_close($conn);
?>

/* need to update
	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO users (username, email, password) 
      	    	  VALUES ('$username', '$email', '".md5($password)."')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
*/


