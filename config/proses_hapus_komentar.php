<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
          alert('Anda belum login');
          location.href='../login.php';
          </script>";
    exit();
}

// Ambil komentarid, fotoid, userid dari sesi, dan role dari pengguna
$komentarid = $_GET['komentarid'];
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['userid'];
$userRole = $_SESSION['role'];

// Cek apakah pengguna adalah pemilik komentar atau admin
$cekPemilik = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid='$komentarid' AND userid='$userid'");
$isPemilik = mysqli_num_rows($cekPemilik) > 0;

if ($isPemilik || $userRole == 'admin') {
    // Hapus komentar dari database
    $query = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid='$komentarid'");

    // Redirect kembali ke halaman yang sesuai
    if ($query) {
        echo "<script>
              alert('Komentar berhasil dihapus');
              location.href='" . ($userRole == 'admin' ? "../admin/index.php" : "../user/index.php") . "?fotoid=$fotoid';
              </script>";
    } else {
        echo "<script>
              alert('Komentar gagal dihapus');
              location.href='" . ($userRole == 'admin' ? "../admin/index.php" : "../user/index.php") . "?fotoid=$fotoid';
              </script>";
    }
} else {
    // Jika bukan pemilik atau admin, tampilkan pesan error
    echo "<script>
          alert('Anda tidak memiliki izin untuk menghapus komentar ini');
          location.href='" . ($userRole == 'admin' ? "../admin/index.php" : "../user/index.php") . "?fotoid=$fotoid';
          </script>";
}
?>
