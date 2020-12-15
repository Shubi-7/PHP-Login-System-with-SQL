<?php
//creating session to prevent from directly go in admin page.
session_start();
if(isset($_SESSION['type'])){
	header("Location:admin.php");
}
//if session type is not equal to admin then redirect to login page.
if(isset($_SESSION['type']) && $_SESSION['type'] !== 'admin'){
	header("Location:index.php");	
}

$host = "localhost";
$username = "root";
$password = "";
$db="data";

$con=mysqli_connect($host,$username,$password,$db) or die("not connected to the database!!!");
?>
<!-- //HTML for displaying the values from database in proper order -->
<!DOCTYPE html>
<html>
<head>
<h1 align="center">Admin Page</h1>
<a href="logout.php">Logout</a>
</head>
<body align="center">
<!-- Table for displaying students name and ID -->
<h1>Student details</h1>
<table border="1" cellspacing="3" cellpadding="5" align="center">
<tr align="center">
<td><b>Student ID</td>
<td><b>Name</td>
<td><b>Course</td>
<td><b>Address</td>
<td><b>Email</td>
<td colspan="2"><b>Edit</td>
</tr>
<?php
	$student = "SELECT * FROM student_reg;";
	$result = mysqli_query($con,$student);
	$resultCheck = mysqli_num_rows($result);

	if(isset($resultCheck))
	{
		while($studentRow = mysqli_fetch_assoc($result))
		{
			echo "<td>" . $studentRow['student_id'] . "</td>";
			echo "<td>" . $studentRow['name'] . "</td>";
			echo "<td>" . $studentRow['course'] . "</td>";
			echo "<td>" . $studentRow['address'] . "</td>";
			echo "<td>" . $studentRow['email'] . "</td>";
			echo "<td>";  
			echo "<td>" ?><a href="deleteStudent.php?id=<?php echo $studentRow['student_id']; ?>"><buton>DELETE</buton></a>
			<?php  echo "</td>";
			echo "</tr>";
		}
	}
?>
</table>

<a href="studentform.php" name="addStudent">Add Student</button></a>
<a href="student.php" name="viewStudents">View Student data</button></a>


<!-- Table for displaying teachers name and ID -->
<h1>Teacher details</h1>
<table border="2" cellspacing="2" align="center">
<tr align="center">
<td><b>Teacher ID</td>
<td><b>Name</td>
<td><b>Department</td>
<td><b>Address</td>
<td><b>Salary</td>
<td><b>Email</td>
<td colspan="2"><b>Edit</td>	
</tr>
<tr>
<?php
	$teacher = "SELECT * FROM teacher_reg;";
	$result = mysqli_query($con,$teacher);
	$resultCheck = mysqli_num_rows($result);

	if(isset($resultCheck))
	{
		while($teacherRow = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td>" . $teacherRow['teacher_id'] . "</td>";
			echo "<td>" . $teacherRow['name'] . "</td>";
			echo "<td>" . $teacherRow['department'] . "</td>";
			echo "<td>" . $teacherRow['address'] . "</td>";
			echo "<td>" . $teacherRow['salary'] . "</td>";
			echo "<td>" . $teacherRow['email'] . "</td>";
			echo "<td>"; ?><a href="deleteTeacher.php?id=<?php echo $teacherRow['teacher_id']; ?>"><buton>DELETE</buton></a>
			<?php  echo "</td>";
			echo "</tr>";
		}
	}

?>
</tr>
</table>
<a href="teacherform.php" name="addTeacher">Add Teacher</button></a>
<a href="teacher.php" name="viewTeacher">View Teacher data</button></a>

<!-- Table for displaying users info -->
<h1>Users details</h1>
<table border="2" cellspacing="5" align="center" width="300px">
<tr>
<td><b>ID</td>
<td><b>Username</td>
<td><b>Password</td>
<td><b>Type</td>
</tr>
<?php
	$users = "SELECT * FROM login_table where type != 'admin';";//display user data except admin.
	$result = mysqli_query($con,$users);
	$resultCheck = mysqli_num_rows($result);

	if(isset($resultCheck))
	{
		while($usersRow = mysqli_fetch_assoc($result))//get userame and password from user.
		{
			echo "<tr>";
			echo "<td>" . $usersRow['id'] . "</td>";
			echo "<td>" . $usersRow['name'] . "</td>";
			echo "<td>" . $usersRow['password'] . "</td>";
			echo "<td>" . $usersRow['type'] . "</td>";
			echo "</tr>";
		}
	}
?> 
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
	border: 2px;
	text-decoration: none;
  	background : #FFFFFF;
}
</style>
</html>

