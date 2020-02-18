<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
	header('location:index.php');
} else{ 

if(isset($_POST['submit'])) {
    $nama_projek = $_GET['nama_projek'];
	$depart = $_POST['depart'];	
	// $nama_projek = $_POST['nama_projek'];
	$userlog = $_POST['userlog'];
	$anggaran=$_POST['anggaran'];
	$nominal=$_POST['nominal'];
	$prioritas=$_POST['prioritas'];
	$tim_pm=$_POST['tim_pm'];
	$tim_ba=$_POST['tim_ba'];
	$tim_docs=$_POST['tim_docs'];
	$tim_prog=$_POST['tim_prog'];
	$tim_infra=$_POST['tim_infra'];
	$nama_vendor=$_POST['nama_vendor'];
	$estimasi=$_POST['estimasi'];
	$tgl_mulai=$_POST['tgl_mulai'];
	$tgl_selesai=$_POST['tgl_selesai'];
	$brd=$_FILES["file1"]["name"];
	$tor=$_FILES["file2"]["name"];
	$sr=$_FILES["file3"]["name"];
	$ba=$_FILES["file4"]["name"];
	$ok=$_FILES["file5"]["name"];
	$user_man=$_FILES["file6"]["name"];
	move_uploaded_file($_FILES["file1"]["tmp_name"],"files/".$_FILES["file1"]["name"]);
	move_uploaded_file($_FILES["file2"]["tmp_name"],"files/".$_FILES["file2"]["name"]);
	move_uploaded_file($_FILES["file3"]["tmp_name"],"files/".$_FILES["file3"]["name"]);
	move_uploaded_file($_FILES["file4"]["tmp_name"],"files/".$_FILES["file4"]["name"]);
	move_uploaded_file($_FILES["file5"]["tmp_name"],"files/".$_FILES["file5"]["name"]);
    move_uploaded_file($_FILES["file6"]["tmp_name"],"files/".$_FILES["file6"]["name"]);
	$status=$_POST['status'];
	header('location:manage-persetujuan.php');

    // $sql="update organisasi set id_organisasi=:id_organisasi, nama_org=:nama_org where id_organisasi=:id_organisasi";
	// 	$query = $dbh->prepare($sql);
	// 	$query->bindParam(':id_organisasi', $id_organisasi, PDO::PARAM_STR);
	// 	$query->bindParam(':nama_org', $nama_org, PDO::PARAM_STR);
		
	// 	$query->execute();
    //     $lastInsertId = $dbh->lastInsertId();
    
    $sql="update tb_persetujuan set depart=:depart, userlog=:userlog, anggaran=:anggaran, nominal=:nominal, prioritas=:prioritas, tim_pm=:tim_pm, tim_ba=:tim_ba, tim_docs=:tim_docs, tim_prog=:tim_prog, tim_infra=:tim_infra, nama_vendor=:nama_vendor, estimasi=:estimasi, tgl_mulai=:tgl_mulai, tgl_selesai=:tgl_selesai, brd=:brd, tor=:tor, sr=:sr, ba=:ba, ok=:ok, user_man=:user_man, status=:status where nama_projek=:nama_projek";
	$query = $dbh->prepare($sql);
	$query->bindParam(':depart', $depart, PDO::PARAM_STR);
	$query->bindParam(':nama_projek', $nama_projek, PDO::PARAM_STR);
	$query->bindParam(':userlog', $userlog, PDO::PARAM_STR);
	$query->bindParam(':anggaran', $anggaran, PDO::PARAM_STR);
	$query->bindParam(':nominal', $nominal, PDO::PARAM_STR);
	$query->bindParam(':prioritas', $prioritas, PDO::PARAM_STR);
	$query->bindParam(':tim_pm', $tim_pm, PDO::PARAM_STR);
	$query->bindParam(':tim_ba', $tim_ba, PDO::PARAM_STR);
	$query->bindParam(':tim_docs', $tim_docs, PDO::PARAM_STR);
	$query->bindParam(':tim_prog', $tim_prog, PDO::PARAM_STR);
	$query->bindParam(':tim_infra', $tim_infra, PDO::PARAM_STR);
	$query->bindParam(':nama_vendor', $nama_vendor, PDO::PARAM_STR);
	$query->bindParam(':estimasi', $estimasi, PDO::PARAM_STR);
	$query->bindParam(':tgl_mulai', $tgl_mulai, PDO::PARAM_STR);
	$query->bindParam(':tgl_selesai', $tgl_selesai, PDO::PARAM_STR);
	$query->bindParam(':brd', $brd, PDO::PARAM_STR);
	$query->bindParam(':tor', $tor, PDO::PARAM_STR);
	$query->bindParam(':sr', $sr, PDO::PARAM_STR);
	$query->bindParam(':ba', $ba, PDO::PARAM_STR);
	$query->bindParam(':ok', $ok, PDO::PARAM_STR);
	$query->bindParam(':user_man', $user_man, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
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
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid" style="margin-top:40px">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Tindak Lanjut Pengajuan</h2>
						<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading" style="color:black; background-color:#fade47"> Info Permintaan</div>
                            			<div class="panel-body">
											<?php 
												$nama_projek=$_GET['nama_projek'];
												$sql ="SELECT * from tb_persetujuan where nama_projek=:nama_projek";
												$query = $dbh -> prepare($sql);
												$query-> bindParam(':nama_projek', $nama_projek, PDO::PARAM_STR);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$cnt=1;
												if($query->rowCount() > 0)
												{
													foreach($results as $result)
												{	
											?>
									<?php
										if($result->status == "progress"){
											echo '<div style="background: orange; width:190px; height:35px;margin:center:800px;color:white;  border-radius:6px; text-align:center; font-size:15pt">Progress</div>';
											//echo htmlentities($result->status);
										}else if($result->status == "done"){
											echo '<div style="background: green; width:190px; height:35px;margin-left:800px;color:white; border-radius:6px; text-align:center; font-size:15pt">Done</div>';
										}else{
											echo '<div style="background: red; width:190px; height:35px;margin-left:800px;color:white; border-radius:6px; text-align:center; font-size:15pt">Open</div>';
										}
									?><br>
									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> User</font></div>
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
													<label class="col-sm-4 control-label">Nama Peminta<span style="color:red">*</span></label>
													<div class="col-sm-4">
													<input type="text" name="userlog" id: "userlog" class="form-control" value="<?php echo htmlentities($result->userlog);?>" required>
													</div>	
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Nama Projek<span style="color:red">*</span></label>
													<div class="col-sm-4">
													<input type="text" name="nama_projek" id: "nama_projek" class="form-control" value="<?php echo htmlentities($result->nama_projek);?>" required>
													</div>	
												</div>


									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt">Anggaran</font></div>
                           				<div class="panel-body">
												<div class="form-group">
													<label class="col-sm-4 control-label">Anggaran<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" data-size="7" name="anggaran" >
														<option value="<?php echo htmlentities($result->anggaran);?>"><?php echo htmlentities($result->anggaran);?></option>
														<option value="TI"> TI </option>
														<option value="Unit Kerja"> Unit Kerja </option>
														<option value="In House"> In House </option></select>
													</div>
												</div>
										

												<div class="form-group">
													<label class="col-sm-4 control-label">Nominal<span style="color:red">*</span></label>
													<div class="col-sm-4">
                                                    <input type="text" name="nominal" id: "nominal" class="form-control" value="<?php echo htmlentities($result->nominal);?>">
														<p><i>(<span style="color:red">*</span> dalam bentuk Rp.)</i></p>
													</div>
												</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Prioritas</font></div>
                           				<div class="panel-body">
												<div class="form-group">
													<label class="col-sm-4 control-label">Prioritas<span style="color:red">*</span></label>
													<div class="col-sm-4">
                                                    <input type="text" name="prioritas" id: "prioritas" class="form-control" value="<?php echo htmlentities($result->prioritas);?>">
													</div>
												</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt">Tim</font></div>
                           				<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-4 control-label">Tim PM<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="tim_pm" id: "tim_pm" class="form-control" value="<?php echo htmlentities($result->tim_pm);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim BA<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="tim_ba" id: "tim_ba" class="form-control" value="<?php echo htmlentities($result->tim_ba);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Docs<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="tim_docs" id: "tim_docs" class="form-control" value="<?php echo htmlentities($result->tim_docs);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Prog<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="tim_prog" id: "tim_prog" class="form-control" value="<?php echo htmlentities($result->tim_prog);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Infra<span style="color:red">*</span></label>
													<div class="col-sm-4">
                                                    <input type="text" name="tim_infra" id: "tim_infra" class="form-control" value="<?php echo htmlentities($result->tim_infra);?>">
													</div>
											</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Vendor</font></div>
                           				<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-4 control-label">Nama Vendor<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="nama_vendor" id: "nama_vendor" class="form-control" value="<?php echo htmlentities($result->nama_vendor);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Estimasi<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="text" name="estimasi" id: "estimasi" class="form-control" value="<?php echo htmlentities($result->estimasi);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tanggal Mulai<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="date" name="tgl_mulai" id: "tgl_mulai" class="form-control" value="<?php echo htmlentities($result->tgl_mulai);?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tanggal Selesai<span style="color:red">*</span></label>
												<div class="col-sm-4">
                                                <input type="date" name="tgl_selesai" id: "tgl_selesai" class="form-control" value="<?php echo htmlentities($result->tgl_selesai);?>">
												</div>
											</div>	
										</div>
										<?php }} ?>	
										</div>
									</div>
                        		</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color:#ffef8a"><font color="black"> Validasi Data </font> </div>
											<div class="panel-body">

											<div class="form-group">
													<label class="col-sm-2 control-label">BRD<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File BRD <span style="color:red">*</span><input type="file" name="file1" >
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">TOR<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File TOR <span style="color:red">*</span><input type="file" name="file2" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">SR<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File SR <span style="color:red">*</span><input type="file" name="file3" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">BA<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File BA <span style="color:red">*</span><input type="file" name="file4" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">OK<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File OK <span style="color:red">*</span><input type="file" name="file5" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">User Manual<span style="color:red">*</span></label>
													<div class="col-sm-4">
														File User Manual <span style="color:red">*</span><input type="file" name="file6" >
													</div>
												</div>	

											</div>
											</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color:#ffef8a"><font color="black"> Status </font> </div>
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-3">
											</div>
											<label class="col-sm-1 control-label">Status<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="radio" name="status" value="progress"/> Progress
												&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
												<input type="radio" name="status" value="done"/> Done
											</div>
											<div class="col-sm-3">
											</div>
										</div>

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