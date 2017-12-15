<?php
require('connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$subject=$_POST['subject'];
	$email=$_POST['email'];
	$message2=$_POST['message'];
	//$id=null;
	$query="INSERT INTO contacts (name,mobile,subject,email,message)VALUES('$name','$mobile','$subject','$email','$message2')";
	if (mysql_query($query, $conn)) {
    	

							/************** updated code *********************/





			/************** MAIL TO USER *********************/
    	$to1 = $email;
	$subject1 = "Thank you for your Feedback!!";
	$message = '<html><title>Feedback</title><body>';
 
	$message .= '<table width="100%"; rules="all" style="border:0px solid white;" cellpadding="10">';
 
	$message .= "<tr><td><img src='https://bhargavsai2.github.io/template/Test/assets/images/logo-footer.png' alt='logo' /></td></tr>";
 
	$message .= "<tr><td colspan=2><h3>Dear $name,</h3><br /><br />Thank you for your Feedback mate we look forward to solve any technical issues.</td></tr>";
 
	$message .= "<tr><td colspan=2 font='colr:#999999;'><I>Oinky.in<br>Happy Banking :)</I></td></tr>"; 
 
	$message .= "</table>";
 
	$message .= "</body></html>";

// Set content-type header for sending HTML email
	$headers1 = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
	$headers1 .= 'From: bhargav.babi5@gmail.com' . "\r\n";
	$headers1 .= 'Cc: welcome@example.com' . "\r\n";
	$headers1 .= 'Bcc: welcome2@example.com' . "\r\n";

	$usermail=mail($to1,$subject1,$message,$headers1);



				/************** MAIL TO USER *********************/




				/************** MAIL TO Company *********************/
$to2 = 'bhargav.babi5@gmail.com';
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
	$headers2 .= 'From: bhargav.babi5@gmail.com' . "\r\n";
	$headers2 .= 'Cc: welcome@example.com' . "\r\n";
	$headers2 .= 'Bcc: welcome2@example.com' . "\r\n";

	$companymail=mail($to2,$subject2,$message1,$headers2);




/************** MAIL TO Company *********************/

if($usermail&&$companymail){
	//header("location: index-1-1.html");
	http_response_code(200);
           echo "your feedback sent .";
}
else{
	echo "please try again.";
}




    	
    	} 

    	else {
    echo "please try again.";
}
}
else{
	echo "unable to submit your feedback!!";
}
/************** Updated code end *********************/


mysql_close($conn);

?>