<div class="container mt-5 contain justify-content-center align-items-center">
	<form class="mx-auto col-8 loginf mt-5" action="functions/login_script.php" method="post">
		<h2 class="white_text ">Please, login into your account</h2>
		<div class="row mt-4">
			<div class="col-12">
				<div class="form-group">
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='input-field col-12'>
				<input type="text" name="username" class="form-control mb-2" placeholder="Username" required autofocus>
			</div>
		</div>
		<div class='row mb-3'>
			<div class='input-field col-12'>
				<input type="password" name="password" class="form-control mb-2" placeholder="Password" required autofocus>
			</div>
		</div>
		<center>
			<div class='row'>
				<div class="col-12">
					<button type='submit' name='submit' class='col btn btn-primary'>Login</button>
				</div>
			</div>
		</center>
	</form>
</div>
