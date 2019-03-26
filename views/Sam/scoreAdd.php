<?php
include 'connect.php';


if (isset($_POST["submit"])) {

	$input = $_POST['input'];
	$sql1 = "UPDATE score SET score = score + $input WHERE bot_id=?";
	$scoreAdd1 = mysqli_query($conn, $sql1);
	$botID = htmlentities($_POST["Group"]);

	if ($stmt = mysqli_prepare($conn, $sql1)) {
		mysqli_stmt_bind_param($stmt, "i", $botID);
		mysqli_stmt_execute($stmt);

	}
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;  
} 
else {  
    echo "Error";
}
?>