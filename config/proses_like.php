<?php 
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['userid'];
$role = $_SESSION['role']; // Dengan asumsi 'peran' disimpan dalam sesi (misalnya, 'admin' atau 'pengguna')

$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

if (mysqli_num_rows($ceksuka) == 1) {
    while($row = mysqli_fetch_array($ceksuka)){
        $likeid = $row['likeid'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
        
       // Redirect berdasarkan peran
        if ($role == 'admin') {
            echo "<script>location.href='../admin/index.php';</script>";
        } else {
            echo "<script>location.href='../user/index.php';</script>";
        }
    }
} else {
    $tanggallike = date('y-m-d');
    $query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggallike')");
    
    // Redirect berdasarkan peran
    if ($role == 'admin') {
        echo "<script>location.href='../admin/index.php';</script>";
    } else {
        echo "<script>location.href='../user/index.php';</script>";
    }
}
?>
