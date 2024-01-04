<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
			$hasil = $row -> fetch();
			$_SESSION['admin'] = $hasil;
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - POS SHANI</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .input-group-append {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
						<div class="p-5">
							<div class="text-center">
								<h3 class="h4 text-gray-900"><b>LOGIN POS</b></h3>
							</div>
							<form class="form-login" method="POST">
								<div class="asset-log">
								<img src="./assets/img/hehe.png" alt="" class="mb-2 mx-auto d-block" style="height: 200px;">

								</div>
								<div class="form-group">
									<input type="text	" class="form-control form-control-user" name="user"
										placeholder="Username" autofocus>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input type="password" class="form-control form-control-user" name="pass" id="passwordInput" placeholder="Password">
										<div class="input-group-append">
											<span class="input-group-text">
											<i class="fas fa-eye" id="togglePassword"></i>
											</span>
										</div>
									</div>
								</div>
								<button class="btn btn-primary btn-block" name="proses" type="submit">
									SIGN IN</button>
							</form>
							<!-- <hr>
							<div class="text-center">
								<a class="small" href="forgot-password.html">Forgot Password?</a>
							</div>
							<div class="text-center">
								<a class="small" href="register.html">Create an Account!</a>
							</div> -->
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
		document.getElementById('togglePassword').addEventListener('click', function() {
		let passwordInput = document.getElementById('passwordInput');
		if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
			this.classList.remove('fa-eye');
			this.classList.add('fa-eye-slash');
		} else {
			passwordInput.type = 'password';
			this.classList.remove('fa-eye-slash');
			this.classList.add('fa-eye');
		}
	});

	</script>
    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>
</html>