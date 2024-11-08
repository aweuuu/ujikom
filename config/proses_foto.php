<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $lokasi = '../assets/img/';
    
    if (isset($_FILES['lokasifile']) && $_FILES['lokasifile']['error'] == 0) {
        $foto = $_FILES['lokasifile']['name'];
        $tmp = $_FILES['lokasifile']['tmp_name'];
        $namafoto = rand() . '-' . $foto;
        move_uploaded_file($tmp, $lokasi . $namafoto);

        $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");
    } else {
        echo "<script>alert('Gagal mengunggah foto. Pastikan Anda memilih file.'); location.href='../admin/foto.php'</script>";
        exit;
    }

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../user/foto.php'
    </script>";
}

if (isset($_POST['edit'])) {
    $fotoid = $_POST['fotoid'];
    $Judulfoto = $_POST['Judulfoto'];
    $Deskripsifoto = $_POST['Deskripsifoto'];
    $tanggalunggah = date('y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $lokasi = '../assets/img/';
    
    if (isset($_FILES['lokasifile']) && $_FILES['lokasifile']['error'] == 0) {
        $foto = $_FILES['lokasifile']['name'];
        $tmp = $_FILES['lokasifile']['tmp_name'];
        $namafoto = rand() . '-' . $foto;

    

        move_uploaded_file($tmp, $lokasi . $namafoto);
        $sql = mysqli_query($koneksi, "UPDATE foto SET Judulfoto='$Judulfoto', Deskripsifoto='$Deskripsifoto', tanggalunggah='$tanggalunggah',lokasifile='$namafoto',albumid='$albumid' WHERE fotoid='$fotoid'");
    } else {
        $sql = mysqli_query($koneksi, "UPDATE foto SET Judulfoto='$Judulfoto', Deskripsifoto='$Deskripsifoto', tanggalunggah='$tanggalunggah',albumid='$albumid' WHERE fotoid='$fotoid'");
    }

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../user/foto.php'
    </script>";
}

if (isset($_POST['hapus'])) {
    $fotoid = $_POST['fotoid'];
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../assets/img/' . $data['lokasifile'])) {
        unlink('../assets/img/' . $data['lokasifile']);
    }

    $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../user/foto.php'
    </script>";

}
?>