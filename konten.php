<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
			<?php
                    $p=isset($_GET['p'])?$_GET['p']:null;
                    switch($p){
                        default:
echo'<div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><i class="fa fa-home"></i> Dashboard</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <Center><h2><b>Hai '.$hasil['nama'].', Selamat Datang di Aplikasi Laundry </b></h2></center>
                                    </div> 
                                </div>';
                            break;
                        case "barang":						
include_once "barang/index.php";
                            break;
                        case "datak":						
include_once "karyawan/data.php";
break;
                        case "tambahk":						
include_once "karyawan/tambah.php";
break;
                        case "datako":						
include_once "konsumen/data.php";
break;
                        case "tambaht":						
include_once "transaksi/index.php";
break;
                        case "riwayatt":						
include_once "transaksi/data.php";
break;
                        case "datas":						
include_once "supplier/data.php";
break;
                        case "tambahs":						
include_once "supplier/tambah.php";
break;
                        case "olahk":						
include_once "user/karyawan.php";
break;
                        case "olahko":						
include_once "user/konsumen.php";
break;
                        case "olahs":						
include_once "user/supplier.php";
break;
                        case "tambahko":						
include_once "konsumen/tambah.php";
break;
                        case "jenis":						
include_once "jenis/index.php";
		break;
                        case "beli":						
include_once "pembelian/data.php";
break;
                        case "pakai":						
include_once "pemakaian/data.php";
	}
					
	?>
</body>
</html>