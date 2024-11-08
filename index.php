<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <style>
        /* Styling untuk garis di bawah judul */
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .section-title::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: #dc3545; /* Warna garis */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-black bg-opacity-50">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-white" href="index.php"><h1><b>Galeri</b></h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"> </ul>
                <a href="register.php" class="btn btn-outline-dark text-white">Register</a>
                <a href="login.php" class="btn btn-outline-dark text-white ms-3">Login</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-dark bg-opacity-25 py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-5 fw-bolder">SELAMAT DATANG DI WEB GALERI FOTO</h1>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UJIKOM PPLG 2024 | SALWA NESA YULIANTI</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
