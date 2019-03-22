<body class="text-center back1">
		<div class="container mt-5 contain justify-content-center align-items-center">
			<form class="mx-auto col-8 loginf mt-5" action="login.php" method="post">
				<h2 class="white_text ">Please, login into your account</h2>
				<div class="row mt-4">
					<div class="col-12">
						<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='input-field col-12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>'>
						<input type="text" id="username" class="form-control mb-2" placeholder="Username" required autofocus>
						<span class="help-block"><?php echo $username_err; ?></span>
					</div>
				</div>
				<div class='row mb-3'>
					<div class='input-field col-12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>'>
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
