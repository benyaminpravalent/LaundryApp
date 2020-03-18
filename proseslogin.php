<?php
session_start();
require_once ('koneksi.php');

$user = $_POST['username'];
$pass     = md5($_POST['password']);
$cekuser = mysqli_query($konek, "SELECT * FROM pengguna WHERE username='$user'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
if ( $jumlah == 0 ) {
header('location:login.php?userfail');
} else {
    if ( $pass <> $hasil['password'] ) {
header('location:login.php?passwordfail');
    } else {
        $_SESSION['username'] = $user;
        header('location:index.php');
    }
}
?>
<!--$email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");

  if(mysqli_num_rows($query) == 0){
     header("location: ".BASE_URL."index.php?page=login&notif=true");
  }else{
      $row = mysqli_fetch_assoc($query);
      
      session_start();

      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['level'] = $row['level'];
      $_SESSION['nama'] = $row['nama'];

      header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list"); -->
  }