<?php include 'Sam/connect.php';
	include 'views/nav.html';
?>
<div class="container">
	<div class="row">
		<div class="col-sm">
			<?php 
				$sql = "SELECT groups, score FROM score";

				if ($stmt = mysqli_prepare($conn, $sql)) {
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $group, $score);
					mysqli_stmt_store_result($stmt);
					echo "<table class='table table-dark'>
							<tbody>";
				while (mysqli_stmt_fetch($stmt)){
					echo "
						
								<tr>
									<td>" . $group . "</td>
									<td>" . $score . "</td>
								</tr>
							
						";
				}
				echo "</tbody>
						</table>";

				}
			?>

			<p class="btn btn-dark">Punten bijtellen: </p>
			<form action="Sam/scoreAdd.php" method="POST">
				<select class="btn btn-dark" name="Group">
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
				<input class="btn btn-dark" type="text" name="input">
				<input class="btn btn-dark" type="submit" name="submit" value="Submit">
			</form>

		</div>
	</div>
</div>