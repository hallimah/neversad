<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>GEOFFMAX</title> 
	<meta name="keywords" content="sepatu, sandal" />
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->

    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

</head>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-user ico-white"></i>Registrasi Customer Baru</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
            <?php
            include "conn.php";
            	if(isset($_POST['input'])){
				 $nama       = $_POST['nama'];
		         $alamat     = $_POST['alamat'];
                 $no_telp    = $_POST['no_telp'];
                 $username   = $_POST['username'];
                 $password1  = $_POST['password'];
                 $password1  = sha1($password1);
                 $kd_cus     = date("YmdHis");
				
                
				$cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE nama='$nama' ");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO customer (kd_cus, nama, alamat, no_telp, username, password) VALUES ('$kd_cus', '$nama', '$alamat', '$no_telp', '$username', '$password1')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Member Sudah Ada..!</div>';
				}
			} ?>
                 <div class="table-responsive">
                 <div class="title"><h3>Form Registrasi</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!
                 <p></p> Setelah form terisi selanjutnya Login sebagai Customer !</div>
    <form role="formku" id="formku" method="post" action="">
    <table class="table table-hover">
    <tr>
        <td><label for="nama">Nama</label></td>
        <td><input name="nama" type="text" class="required" minlength="3" id="nama" size="200" /></td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><input name="alamat" type="text" class="required" minlength="5" id="alamat" /></td>
      </tr>
      <tr>
        <td><label for="no_telp">No Telepon</label></td>
        <td><input name="no_telp" type="text" class="required" minlength="5" id="no_telp" /></td>
      </tr>
      <tr>
        <td><label for="username">Username</label></td>
        <td><input name="username" type="text" class="required" id="username" /></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
        <td><input name="password" type="password" class="required" id="password" /></td>
      </tr>
               
      <tr>
      <td></td>
        <td><input type="submit" value="Submit" name="input" id="input" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Back</a></td>
        </tr>
    </table>
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<?php include "footer.php"; ?>

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>

<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<!-- end: Java Script -->

</body>
</html>