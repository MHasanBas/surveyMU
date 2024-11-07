<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan Pelanggan Polinema</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #2c4182;
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: white;
        }
        .btn-custom {
            background-color: #3d5ab0;
            color: white;
        }
        .content-container {
            background: url('../assets/buildingCampus.png') no-repeat center center;
            background-size: cover;
            border-radius: 15px;
            padding: 5rem 2rem;
            margin: 20px auto;
            max-width: 90%;
            text-align: center;
        }
        @media (min-width: 768px) {
            .content-container {
                padding: 10rem 20%;
            }
        }
        .content2-container{
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            margin: 20px auto;
            max-width: 90%;
            text-align: center;
        }
        @media (min-width: 768px) {
            .content2-container {
                padding: 10rem 5%;
            }
        }
        .content-container h1 {
            font-family: 'Arial Rounded MT Bold', 'Helvetica Rounded', Arial, sans-serif;
            font-weight: bold;
            color: white;
            margin-bottom: 3rem;
        }
        .content-container p {
            color: white;
            margin-bottom: 2rem;
        }
        .btn-explore {
            background-color: #4e73df;
            color: white;
            font-weight: bold;
        }
        .red-span {
            display: inline-block;
            height: 5px;
            background-color: red;
            vertical-align: middle;
            margin-left: 10px;
            width: 60%;
        }
        @media (max-width: 768px) {
            .content2-container {
                padding: 1rem;
            }
            .content2-container .container {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body style="background-color: #d9d9d9;">
    <header>
        <nav class="navbar navbar-custom navbar-expand-lg shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../assets/logo.png" alt="Logo" style="height: 40px;">
                </a>
                <span class="navbar-text ml-3 text-white" style="font-weight: 500;">
                    Survey Kepuasan Pelanggan Polinema
                </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-custom rounded-3 px-5" href="login.php">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="content-container shadow-lg">
        <h1>Sistem Survey Kepuasan Pelanggan Politeknik Negeri Malang</h1>
        <p>Sistem Survey Kepuasan Pelanggan Politeknik Negeri Malang merupakan sarana untuk mengukur tingkat kepuasan seluruh pemangku kepentingan polinema, mulai dari mahasiswa, orang tua/wali mahasiswa, alumni, mitra kerjasama, hingga pengguna lulusan polinema.</p>
        <a class="btn btn-explore rounded-pill px-4 py-2" href="login.php">Mulai Survey</a>
    </div>

    <div class="content2-container shadow-lg d-flex flex-column flex-md-row gap-5 p-5">
        <div class="container rounded-4 p-2" style="background-color: #d9d9d9;" onclick="window.location.href='login.php';">
            <p class="fs-2"><b>Riwayat Survey</b><span class="red-span"></span></p>
            <img src="../assets/img2.png" class="img-fluid" style="height:20rem;" alt="">
            <p class="fs-3 text-left">Tampilkan Riwayat Survey Anda</p>
            <p class="text-left">Ini berisi simpulan riwayat dari survey yang merupakan rangkuman singkat dari hasil yang ditemukan dalam sebuah survei yang telah dilakukan sebelumnya.</p>
        </div>
        <div class="container rounded-4 p-2" style="background-color: #d9d9d9;" onclick="window.location.href='login.php';">
            <p class="fs-2"><b>Isi Survey</b><span class="red-span"></span></p>
            <img src="../assets/img3.png" class="img-fluid" style="height:20rem;" alt="">
            <p class="fs-3 text-left">Isikan Survey Anda secara Jujur</p>
            <p class="text-left">Ini berisi kuesioner tentang penilaian Anda terhadap beberapa aspek yang disediakan Polinema.</p>
        </div>
    </div>

    <footer class="text-white py-4" style="background-color:#2c4182">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/img4.png" alt="Footer Logo" class="img-fluid" style="max-height: 100px;">
                </div>
                <div class="col-md-6 text-md-end">
                    <div>
                        <p class="mb-0">BLU POLITEKNIK NEGERI MALANG</p>
                        <p class="mb-0">- Soekarno Hatta Street No. 9 Malang 65141 Jatimulyo, Kec. Lokokwaru, Malang, East Java - Indonesia</p>
                        <p class="mb-0">- PMDN</p>
                        <img src="../assets/img5.png" alt="PMDN Logo" class="img-fluid" style="max-height: 40px;">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
