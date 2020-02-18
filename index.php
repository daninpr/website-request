<?php
	session_start();
	include('includes/config1.php');
	include('headerlogin.php'); 
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$flag = 'true';
		
		$result = $mysqli->query("SELECT depart,username,password,userType from tblauth WHERE username='$username' and Password='$password'");

		if($result === FALSE){
		die(mysql_error());
		}
		if($result){
			while($obj = $result->fetch_object()){
				if($obj->username === $username && $obj->password === $password ) {
		  
					$_SESSION['username'] = $username;
					$_SESSION['userType'] = $obj->userType;
					$_SESSION['depart'] = $obj->depart;
					$_SESSION['creationdate'] = $obj->creationdate;
					$_SESSION['updationdate'] = $obj->updationdate;
				  	if($obj->userType == "admin") {
						$_SESSION['alogin']=$_POST['username']; 
					  	header("location:dashboard.php");
				  	} else if($obj->userType == "user"){
						$_SESSION['alogin_user']=$_POST['username'];
					 	header("location:user/dashboard-user.php");
				  	} else {
						echo "<script>alert('Invalid Details');</script>";
					}
			  	} else{
					if($flag === 'true'){
					echo '<h1>Invalid Login! Redirecting...</h1>';
					header("Refresh: 3; url=index.php");
					$flag = 'false';
				  }
			  	}
			}
		}
	}
?>

<!doctype html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- <meta name="theme-color" content="#3e454c"> -->
		<link rel="shortcut icon" href="img/favicon-icon/favicon.png">
		<title>Permintaan Aplikasi | Login</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/fileinput.min.css">
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="login-page bk-img" style="background-image: url(img/login2.png)">
			<div class="form-content">
				<div class="container">
					<div class="row" style="margin-top:110px">
						<div class="col-md-1"></div>
						<div class="col-md-5">
							<img src="img/icon-login.png" style="width:370px;height:280px; margin-top:80px; margin-left:30px;"/>
						</div>
						<div class="col-md-5">
							<h1 class="text-center text-bold text-light mt-4x"></h1>
							<div class="well row pt-2x pb-3x" style="background-color:rgba(255,255,255,0.4); width:370px">
								<div class="col-md-8 col-md-offset-2">
									<form method="post">
										<label for="" class="text-uppercase text-sm">Username </label>
										<input type="text" placeholder="Username" name="username" class="form-control mb" style="color:black; background-color:rgba(255,255,255,1)">

										<label for="" class="text-uppercase text-sm">Password</label>
										<input type="password" placeholder="Password" name="password" class="form-control mb" style="color:black; background-color:rgba(255,255,255,1)">

										<button class="btn btn-block" name="login" type="submit" style="background-color:#00ae4d"><font size="2px" color="white"><b>LOGIN</b></font></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>