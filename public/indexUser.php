<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/MSurvey.php';
require_once '../classes/Jawaban.php';

$database = new Database();
$db = $database->getConnection();

if (!Auth::isLoggedIn()) {
    header("Location: login.php");
    exit();
}
$role_login = $_SESSION['role'];
$user_name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Survey Kepuasan Pelanggan Polinema</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            .navbar-custom {
                background-color: #2c4182;
            }
            .navbar-custom .navbar-brand,
            .navbar-custom .nav-link {
                color: white;
            }
            .btn-custom {
                background-color: #3d5ab0;
                color: white;
            }
            .content-container {
                background: url("../assets/buildingCampus.png") no-repeat center center;
                background-size: cover;
                border-radius: 15px;
                padding: 5rem 2rem;
                margin: 20px auto;
                max-width: 90%;
                text-align: center;
            }
            .content2-container {
                background-color: white;
                border-radius: 15px;
                padding: 2rem;
                margin: 20px auto;
                max-width: 90%;
                text-align: center;
            }
            .content-container h1 {
                font-family: "Arial Rounded MT Bold", "Helvetica Rounded", Arial, sans-serif;
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

            @media (min-width: 768px) {
                .content-container {
                    padding: 10rem 20%;
                }

                .content2-container {
                    padding: 10rem 5%;
                }
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
    <body style="background-color: #d9d9d9">
        <header>
        <nav class="navbar navbar-custom navbar-expand-lg shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../assets/logo.png" alt="Logo" style="height: 40px" />
                </a>
                <span class="navbar-text ml-3 text-white" style="font-weight: 500"> Survey Kepuasan Pelanggan Polinema
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between ps-4" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="indexUser.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="isisurvey.php">Isi Survey</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwayatsurvey.php">Riwayat Survey</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="color: #58b1fb">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                <?php echo $user_name; ?> | <?php echo $role_login; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </header>


 


        <div class="content-container shadow-lg">
            <h1>Sistem Survey Kepuasan Pelanggan Politeknik Negeri Malang</h1>
            <p>Sistem Survey Kepuasan Pelanggan Politeknik Negeri Malang merupakan sarana untuk mengukur tingkat kepuasan seluruh pemangku kepentingan polinema, mulai dari mahasiswa, orang tua/wali mahasiswa, alumni, mitra kerjasama, hingga pengguna lulusan polinema.</p>
            <a class="btn btn-explore rounded-pill px-4 py-2" href="isisurvey.php">Memulai</a>
        </div>

        <div class="content2-container shadow-lg d-flex flex-column flex-md-row gap-5 p-5">
            <div class="container rounded-4 p-2 clickable" style="background-color: #d9d9d9" onclick="window.location.href='riwayatsurvey.php';">
                <p class="fs-2"><b>Riwayat Survey</b><span class="red-span"></span></p>
                <img src="../assets/img2.png" class="img-fluid" style="height: 20rem" alt="" />
                <p class="fs-3 text-left">Tampilkan Riwayat Survey Anda</p>
                <p class="text-left">Ini berisi simpulan riwayat dari survey yang merupakan rangkuman singkat dari hasil yang ditemukan dalam sebuah survei yang telah dilakukan sebelumnya.</p>
            </div>
            <div class="container rounded-4 p-2 clickable" style="background-color: #d9d9d9" onclick="window.location.href='isisurvey.php';">
                <p class="fs-2"><b>Isi Survey</b><span class="red-span"></span></p>
                <img src="../assets/img3.png" class="img-fluid" style="height: 20rem" alt="" />
                <p class="fs-3 text-left">Isikan Survey Anda secara Jujur</p>
                <p class="text-left">Ini berisi kuesioner tentang penilaian Anda terhadap beberapa aspek yang disediakan Polinema.</p>
            </div>
        </div>

        <footer class="text-white py-4" style="background-color: #2c4182">
            <div class="container d-flex justify-content-between align-items-center">
                <img src="../assets/img4.png" alt="Footer Logo" style="height: 60%" />
                <div class="text-start">
                    <p class="mb-0">BLU POLITEKNIK NEGERI MALANG</p>
                    <p class="mb-0">- Soekarno Hatta Street No. 9 Malang 65141 Jatimulyo, Kec. Lokokwaru, Malang, East Java - Indonesia</p>
                    <p class="mb-0">- PMDN</p>
                    <img src="../assets/img5.png" alt="PMDN Logo" style="height: 40px" />
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
