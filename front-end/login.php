<?php
  //Hier is Stefan schepers mee bezig
	session_start();
	include 'dbConn.php';
?>

<?php
if(isset($_SESSION['loggedIn'])){
  echo 'Je bent al ingelogd!';
  die();
}

if(isset($_POST['submit'])){
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$SQLstring = "SELECT id, pass FROM users WHERE username = ?";
		if ($stmt = mysqli_prepare($conn, $SQLstring)) {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $id, $pass);
			mysqli_stmt_store_result($stmt);
			if (mysqli_stmt_num_rows($stmt) > 0) {
				mysqli_stmt_fetch($stmt);
				if($password === $pass) {
					$_SESSION['loggedIn'] = true;
					$_SESSION['ID'] = $id;
					echo "<p>Je bent ingelogd!</p>";
					header('Location: index.php');
				}
				else { echo 'Verkeerd wachtwoord!';}
			}
			else { echo 'Deze combinatie bestaat niet!'; }
		}
	}

?>
    <form action="login.php" method="post">
        <p>Username <input type="text" name="username"/></p>
        <p>Password <input type="password" name="password"/></p>
        <p><input name="submit" type="submit" value="Inloggen" /></p>
    </form>
