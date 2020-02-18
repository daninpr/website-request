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
						<h2 class="page-title">Review</h2>
						<!-- Zero Configuration Table -->
								<div class="panel panel-default">
									<div class="panel-heading"  style="color:black;background-color:#fade47"> Info Permintaan</div>
                            			<div class="panel-body">
											<?php 
												$nama_projek=$_GET['nama_projek'];
                                                $sql ="SELECT * from tb_persetujuan as p 
                                                       join tbl_permintaan as m
                                                       on p.nama_projek =m.nama_projek
                                                       where p.nama_projek=:nama_projek";
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
									
                                    <div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Permintaan</font></div>
                           				<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="form-group">
												<div class="form-group">
													<label class="col-sm-4 control-label">Departemen<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->depart);?></h4>	
													</div>
												</div> 

												<div class="form-group">
													<label class="col-sm-4 control-label">Nama Peminta<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->userlog);?></h4>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Nama Projek<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->nama_projek);?></h4>
													</div>
												</div> 

												<div class="form-group">
													<label class="col-sm-4 control-label">Jenis Aplikasi<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->jns_apk);?></h4>
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-sm-4 control-label">Tanggal Minta<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->tgl_minta);?></h4>
													</div>
												</div> 

                                                <div class="form-group">
													<label class="col-sm-4 control-label">No Surat<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->no_surat);?></h4>
													</div>
												</div>   

                                                <div class="form-group">
													<label class="col-sm-4 control-label">Tahun<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->tahun);?></h4>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Deskripsi<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->deskrip);?></h4>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label">File Keterangan<span style="color:black"> : </span></label>
													<div class="col-sm-4">
														<a style="font-size:15pt" href="file/<?php echo htmlentities($result->file_minta);?>" width='100%' height='700px'><?php echo htmlentities($result->file_minta);?></a>
													</div>
												</div>          

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt">Anggaran</font></div>
                           				<div class="panel-body">
												<div class="form-group">
													<label class="col-sm-4 control-label">Anggaran<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->anggaran);?></h4>
													</div>
												</div>
										

												<div class="form-group">
													<label class="col-sm-4 control-label">Nominal<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->nominal);?></h4>
													</div>
												</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Prioritas</font></div>
                           				<div class="panel-body">
												<div class="form-group">
													<label class="col-sm-4 control-label">Prioritas<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->prioritas);?></h4>
													</div>
												</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt">Tim</font></div>
                           				<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-4 control-label">Tim PM<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tim_pm);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim BA<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tim_ba);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Docs<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tim_docs);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Prog<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tim_prog);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tim Infra<span style="color:black"> : </span></label>
													<div class="col-sm-4">
                                                        <h4><?php echo htmlentities($result->tim_infra);?></h4>
													</div>
											</div>
										</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Vendor</font></div>
                           				<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-4 control-label">Nama Vendor<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->nama_vendor);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Estimasi<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->estimasi);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tanggal Mulai<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tgl_mulai);?></h4>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Tanggal Selesai<span style="color:black"> : </span></label>
												<div class="col-sm-4">
                                                    <h4><?php echo htmlentities($result->tgl_selesai);?></h4>
												</div>
											</div>
									</div>

									<div class="panel-heading" style="background-color:#ffef8a"><font color="black" size="2pt"> Konfirmasi Upload</font></div>
                           				<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-4 control-label">BRD<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->brd);?>" width='100%' height='700px'><?php echo htmlentities($result->brd);?></a>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">TOR<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->tor);?>" width='100%' height='700px'><?php echo htmlentities($result->tor);?></a>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">SR<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->sr);?>" width='100%' height='700px'><?php echo htmlentities($result->sr);?></a>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">BA<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->ba);?>" width='100%' height='700px'><?php echo htmlentities($result->ba);?></a>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">OK<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->ok);?>" width='100%' height='700px'><?php echo htmlentities($result->ok);?></a>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">User Manual<span style="color:black"> : </span></label>
												<div class="col-sm-4">
													<a style="font-size:15pt" href="files/<?php echo htmlentities($result->user_man);?>" width='100%' height='700px'><?php echo htmlentities($result->user_man);?></a>
												</div>
											</div>
									</div>

										<?php }} ?>	

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4" >	
                                                    <a class="btn btn-default btn-lg" href="manage-persetujuan.php" role="button">KEMBALI</a>												
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