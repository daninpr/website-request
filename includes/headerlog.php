<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">
  *{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
  }

  #sidebar{
   position: fixed;
   width: 200px;
   height:100%;
   background: #151719;
   left: -200px;
   transition: all 500ms linear;
  }
  #sidebar.active{
   left:0px;
  }
  #sidebar ul li{
   color: rgba(230,230,230,0.9);
   list-style: none;
   padding: 15px 10px;
   border-bottom: 1px solid rgba(100,100,100,0.3);
  }
  #sidebar .toggle-btn{
   position: relative;
   left: 240px;
   top:5px;
  }
  #sidebar .toggle-btn span{
   display: block;
   width: 30px;
   height: 5px;
   background: #151719;
   margin: 4px 0px;

  }
  .dropdown {
  position: relative;
  margin-top:10px;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.footer {
   position: fixed;
   font-size:13px;
   padding-top:2px;
   padding-left:10px;
   left: 0;
   bottom: 0;
   width: 100%;
	 height: 4%;
   background-color: #e5e5e5;
   color: #757575;
   z-index: 999;
}

 </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
</head>
<body>
<div class="headerlog">
  <img src="img/logo-bumn.png" style="width:85px; height:70px; margin-left:400px"></image>
	<img src="img/logo-petro.png" style="width:150px; height:55px; margin-left:100px"></image>
	<img src="img/logo-pi.png" style="width:105px; height:55px; margin-left:100px"></image>
	
	<div id="header" style="background-color:#00ae4d;height:40px; margin-top: -5px">
		<div id="sidebar" style ="background-color:#fffbbd">
			<div class="toggle-btn" onclick="toggleSidebar()"><a>
			<span></span>
			<span></span>
			<span></span>
			</a>
			</div>
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label"><font color="black">Main</font></li>
				<li><a href="dashboard.php"><i class="fa fa-home"></i><font color="black">Halaman Utama</font></a></li>
			
				<li><a href="#"><i class="fa fa-files-o"></i><font color="black">Permintaan</font></a>
					<ul>
						<li><a href="tambah-permintaan.php">Tambah Permintaan</a></li>
						<li><a href="manage-permintaan.php">Kelola Permintaan</a></li>
					</ul>
				</li>
				
				<li><a href="#"><i class="fa fa-legal"></i><font color="black">Persetujuan</font></a>
					<ul>
						<li><a href="manage-persetujuan.php">Tindak Lanjut</a></li>
            <li><a href="manage-selesai.php">Selesai</a></li>
					</ul>
				</li>

        <li><a href="#"><i class="fa fa-building-o"></i><font color="black">Departemen</font></a>
					<ul>
						<li><a href="manage-departemen.php">Kelola Departemen</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div style="margin-left:1250px">
		<div class="dropdown">
			<span><i class="fa fa-user-circle-o" style="font-size:22px;"></i> Akun <i class="fa fa-angle-down hidden-side"></i></span>
			<div class="dropdown-content">
				<a href="logout.php"><b><font color="#fed700">Keluar</font></b></a>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
  <p>Copyright &copy; 2020 <font color:"blue">TI PI PG</font>. All rights reserved.</p>
</div>
</body>
</html>