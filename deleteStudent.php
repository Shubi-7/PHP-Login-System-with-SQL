<?php
session_start();
if(isset($_SESSION['id'])){
	header("Location:deleteStudent.php");
}

if(isset($_SESSION['type']) && $_SESSION['type'] !== 'admin'){
	header("Location:index.php");	
}
$host = "localhost";
$username = "root";
$password = "";
$db="data";

$con=mysqli_connect($host,$username,$password,$db) or die("Couldn't connect to the database!!!");

$userId = $_GET['student_id'];
$deleteStudent ="DELETE FROM student_reg WHERE student_id='$userId'";
if(!mysqli_query($con,$deleteStudent))
{
	echo "CANNOT DELETE STUDENT!!!";
}
$deleteUser = "DELETE FROM login_table WHERE id='$userId'";
if(!mysqli_query($con,$deleteUser))
{
	echo "CANNOT DELETE User!!!";
}
else {
	header('Location:admin.php');
}

?>
