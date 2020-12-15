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

$con=mysqli_connect($host,$username,$password,$db) or die("Couldn't connect to the database!!!");;
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body align="center">
<h1>Teacher details</h1>
<table border="2" cellspacing="2" align="center" cellpadding="10px">
<tr>
<td><b>Teacher ID</td>
<td><b>Name</td>
<td><b>Department</td>
<td><b>Address</td>
<td><b>Salary</td>
<td><b>Email</td>
<td><b>Photo</td>
</tr>
<?php
	$teacher = "SELECT * FROM teacher_reg;";
	$result = mysqli_query($con,$teacher);
	$resultCheck = mysqli_num_rows($result);

	if(isset($resultCheck))
	{
		while($teacherRow = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			if($teacherRow['photo']){
				echo "<td><img src=" . $teacherRow['photo'] . " height='200' width='200'/></td>";	
			}else{
				echo "<td></td>";
			}
			echo "<td>" . $teacherRow['teacher_id'] . "</td>";
			echo "<td>" . $teacherRow['name'] . "</td>";
			echo "<td>" . $teacherRow['department'] . "</td>";
			echo "<td>" . $teacherRow['address'] . "</td>";
			echo "<td>" . $teacherRow['salary'] . "</td>";
			echo "<td>" . $teacherRow['email'] . "</td>";
			echo "</tr>";
		}
	}
?>
<tr>
	<td colspan="3"><a href="admin.php" name="viewStudents">Return back</button></a></td>	
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