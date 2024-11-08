<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>

        /* Menambahkan sedikit opasitas pada card agar teks lebih mudah dibaca */
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            /* Background putih dengan opasitas */
        }

        /* Menambahkan warna hitam pada navbar dan footer */
        .navbar,
        footer {
            background-color: rgba(0, 0, 0, 0.9);
            /* Warna hitam dengan opasitas 0.8 */
        }

        /* Menambahkan warna putih pada teks di navbar dan footer */
        .navbar .navbar-brand,
        .navbar .btn,
        footer p {
            color: white;
        }

        /* Mengubah warna tombol border dan teks di navbar */
        .navbar .btn-outline-primary {
            color: white;
            border-color: white;
        }

        .navbar .btn-outline-primary:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><b><h1>Galeri</h1></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
            <div class="navbar-nav me-auto">
            </div>
            <a href="register.php" class="btn btn-outline-primary">Register</a>
            <a href="login.php" class="btn btn-outline-primary ms-3">Login</a>
        </div>
    </div>
 </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Register</h5>
                        </div>
                        <form action="config/proses_register.php" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">Register</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php">Login disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>