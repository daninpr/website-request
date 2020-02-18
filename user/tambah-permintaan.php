<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin_user'])==0) {	
	header('location:../index.php');
} else{  

	if(isset($_POST['submit'])){
		
		$depart=$_POST['depart'];
		$userlog=$_POST['userlog'];
		$nama_projek=$_POST['nama_projek'];
		$jns_apk=$_POST['jns_apk'];
		$tgl_minta=$_POST['tgl_minta'];
		$no_surat=$_POST['no_surat'];
		$tahun=$_POST['tahun'];
		$deskrip=$_POST['deskrip'];
		$file_minta=$_FILES["file1"]["name"];
		move_uploaded_file($_FILES["file1"]["tmp_name"],"../file/".$_FILES["file1"]["name"]);

		$sql="INSERT INTO tbl_permintaan(depart, userlog, nama_projek, jns_apk, tgl_minta, no_surat, tahun, deskrip, file_minta) 
		VALUES(:depart, :userlog, :nama_projek, :jns_apk, :tgl_minta, :no_surat, :tahun, :deskrip, :file_minta)";
		$query = $dbh->prepare($sql);
		
		$query->bindParam(':depart', $depart, PDO::PARAM_STR);
		$query->bindParam(':userlog', $userlog, PDO::PARAM_STR);
		$query->bindParam(':nama_projek', $nama_projek, PDO::PARAM_STR);
		$query->bindParam(':jns_apk', $jns_apk, PDO::PARAM_STR);
		$query->bindParam(':tgl_minta', $tgl_minta, PDO::PARAM_STR);
		$query->bindParam(':no_surat', $no_surat, PDO::PARAM_STR);
		$query->bindParam(':tahun', $tahun, PDO::PARAM_STR);
		$query->bindParam(':deskrip', $deskrip, PDO::PARAM_STR);
		$query->bindParam(':file_minta', $file_minta, PDO::PARAM_STR);
		$query->execute();
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
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid" style="margin-top:40px">
					<div class="row">
						<div class="col-md-12">				
							<h2 class="page-title">Tambah Permintaan</h2>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading" style="color:black;background-color:#fade47">Form Pengisian Data Permintaan</div>
											<div class="panel-body">
											<?php 
											$ambil = $_SESSION['username'];
											$sql ="SELECT username, depart from tblauth WHERE username = '$ambil'";
											$query = $dbh -> prepare($sql);
											$query-> bindParam(':depart', $depart, PDO::PARAM_STR);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0){
												foreach($results as $result){	
											?>
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Departemen<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="depart" class="form-control" value="<?php echo htmlentities($result->depart);?>" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Nama Peminta<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="userlog" class="form-control" value="<?php echo htmlentities($result->userlog);?>" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Nama Projek<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="nama_projek" class="form-control" value="<?php echo htmlentities($result->nama_projek);?>" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Jenis Aplikasi<span style="color:red">*</span></label>
													<div class="col-sm-4">
													<select class="selectpicker" data-size="7" name="jns_apk" required>
														<option value=""> Pilih </option>
														<option value="Mobile"> Mobile </option>
														<option value="Website"> Website </option>
														<option value="Keduanya"> Keduanya </option></select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Tanggal Permintaan<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="date" name="tgl_minta" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">No Surat<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="no_surat" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Tahun<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="tahun" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Deskripsi<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<textarea type="text" name="deskrip" class="form-control" required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">File<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File <span style="color:red">*</span><input type="file" name="file1" required>
													</div>
												</div>
												<?php }} ?>	

												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset"><font size="2px">Batal</FONT></button>
														<button class="btn" style="background-color:#00ae4d" name="submit" type="submit"><font size="2px" color="white">Simpan</font></button>
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