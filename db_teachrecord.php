<?php 
require("db_config.php");
$tablename="teacher_reg";
$table= "CREATE TABLE IF NOT EXISTS $tablename(
			teacher_id int(4) PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(52) NOT NULL,
			department VARCHAR(40) NOT NULL,
			address VARCHAR(52) NOT NULL,
			salary int(8) NOT NULL,
			email VARCHAR(80) NOT NULL,
			photo VARBINARY(6000) NOT NULL
		);";
mysqli_query($connect,$table);

$name=mysqli_real_escape_string($connect,$_POST['name']);
$dep=mysqli_real_escape_string($connect,$_POST['department']);
$address=mysqli_real_escape_string($connect,$_POST['address']);
$salary=mysqli_real_escape_string($connect,$_POST['salary']);
$email=mysqli_real_escape_string($connect,$_POST['email']);
$password=mysqli_real_escape_string($connect,$_POST['password']);
$type=mysqli_real_escape_string($connect,$_POST['type']);

$currentDirectory=getcwd(); // it wii give the working current directory


$uploadDirectory="/Image_teacher/"; // folder where images are stored
$error=[];
$fileExtensionArray=['jpeg','png','jpg'];
$fileName=$_FILES['upload']['name'];
$fileSize=$_FILES['upload']['size'];
$fileTempName=$_FILES['upload']['tmp_name'];
 
$fileType=$_FILES['upload']['type'];
$extension=explode('.',$fileName);
$fileExtension=strtolower(end($extension));
$uploadPath=$currentDirectory.$uploadDirectory.basename($fileName);
 
if(isset($_POST['submit']))
{
	if(!in_array($fileExtension,$fileExtensionArray))
	{
		$error[]="you can upload only jpeg,jpg,png image";
	}
	
	
	if(empty($error))
	{
		
		 if(move_uploaded_file($fileTempName,$uploadPath)) // upload the image to destination folder
		{
			echo "Image has been uploaded to the floder"."<br>";
		}
		else
		echo "image has not been uploded to the folder";	 
	}
}

$insert_t="INSERT INTO teacher_reg(name,department,address,salary,email,photo) VALUES ('$name','$dep','$address',$salary,'$email','$fileName')";

$insert_login="INSERT INTO login_table(name,password,type) VALUES ('$name','$password','$type');";

mysqli_query($connect,$insert_login);

if(mysqli_query($connect,$insert_t))// store the image in dattabse
{
	echo "image is stored in database";
}
else
{
	echo mysqli_error($connect);
}

$id= mysqli_insert_id($connect); // retrieve the last inserted row id 

$query="select photo from teacher_reg where teacher_id=$id";
$result=mysqli_query($connect,$query); // retive the image name from dattabse
$row=mysqli_fetch_row($result);
$baseurl="http://localhost/Project";// path where the image folder reside
?>
<img src="<?=$baseurl.$uploadDirectory.$row[0];?>" width="200px" height="200px" >


