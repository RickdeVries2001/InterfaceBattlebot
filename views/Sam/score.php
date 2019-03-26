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

<p>Punten bijtellen: </p>
<form action="scoreAdd.php" method="POST">
<select name="Group">
    <option value="1">Groep A</option>
    <option value="3">Groep B</option>
    <option value="5">Groep C</option>
	<option value="6">Groep D</option>
	<option value="8">Groep E</option>
    <option value="9">Groep G</option>
    <option value="10">Groep H</option>
	<option value="11">Groep I</option>
	<option value="12">Groep J</option>
</select>
<input type="text" name="input">
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>