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
$cust_name=$_POST["cust_name"];
$cust_phn_no=$_POST["cust_phn_no"];
$cust_address=$_POST["cust_address"];
$cust_email=$_POST["cust_email"];
$cust_password=$_POST["cust_password"];
$cust_gender=$_POST["cust_gender"];

$sql="INSERT INTO `customer`(`cust_name`, `cust_phn_no`, `cust_address`, `cust_email`, `cust_password`,`cust_gender`) VALUES ('$cust_name','$cust_phn_no','$cust_address','$cust_email','$cust_password','$cust_gender')";
$xyz=$conn->query($sql);
if($xyz==TRUE)
{
	
	echo"<br>&nbsp  The details you Entered are :-----";
	echo"<br><br>Name-", $_POST["cust_name"];
	echo"<br>Phone-", $_POST["cust_phn_no"];
	$name=$_POST["cust_name"];
	
	echo"<br>Address-", $_POST["cust_address"];
	echo"<br>Email-", $_POST["cust_email"];
	echo"<br>Password-", $_POST["cust_password"];
        $query="SELECT cust_id from customer WHERE cust_name='$name';";
		$rs=mysqli_fetch_row(mysqli_query($conn,$query));
		echo "<br>";
	echo"<br>For your account confimation you need to come to the bank";
	echo "<br>";
	echo"<br>&nbsp&nbspCustomer ID.-".$rs[0];
}
else{
	echo"error".$sql."<br>".$conn->error;
}

$conn->close();
}
?>