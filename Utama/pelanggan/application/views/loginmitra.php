<!-- form login --> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/')?>loginmitra/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>loginmitra/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?= base_url('assets/loginmitra/images/02.jpg')?>);">
					<span class="login100-form-title-1">
						Sign In Mitra Catering
					</span>
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url('mitra/loginmitra/aksi_login'); ?>" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text"  placeholder="Enter username" name = "username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password"  placeholder="Enter password" name = "password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" value = "Login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/')?>loginmitra/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('assets/')?>loginmitra/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/')?>loginmitra/js/main.js"></script>

</body>
</html>