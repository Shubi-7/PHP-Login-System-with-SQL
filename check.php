<?php 
	session_start();
	require("db_config.php");
	$username=$_POST['name'];
	$password=$_POST['password'];
	$account=$_POST['type'];

	$query='SELECT * FROM login_table where name="$username" and password="$password" and type="$account"';
	$result=mysqli_query($connect,$query);
	if ($result) {
		$_SESSION['name']=$row['name'];
		$_SESSION['password']=$row['password'];
		$_SESSION['type']=$row['type'];
		header("Location: $account.php");
		exit();
	}
	else{
		header('Location: login.php?a=invalid_credentials');
	}

?>