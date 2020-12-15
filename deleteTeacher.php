<?php
session_start();
if(!isset($_SESSION['type'])){
	header("Location:index.php");
}

if(isset($_SESSION['type']) && $_SESSION['type'] !== 'admin'){
	header("Location:index.php");	
}
$host = "localhost";
$username = "root";
$password = "";
$db="data";

$con=mysqli_connect($host,$username,$password,$db) or die("Couldn't connect to the database!!!");

$teacherId = $_GET['teacher_id'];

$deleteTeacher ="DELETE  FROM teacher_reg WHERE teacher_id='$teacherId'";
if(!mysqli_query($con,$deleteTeacher))
{
	echo "CANNOT DELETE Teacher!!!";
}

$deleteUser = "DELETE  FROM login_table WHERE id='$teacherId'";
if(!mysqli_query($con,$deleteUser))
{
	echo "CANNOT Student!!!";
}
else
{
	header('Location:admin.php');
}

?>
