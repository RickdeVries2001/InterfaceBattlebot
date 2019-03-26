<?php
include 'connect.php';


if (isset($_POST["submit"])) {
	$input = $_POST['input'];
    $sql1 = "UPDATE score SET score = score + $input WHERE bot_id=1";
	$scoreAdd1 = mysqli_query($conn, $sql1);
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;  
} 
else {  
    echo "Error";
}
?>