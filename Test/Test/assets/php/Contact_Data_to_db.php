<?php
require('connection.php');

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$subject=$_POST['subject'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	//$id=null;
	$query="INSERT INTO contacts (name,mobile,subject,email,message)VALUES('$name','$mobile','$subject','$email','$message')";
	if (mysql_query($query, $conn)) {
    	header("location: ../index-1.html");
} else {
    echo "Error: " . $query . "<br>" . mysql_error($conn);
}
}
mysql_close($conn);
?>