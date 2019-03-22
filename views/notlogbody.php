<div class="container">
	<div class="section"></div>
	<h4 class="indigo-text">Please, login into your account</h4>
	<div class="section"></div>
	<form class="col s12" action="login.php" method="post">
		<div class="row">
			<div class="col s12">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='input-field col s12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>'>
				<input type="text" id="username" class="form-control mb-2" placeholder="Username" required autofocus>
				<span class="help-block"><?php echo $username_err; ?></span>
			</div>
		</div>
		<div class='row'>
			<div class='input-field col s12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>'>
				<input type="password" id="password" class="form-control mb-2" placeholder="Password" required autofocus>
				<span class="help-block"><?php echo $password_err; ?></span>
			</div>
		</div>
		<center>
			<div class='row'>
				<div class="col-12">
					<button type='submit' name='btn_login' class='col btn btn-primary'>Login</button>
				</div>
			</div>
		</center>
	</form>
</div>