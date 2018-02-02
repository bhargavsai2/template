<?php

require('connection/connection1.php');



if((isset($_POST['name'])&& $_POST['name'] !='')  && (isset($_POST['email'])&& $_POST['email'] !='')){

	$name=mysqli_real_escape_string($conn,$_POST['name']);

	$email=mysqli_real_escape_string($conn,$_POST['email']);

	$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);

	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
	//$passwordHashed=md5( $pass );//password_hash($pass, PASSWORD_BCRYPT);


	//$id=null;
	$sql_e = "SELECT * FROM register WHERE email='$email'";
	$res_e = mysqli_query($conn, $sql_e);
	if(mysqli_num_rows($res_e) > 0){
		http_response_code(500);
  	  echo "Sorry... email already taken"; 	
  	}
else{

$query   = "INSERT INTO register(name,email,mobile,pass) VALUES('" . $name . "','" . $email . "','" . $mobile . "','" . $pass . "')";


	if (mysqli_query($conn, $query)) {
	
   	$to1 = $email;
	$subject1 = "New Friend - Oinky The Piggy Bank";
 $message = file_get_contents('registeremail.php');
// Set content-type header for sending HTML email
	$headers1 = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
	$headers1 .= 'From: support@oinky.in' . "\r\n";
	//$headers1 .= 'Cc: welcome@example.com' . "\r\n";
	//$headers1 .= 'Bcc: welcome2@example.com' . "\r\n";

//header("location: Thankyou_registration.php");
		mail($to1,$subject1,$message,$headers1);
		 

		 http_response_code(200);
		echo "registered Successfully";

}
else{
	 http_response_code(404);
	echo "Please try again";
}
}
}
else
{
	 http_response_code(403);
	echo "Something is missing";
}
mysqli_close($conn);
?>



