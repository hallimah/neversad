<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
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

        <h2>Produk - Detail Produk</h2>

    </div>
    <!-- end: Container  -->

</div>	

</div>
<!-- end: Page Title -->

<!--start: Wrapper-->
<div id="wrapper">
        
<!--start: Container -->
<div class="container">              

      <div class="row">
    <div class="col-sm-6">
            <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        <!--<div class="span4">-->
              <!--<div class="icons-box">-->
            <div class="hero-unit" style="margin-left: 20px;">
            <table>
            <tr>
            <td rowspan="7"><img src="../admin/<?php echo $data['gambar']; ?>" weight="1000px" height="1000px" /></td>
                </tr>
                <tr>
                <td colspan="4"><div class="title"><h2><?php echo $data['nama']; ?></h2></div></td>
                </tr>
                <tr>
                <td></td>
                <td size="200"><h3>Harga</h3></td>
                <td><h3>:</h3></td>
                <td><div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div></td>
                </tr>
                <tr>
                <td></td>
                <td><h3>Stock</h3></td>
                <td><h3>:</h3></td>
                <td><div><h3><?php if ($data['stok'] >= 1){
                       echo '<strong style="color: blue;">In Stock (Tersedia)</strong>';	
                        } else {
                       echo '<strong style="color: red;">Out Of Stock (Kosong)</strong>';	
                        }; ?></h3></div></td>
                </tr>
                <tr>
                <td></td>
                <td><h3>Size</h3>
                <td><h3>:</h3></td>
                <td>
                <div class="text">
                      <label class="col-sm-6 col-sm-6 control-label"></label>
                     <div class="col-sm-6">
                    <select id="size" name="size" class="form-control" required>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                       </select>
                    </div> </div>
                    </td>
                    </tr>
                <tr>
                <td></td>
                <td><h3>Keterangan</h3></td>
                <td><h3>:</h3></td>
                <td><div><h3><?php echo $data['keterangan']; ?></h3></div></td>
                </tr>

                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="addtocart.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div></td>
                </tr>

            </table>
            </div>
            <!--</div> -->
        <!--</div> -->
<!---->
      </div>
    <!-- end: Row -->
            
            
        </div>	
        
            
        </div>
        
        </div>
    </div>
    <!--end: Row-->

</div>
<!--end: Container-->
        
<!--start: Container -->
<div class="container">	

    <hr>

</div>
<!--end: Container-->	

</div>
<!-- end: Wrapper  -->	
	<?php include "footer.php"; ?>


</body>
</html>	