<?php
$username="root";
$password="";
$host="localhost";
$dbname="data";

$connect=mysqli_connect($host,$username,$password);


$db = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($connect,$db);

mysqli_select_db($connect,$dbname)
or die("Could not select the database.");
$tablelogin="login_table";
$table_login="CREATE TABLE IF NOT EXISTS $tablelogin(
			name VARCHAR(80) PRIMARY KEY,
			password VARCHAR(40) NOT NULL,
			type VARCHAR(52) NOT NULL		
		);";

mysqli_query($connect,$table_login);

?>