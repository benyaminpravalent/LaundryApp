			<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
			$harga = $_POST['harga'];
			$jumlah = $_POST['jumlah'];
			$harga2 = $harga*$jumlah;
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

                            break;
                        case "input":						
   mysqli_query($konek, "INSERT INTO barangg VALUES ('','$_POST[nama]','$_POST[jumlah]','$date','$_POST[supplier]','$_POST[harga]')");
   mysqli_query($konek, "INSERT INTO pembelian VALUES ('','$date','$_POST[jumlah]','$_POST[supplier]','$_POST[nama]','$harga2')");
		  header('location:../index.php?p=barang');						   
	                            break;
                        case "hapus":
mysqli_query($konek, "DELETE FROM barangg WHERE id_barang='$_GET[id]'");
  header('location:../index.php?p=barang');
	                            break;
                        case "update":
    mysqli_query($konek, "UPDATE barangg SET stok=stok+$_POST[jumlah],tgl_update='$date' WHERE id_barang='$_POST[id]'");
    mysqli_query($konek, "INSERT INTO pembelian VALUES ('','$date','$_POST[jumlah]','$_POST[supplier]','$_POST[nama]','$harga2')");						 
  header('location:../index.php?p=barang');  
  	                            break;
                        case "pakai":
    mysqli_query($konek, "UPDATE barangg SET stok=$_POST[stokk],tgl_update='$date' WHERE id_barang='$_POST[id]'");
mysqli_query($konek, "INSERT INTO pemakaian VALUES ('','$date','$_POST[id]','$_POST[jumlah]')");						 
  header('location:../index.php?p=barang'); 
	}
                    ?>
      