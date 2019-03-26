<!DOCTYPE html>
<html>
<head>
	<title>score</title>
	<meta charset="utf-8">
</head>
<body>
<?php
include 'connect.php';

$sql = "SELECT groups, score FROM score";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["groups"]. " - Score: " . $row["score"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<p>Punt voor groep A: </p>
<form action="sql1.php" method="POST">
<select name="Group:">
    <option value="GroepA">Groep A</option>
    <option value="GroepB">Groep B</option>
    <option value="GroepC">Groep C</option>
	<option value="GroepD">Groep D</option>
	<option value="GroepE">Groep E</option>
    <option value="GroepG">Groep G</option>
    <option value="GroepH">Groep H</option>
	<option value="GroepI">Groep I</option>
	<option value="GroepJ">Groep J</option>
</select>
<input type="text" name="input">
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>