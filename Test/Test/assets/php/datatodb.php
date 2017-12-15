<?php
require('connection.php');
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$subject=$_POST['subject'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$sql="INSERT INTO 'CONTACTS'(name,mobile,subject,email,message)VALUES($name,$mobile,$subject,$email,$message)";
	if (mysql_query($conn, $sql)) {
    	echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);
}
?>