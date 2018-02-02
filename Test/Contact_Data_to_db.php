<?php

require('connection/connection1.php');



if((isset($_POST['name'])&& $_POST['name'] !='')  && (isset($_POST['email'])&& $_POST['email'] !='')){

	$name=$_POST['name'];

	$mobile=$_POST['mobile'];

	$subject=$_POST['subject'];

	$email=$_POST['email'];

	$message2=$_POST['message'];

	//$id=null;

$query   = "INSERT INTO CONTACTS(name,mobile,subject,email,message) VALUES('" . $name . "','" . $mobile . "','" . $subject . "','" . $email . "','" . $message2 . "')";


	if (mysqli_query($conn, $query)) {
	
/************** updated code *********************/





			/************** MAIL TO USER *********************/
    	$to1 = $email;
	$subject1 = "Thank you for your Feedback!!";
	/*$message = "<html><title>Feedback</title><body>";

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
 $message .= "</body></html>";*/
 $message = file_get_contents('emailtemplate.php');
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
$to2 = 'contact@oinky.in';
	$subject2 = "New Feedback!!";
	$message1 = '<html><title>Feedback</title><body>';
 
	$message1 .= '<table width="100%"; rules="all" style="border:1px solid black;" cellpadding="10">';
 
	$message1 .= "<tr><td><img src='https://bhargavsai2.github.io/template/Test/assets/images/logo-footer.png' alt='logo' /></td></tr>";
 
	$message1 .= "<tr><td colspan=2><h3>Name:- $name</h3></td></tr>";
	$message1 .= "<tr><td colspan=2><p>Feedback:- $message2</p></td></tr>";
 
	$message1 .= "<tr><td colspan=2 font='colr:#999999;'><I>Oinky.in<br>Happy Banking :)</I></td></tr>"; 
 
	$message1 .= "</table>";
 
	$message1 .= "</body></html>";

// Set content-type header for sending HTML email
	$headers2 = "MIME-Version: 1.0" . "\r\n";
	$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
	$headers2 .= 'From: support@oinky.in' . "\r\n";
	//$headers2 .= 'Cc: welcome@example.com' . "\r\n";
	//$headers2 .= 'Bcc: welcome2@example.com' . "\r\n";

	$companymail=mail($to2,$subject2,$message1,$headers2);




/************** MAIL TO Company *********************/

if($usermail&&$companymail){
	//header("location: index-1-1.html?status=thanks");
	http_response_code(200);
	echo "Feedback Submitted Successfully";
		//header( "location: ../thankyou.php");
      //  header( "refresh: 5;url= index-1-1.html" );
}
else{
	
	//header( "url= failed.php" );
	http_response_code(500);
	echo "Unable to submit feedback";

} 

    
}	
else {
	http_response_code(403);
    echo "something went wrong";
}
}
else{
	http_response_code(404);
	echo "please Try Again later";
}
mysqli_close($conn);



?>