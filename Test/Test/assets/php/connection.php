<html>
<body>
<?php
$conn=mysql_connect("localhost","root","");
if(!$conn){

	die("connection failed".mysql_error($conn));
}
else{
	echo "";
	
}
mysql_select_db("oinky_db",$conn);
//mysql_close($conn);
?>
</body>
</html>