<?php
session_start();
if(isset($_SESSION['type'])){
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
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body align="center">
<h1>Student details</h1>
<table border="1" cellspacing="2" align="center" cellpadding="10px">
<tr>
<td><b>Student ID</td>
<td><b>Name</td>
<td><b>Course</td>
<td><b>Address</td>
<td><b>Email</td>
<td><b>Photo</td>
</tr>
<?php
	$student = "SELECT * FROM student_reg;";
	$result = mysqli_query($con,$student);
	$resultCheck = mysqli_num_rows($result);

	if(isset($resultCheck))
	{
		while($studentRow = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			if($studentRow['photo']) {
				echo "<td><img src=" . $studentRow['photo'] . " height='200' width='200'/></td>";
			}else {
				echo "<td></td>";
			}
			echo "<td>" . $studentRow['student_id'] . "</td>";
			echo "<td>" . $studentRow['name'] . "</td>";
			echo "<td>" . $studentRow['course'] . "</td>";
			echo "<td>" . $studentRow['address'] . "</td>";
			echo "<td>" . $studentRow['email'] . "</td>";
			echo "</tr>";
		}
	}
?>
<tr>
	<td colspan="3"><a href="admin.php" name="viewStudents">Return back</button></td>
</tr>
</table>
</body>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #8b9dc3;
}

h1 {
	text-align: center;
}
table {
	background-color: #3b5998;
	color: white;
}
a {
	font-style: none;
}
</style>
</html>