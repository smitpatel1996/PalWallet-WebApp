<?php
session_start();
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
        $handle = $_SESSION["handle"];
	$amount = $_POST['amount'];
	$name = $_POST['name'];
	$reason = $_POST['reason'];
	$servername = "mysql.hostinger.in";
	$username = "u629516793_pvr";
	$password = "smitpatel1996";
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
   		die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_select_db($conn,"u629516793_udb");
	$bool = "INSERT INTO firsttable VALUES ('L','{$handle}','{$amount}','{$name}','{$reason}',CURDATE());";
	mysqli_query($conn, $bool);
	mysqli_close($conn);
	header('Location: http://www.palwallet.16mb.com/html/PalWallet.html#success');
	die();
}
?> 