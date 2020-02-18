<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
	header('location:index.php');
} else{ 

if(isset($_POST['submit'])) {
    $depart = $_GET['depart'];
	$depart = $_POST['depart'];	

	$password = $_POST['password'];
    
    $sql="update tblauth set depart=:depart, password=:password where tblauth.depart=:depart";
	$query = $dbh->prepare($sql);
	$query->bindParam(':depart', $depart, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	header('location:manage-departemen.php');
    // $lastInsertId = $dbh->lastInsertId();
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
		<meta name="theme-color" content="#3e454c">
	
		<title>Permintaan Aplikasi | Admin</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
	<div class="login-page bk-img" style="background-image: url(img/newimage.png);">
		<?php include('includes/headerlog.php');?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid" style="margin-top:40px">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Update Password</h2>
						<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading" style="color:black; background-color:#fade47"> Info Password</div>
                            			<div class="panel-body">
											<?php 
												$depart=$_GET['depart'];
												$sql ="SELECT * from tblauth where depart=:depart";
												$query = $dbh -> prepare($sql);
												$query-> bindParam(':depart', $depart, PDO::PARAM_STR);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$cnt=1;
												if($query->rowCount() > 0)
												{
													foreach($results as $result)
												{	
											?>
                            
									<!-- <div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> User</font></div> -->
                           				<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="form-group">
												<div class="form-group">
													<label class="col-sm-4 control-label">Departemen<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="depart" id: "depart" class="form-control" value="<?php echo htmlentities($result->depart);?>" required>
														</div>	
												</div>

                                                <div class="form-group">
													<label class="col-sm-4 control-label">Password Lama<span style="color:red">*</span></label>
													<div class="col-sm-4">
													<input type="password" name="currpassword" id: "currpassword" class="form-control" required>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Password Baru<span style="color:red">*</span></label>
													<div class="col-sm-4">
													<input type="password" name="password" id: "password" class="form-control" required>
													</div>	
												</div>


                                                <?php }} ?>	

                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-10" >													
                                                            <button class="btn"  style="background-color:#00ae4d" href="manage-persetujuan.php" name="submit" type="submit" style="margin-top:4%"><font size="2px" color="white">Upload</font></button>
                                                        </div>
                                                    </div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					
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
<?php } ?>