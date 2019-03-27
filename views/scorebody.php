<?php include 'Sam/connect.php';
	include 'views/nav.html';
?>
<div class="container">
	<div class="row">
		<div class="col-sm">
			<?php 
				$sql = "SELECT groups, score FROM score ORDER BY score desc";

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

			<form action="Sam/scoreAdd.php" method="POST">
				<select class="btn btn-dark" name="Group">
					<?php
					$sql2 = "SELECT bot_id, groups FROM score";

					if ($stmt = mysqli_prepare($conn, $sql2)) {
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt, $id, $groups);
						mysqli_stmt_store_result($stmt);

					while (mysqli_stmt_fetch($stmt)) {
						echo "<option value=" . $id . ">" . $groups . "</option>";
					}
					}
					?>
				</select>
				<input class="btn btn-dark" type="text" name="input">
				<input class="btn btn-dark" type="submit" name="submit" value="Punten bijtellen!">
			</form>

		</div>
	</div>
</div>