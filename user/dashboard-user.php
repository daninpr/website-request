<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin_user'])==0){	
	header('location:../index.php');
} else{
		
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
		<link rel="shortcut icon" href="img/favicon-icon/favicon.png">
		<title>Permintaan Aplikasi | User</title>

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
				<div class="container-fluid" style="margin-top:-60px">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Halaman Utama : Departemen <font color="#3c70a4" size="6pt"> <?php echo $_SESSION['depart']; ?></font></h2>							
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body text-light" style="background-color:#00ae4d" >
													<div class="stat-panel text-center">
														<?php
														$ambil = $_SESSION['username'];
														
														$sql ="SELECT * from tbl_permintaan as p 
																join tblauth as a 
																ON p.depart = a.depart
																WHERE a.username = '$ambil'";
														$query = $dbh -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$totalpermintaan=$query->rowCount();	
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($totalpermintaan);?></div>
														<div class="stat-panel-title text-uppercase">Permintaan</div>
													</div>
												</div>
												<a href="manage-permintaan.php" class="block-anchor panel-footer" style="background-color:#fade47" >Detail Selengkapnya<i class="fa fa-arrow-right"></i></a>
											</div>										
										</div>

										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body text-light" style="background-color:#00ae4d" >
													<div class="stat-panel text-center">
														<?php
														$ambil = $_SESSION['username'];
														
														$sql ="SELECT * from tbl_permintaan as p 
																join tblauth as a 
																join tb_persetujuan as s
																ON p.depart = a.depart
																AND p.nama_projek = s.nama_projek
																WHERE a.username = '$ambil'";
														$query = $dbh -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$totaltindak=$query->rowCount();	
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($totaltindak);?></div>
														<div class="stat-panel-title text-uppercase">Tindak Lanjut</div>
													</div>
												</div>
												<a href="manage-tindak.php" class="block-anchor panel-footer" style="background-color:#fade47" >Detail Selengkapnya<i class="fa fa-arrow-right"></i></a>
											</div>										
										</div>

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
		
		<script>
		window.onload = function(){
			// Line chart from swirlData for dashReport
			var ctx = document.getElementById("dashReport").getContext("2d");
			window.myLine = new Chart(ctx).Line(swirlData, {
				responsive: true,
				scaleShowVerticalLines: false,
				scaleBeginAtZero : true,
				multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
			}); 
			
			// Pie Chart from doughutData
			var doctx = document.getElementById("chart-area3").getContext("2d");
			window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

			// Dougnut Chart from doughnutData
			var doctx = document.getElementById("chart-area4").getContext("2d");
			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

		}
		</script>
	</body>
</html>
<?php } ?>