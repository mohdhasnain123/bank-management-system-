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

if(isset($_POST['submit']))
{
	$emp_id=mysqli_real_escape_string($conn,$_POST['emp_id']);
	$emp_password=mysqli_real_escape_string($conn,$_POST['emp_password']);
	$sel_user="SELECT * from employee where emp_id='$emp_id' and emp_password='$emp_password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	if($check_user>0)
	{
		echo"<br>&nbsp&nbspYour Personal Details are :---";
		echo"<br>";
		echo"<br>&nbsp&nbspID-".$row['emp_id'];
		echo"<br>&nbsp&nbspName-".$row['emp_name'];
		echo"<br>&nbsp&nbspPhone-".$row['emp_phone_no'];
		echo"<br>&nbsp&nbspSalary-".$row['emp_salary'];
		echo"<br>";
        echo"<br>&nbsp&nbspCustomer Details are :---";
        echo"<br>";
        $query="SELECT * from customer";
        $query=mysqli_query($conn,$query);
        $row=mysqli_num_rows($query);
       	$arr=mysqli_fetch_array($query);
		while($arr=mysqli_fetch_array($query)){
			echo"<br>";
			echo"Customer Name:: ".$arr['cust_name'];
			echo"\tCustomer ID:: ".$arr['cust_id'];
			echo"\tCustomer Phone:: ".$arr['cust_phn_no'];
			echo"\tCutomer Address::".$arr['cust_address'];
			echo"\tCustomer Gender::".$arr['cust_gender'];
			echo"<br>";
		}	

	}
	else
	{
		echo"wrong!!!!";

	}
}

}

?>