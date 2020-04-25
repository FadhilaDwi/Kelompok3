<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<!-- Site favicon -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>login/images/favicon.ico">
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <!-- Icon Font -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>login/fonts/ionicons/css/ionicons.css">
	<!-- Text Font -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>login/fonts/font.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>login/css/bootstrap.css">
    <!-- Normal style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>login/css/style.css">
    <!-- Normal media CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>login/css/media.css">
</head>
<body>

	<!-- Header start -->
	<div class="header-wrap">
		<div class="clearfix">
			<div class="logo">
				<a href="index.php"><img src="<?php echo base_url('assets/') ?>login/images/logo.svg" alt=""></a>
			</div>
			<div class="menu">
				<div class="dropdown">
					<a class="dropdown-toggle hamburgler" href="#" role="button" data-toggle="dropdown">
						<span class="menu-icon">
							<div class="bun top"></div>
							<div class="meat"></div>
							<div class="bun bottom"></div>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul>
							<li><a class="dropdown-item" href="#">drop a</a></li>
							<li><a class="dropdown-item" href="#">drop b</a></li>
							<li><a class="dropdown-item" href="#">drop c</a></li>
							<li><a class="dropdown-item" href="#">drop d</a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header end -->
	<main class="cd-main">
		<section class="cd-section index5 visible">
			<div class="cd-content style5">
				<div class="login-box">
					<div class="row no-gutters height-100-percentage">
						<!-- login style5 left side start -->
						<div class="col-md-4 col-sm-12 style5-left">
							<div class="d-flex height-100-percentage padding-30px">
								<div class="align-self-center width-100-percentage">
									<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
									<a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a>
								</div>
							</div>
						</div>
						<!-- login style5 left side end -->
						<!-- login style5 right side start -->
						<div class="col-md-8 col-sm-12 style5-right">
							<div class="login-form-slider">
								<!-- login slide start -->
								<div class="login-slide slide">
									<div class="sign-up-txt">
										Don't have an account? <a href="javascript:;" class="sign-up-click">Register Now</a>
									</div>
									<div class="d-flex height-100-percentage max-width-400 margin-0-auto padding-10px">
										<div class="align-self-center width-100-percentage">
											<h2>Sign in to You Login </h2>
											<form action = "<?php echo base_url('login/aksi_login') ?>" class="floating-form" method="post">
												<div class="form-group">
													<input type="text" name="username" class="form-control">
													<label class="label">Enter Your Username</label>
												</div>
												<div class="form-group">
													<input type="password" name="password" class="form-control">
													<label class="label">Password</label>
												</div>
												<div class="row">
													<div class="col-6">
														<div class="forgot-txt">
															<a href="javascript:;" class="forgot-password-click">Forgot Password</a>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group text-right">
															<input type="submit" class="submit" >
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- login slide end -->
								<!-- signup slide start -->
								<div class="signup-slide slide">
									<div class="sign-up-txt">
										if you have an account? <a href="javascript:;" class="login-click">login</a>
									</div>
									<div class="d-flex height-100-percentage padding-40px">
										<div class="align-self-center width-100-percentage">
											<h2>Create An Account</h2>
											<form class="floating-form">
												<div class="row">
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">First Name</label>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">Last Name</label>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">Email</label>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">Phone</label>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">Password</label>
															<input type="password" class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label class="label">Confirm Password</label>
															<input type="password" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group text-right">
													<input type="submit" class="submit" value="Register">
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- signup slide end -->
								<!-- forgot password slide start -->
								<div class="forgot-password-slide slide">
									<div class="d-flex height-100-percentage style4-left">
										<div class="align-self-center width-100-percentage max-width-400 margin-0-auto padding-10px">
											<form class="floating-form">
												<label class="label">Enter your email address to reset your password</label>
												<div class="form-group user-name-field">
													<input type="text" class="form-control">
													<label class="label">Email</label>
												</div>
												<div class="form-group text-right">
													<input type="submit" class="submit" value="Submit">
												</div>
											</form>
											<div class="sign-up-txt">
												if you remember your password? <a href="javascript:;" class="login-click">login</a>
											</div>
										</div>
									</div>
								</div>
								<!-- forgot password slide end -->
							</div>
						</div>
						<!-- login style5 right side end -->
					</div>
				</div>
			</div>
		</section>
	</main>

	<div id="cd-loading-bar" data-scale="1" class="index"></div>
	<!-- JS File -->
	<script src="<?php echo base_url('assets/') ?>login/js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/') ?>login/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/') ?>login/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/') ?>login/js/bootstrap.js"></script>
	<script src="<?php echo base_url('assets/') ?>login/js/velocity.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/') ?>login/js/script.js"></script>
</body>
</html>