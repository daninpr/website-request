<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
	header('location:index.php');
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
		<?php include('includes/header.php');?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid" style="margin-top:40px">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Kelola Permintaan</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading" style="color:black; background-color:#fade47"> Detail Permintaan</div>
									<div class="panel-body">
									<div style="overflow-x:auto;">
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Departemen</th>
												<th>Nama Peminta</th>
												<th>Nama Projek</th>
												<th>Jenis Aplikasi</th>
												<th>Tanggal Permintaan</th>
												<th>No Surat</th>
												<th>Tahun</th>
												<th>Deskripsi</th>
												<th>File</th>
												<th>Tindak Lanjut</th>
											</tr>
										</thead>
										
										<tbody>
											<?php $sql = "SELECT * from tbl_permintaan";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{				?>	 
											<tr>
												<td><?php echo htmlentities($cnt);?></td>
												
												<td><?php echo htmlentities($result->depart);?></td>
												<td><?php echo htmlentities($result->userlog);?></td>
												<td><?php echo htmlentities($result->nama_projek);?></td>
												<td><?php echo htmlentities($result->jns_apk);?></td>
												<td><?php echo htmlentities($result->tgl_minta);?></td>
												<td><?php echo htmlentities($result->no_surat);?></td>
												<td><?php echo htmlentities($result->tahun);?></td>
												<td><?php echo htmlentities($result->deskrip);?></td>
												<td><?php echo htmlentities($result->file_minta);?></td>
												<td><a href="konfirmasi.php?nama_projek=<?php echo $result->nama_projek;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;</td>
											</tr>

											<?php $cnt=$cnt+1; }} ?>	
										</tbody>
									</table>
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
	</body>
</html>
<?php } ?>