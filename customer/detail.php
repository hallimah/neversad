<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    }
?>
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
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

				<h2>Cart</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">
 <?php
             if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id' AND session='$_SESSION[user_id]'");
                $data = mysqli_fetch_array($cek);
                $moq = $data['qty'];
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM cart WHERE kode='$id' AND session='$_SESSION[user_id]'");
					if($delete){
					    $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$moq') WHERE kode='$id'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
            
 <?php
             if(isset($_GET['add']) == 'add'){
				$id_add = $_GET['kd1'];
                $qty = 1;
				$cek1 = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id_add' AND session='$_SESSION[user_id]'");
				$test = mysqli_fetch_array($cek1);
                $harga = $test['harga'];
                $quan = $test['qty'];
                $qtot = $qty + $quan;
                $jum = $harga * $qtot;
                if(mysqli_num_rows($cek1) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$add = mysqli_query($koneksi, "UPDATE cart SET qty=(qty+'$qty'), jumlah='$jum' WHERE kode='$id_add' AND session='$_SESSION[user_id]'");
					if($add){
					    $add_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok-'$qty') WHERE kode='$id_add'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk berhasil ditambah</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty produk gagal ditambah !</div>';
					}
				}
			}
			?>
            
 <?php
             if(isset($_GET['less']) == 'less'){
				$id_less = $_GET['kd2'];
                $qty1 = 1;
				$cek2 = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id_less' AND session='$_SESSION[user_id]'");
				$test1 = mysqli_fetch_array($cek2);
                $harga1 = $test1['harga'];
                $quan1 = $test1['qty'];
                $qtot1 = $quan1 - $qty1;
                $jum1 = $harga1 * $qtot1;
                if(mysqli_num_rows($cek2) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$less = mysqli_query($koneksi, "UPDATE cart SET qty=(qty-'$qty1'), jumlah='$jum1' WHERE kode='$id_less' AND session='$_SESSION[user_id]'");
					if($less){
					    $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$qty1') WHERE kode='$id_less'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk berhasil dikurangi.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk gagal dikurangi !</div>';
					}
				}
			}
			?>
			<!-- start: Table -->
            <div class="title"><h3>Shopping Cart Details</h3></div>
<table class="table table-hover table-condensed">
<tr>
					<th><center>No</center></th>
                    <th><center>kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Ukuran</center></th>
					<th><center>Harga</center></th>
				  <th><center>Quatity</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Opsi</center></th>
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
               
    
    //mysql_select_db($database_conn, $conn);
		   
         
                    $sql = mysqli_query($koneksi, "SELECT * FROM cart WHERE session='$_SESSION[user_id]'");
                    $no = 0;
                    while($data = mysqli_fetch_array($sql)){
                    $no++; 
            ?>
            
                <tr>
                <td><center><?php echo $no; ?></center></td>
                <td><center><?php echo $data['kode']; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
				 <td><center><?php echo $data['ukuran']; ?></center></td>
				  <td><center>Rp. <?php echo number_format($data['harga']); ?></center></td>
                <td><center><?php echo number_format($data['qty']); ?></center></td>
                <td><center>Rp. <?php echo number_format($data['jumlah']); ?></center></td>
                <td><center><a href="detail.php?add=add&kd1=<?php echo $data['kode']; ?>" class="btn btn-xs btn-success">Add</a> <a href="detail.php?less=less&kd2=<?php echo $data['kode']; ?>" class="btn btn-xs btn-warning">Less</a> <a href="detail.php?aksi=delete&kd=<?php echo $data['kode']; ?>" class="btn btn-xs btn-danger">Delete</a></center></td>
                </tr>
                
					
                         <?php
                         }
                         $sqlku = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM cart WHERE session='$_SESSION[user_id]'");
                         $dataku = mysqli_fetch_array($sqlku);
                         $total = $dataku['total'];
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Keranjang Kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="produk.php" class="btn btn-primary btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="6" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="produk.php" class="btn">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout2.php?total='.$total.'" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				
					
				
				?>

</table>
			
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

	<?php include "footer.php"; ?>


</body>
</html>