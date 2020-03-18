<?php
$server="localhost"; //Nama server default xampp tersebut biasanya localhost
$konek="root"; //Nama root ini biasanya default dari xampp tersebut
$password=""; //Isikan password jika diminta password pada halam awal ke localshost/phpmyadmin kalau tidak ada biarkan saja
$db="londry"; //Sesuaikan dengan nama database yang anda sudah buat
 
$konek = mysqli_connect($server,$konek,$password,$db) or die("Koneksi ke database gagal");

 ?>