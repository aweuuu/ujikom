<?php
session_start();
include '../config/koneksi.php';
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php"><b><h2>Galeri</h2></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php"><b>Home</b></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><b>Add Here</b></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="album.php">Album</a></li>
                            <li><a class="dropdown-item" href="foto.php">Photo</a></li>
                        </ul>
                    </li>

                </ul>
                <a href="../config/proses_logout.php" class="btn btn-outline-primary">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark bg-opacity-75 py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tambah Photo</h1>
            </div>
        </div>
    </header>

    <!-- bagi 2 kolom -->
    <!-- kolom 1 -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/proses_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi Foto</label>
                            <textarea class="form-control" name="deskripsifoto" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required>
                                <?php
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                    <option value="<?php echo $data_album['albumid'] ?>">
                                        <?php echo $data_album['namaalbum'] ?>
                                    </option>
                                <?php } ?>

                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-conrtol" name="lokasifile" required>
                            <button type="submit" class="btn btn-primary mt-3" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- kolom 2 -->
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Galeri Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                                        <td><?php echo $data['Judulfoto'] ?></td>
                                        <td><?php echo $data['Deskripsifoto'] ?></td>
                                        <td><?php echo $data['tanggalunggah'] ?></td>
                                        <td>
                                            <!-- edit button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/proses_foto.php" method="POST"
                                                                enctype="multipart/form-data">
                                                                <input type="hidden" name="fotoid"
                                                                    value="<?php echo $data['fotoid'] ?>">
                                                                <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="Judulfoto"
                                                                    value="<?php echo $data['Judulfoto'] ?>"
                                                                    class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="Deskripsifoto"
                                                                    required><?php echo $data['Deskripsifoto'] ?>
                                                                        </textarea>
                                                                <select class="form-control" name="albumid">
                                                                    <?php
                                                                    $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                                        <option <?php if ($data_album['albumid'] == $data['albumid']) { ?>
                                                                                selected="selected" <?php } ?>
                                                                            value="<?php echo $data_album['albumid'] ?>">
                                                                            <?php
                                                                            echo $data_album['namaalbum'] ?>
                                                                        </option>
                                                                    <?php } ?>

                                                                </select>
                                                                <label class="form-label">Foto</label>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>"
                                                                            width="100">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label class="form-label">Ganti File</label>
                                                                        <input type="file" class="form-conrtol"  name="lokasifile">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- delete button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                                                Hapus
                                            </button>
                                            <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/proses_foto.php" method="POST">
                                                                <input type="hidden" name="fotoid"
                                                                    value="<?php echo $data['fotoid'] ?>">
                                                                Apakah anda yakin ingin menghapus data <strong>
                                                                    <?php echo $data['Judulfoto'] ?> </strong> ?

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus" class="btn btn-primary">Hapus
                                                                Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

  
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>