<?php
	include 'db.php';
?>

<?php
  if(isset($_POST['submit'])){
  	$username = ($_POST['username']);
  	$password = ($_POST['password']);
  	$SQLstring = "SELECT ID, pass, username, btname FROM users WHERE username = ?";
  		if ($stmt = mysqli_prepare($conn, $SQLstring)) {
  			mysqli_stmt_bind_param($stmt, "s", $username);
  			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_bind_result($stmt, $id, $pw, $unamedb, $robotname);
  				mysqli_stmt_store_result($stmt);
  				if (mysqli_stmt_num_rows($stmt) > 0) {
  					mysqli_stmt_fetch($stmt);
  					if($password === $pw) {
						$expire = time()+80000;
  						setcookie("id", $id, $expire);
						  echo "<p>Je bent ingelogd!</p>";
						  print_r($_COOKIE);
						  header('Location: ../score.php');
						  exit;
  					}
  					else { echo 'Verkeerd wachtwoord!';}
  				}
  				else { echo 'Deze combinatie bestaat niet!'; }
		  	}
		  else{
			  echo "execute error";
		  }	
		}
		else {
			echo "prep error";
		  }

  	}

?>
