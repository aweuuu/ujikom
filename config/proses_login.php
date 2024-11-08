<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// Cek apakah username dan password ada di database
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// Mengecek jumlah hasil query
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    // Jika username dan password cocok
    $data = mysqli_fetch_array($sql);

    // Simpan data user dalam session
    $_SESSION['username'] = $data['username'];
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['role'] = $data['role'];  // Menyimpan role dalam session
    $_SESSION['status'] = 'login';

    // Cek apakah role admin atau user
    if ($data['role'] == 'admin') {
        // Jika admin, redirect ke halaman admin
        echo "<script>
        alert('Login Sukses, Welcome Admin " . $_SESSION['username'] . "!');
        location.href='../admin/index.php';  // Halaman khusus admin
        </script>";
    } else {
        // Jika user biasa, redirect ke halaman user
        echo "<script>
        alert('Login Sukses, Welcome " . $_SESSION['username'] . "!');
        location.href='../user/index.php';  // Halaman untuk user biasa
        </script>";
    }
} else {
    // Jika login gagal
    echo "<script>
    alert('Username atau Password anda salah!');
    location.href='../login.php';  // Kembali ke halaman login
    </script>";
}
?>
