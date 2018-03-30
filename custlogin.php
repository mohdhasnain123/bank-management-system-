<?php
 if($_POST)
 {
$conn= new mysqli('localhost','root','','project');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/

if(isset($_POST['submit1']))
{
	$cust_id=mysqli_real_escape_string($conn,$_POST['cust_id']);
	$cust_password=mysqli_real_escape_string($conn,$_POST['cust_password']);
	$sel_user="SELECT * from customer where cust_id='$cust_id' and cust_password='$cust_password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	$isset=++$_POST['cust_id'];
	if($check_user>0)
	{	
		$cid=$cust_id;
		$query="SELECT A.acc_no,A.balance from Account A where A.cust_id='$cid';";
		$query=mysqli_query($conn,$query);
		$arr=mysqli_fetch_array($query);
		
		
	echo"<br>&nbsp&nbspYour Personal Details are :---";
	echo"<br>";
		
		echo"<br>&nbsp&nbspName-".$row['cust_name'];
		echo"<br>&nbsp&nbspAddress-".$row['cust_address'];
echo"<br>&nbsp&nbspPhone-".$row['cust_phn_no'];

		echo"<br>&nbsp&nbspEmail-".$row['cust_email'];
		echo"<br>";
		echo"<br>&nbsp&nbspYour Account Details are.........";
		echo"<br>";
		echo"<br>&nbsp&nbspAccount No.-".$arr['acc_no'];
		echo"<br>&nbsp&nbspBalance.-".$arr['balance'];

	}
	else
	{
		echo"wrong!!!!";

	}
}

}

?>