<?php
if($_POST)
{
$conn= new mysqli('localhost','root','','project');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
//echo"db connected successfully";
//echo"\n db is selected as test successfully";
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$city=$_POST["city"];
$email=$_POST["email"];
$subject=$_POST["subject"];

$sql="INSERT INTO  `contact`( `firstname`, `lastname`, `city`, `email`, `subject`) VALUES ('$firstname', '$lastname', '$city', '$email', '$subject')";
$xyz=$conn->query($sql);
if($xyz==TRUE)
{
	echo"<br>&nbsp  We will contact you soon......";
	}
else{
	echo"error".$sql."<br>".$conn->error;
}

$conn->close();
}
?>