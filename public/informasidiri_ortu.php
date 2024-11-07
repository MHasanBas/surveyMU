<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../classes/Auth.php';
require_once '../classes/Database.php';
require_once '../classes/MSurvey.php';
require_once '../config/config.php';
require_once '../classes/User.php';
if (!Auth::isLoggedIn()) {
    header("Location: login.php");
    exit();
}


$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$mSurvey = new MSurvey($db);
$mSurvey->user_id = $_SESSION['user_id'];

$result = $mSurvey->getMSurvey();

if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $mSurvey->survey_id = $row['survey_id'];
    $mSurvey->survey_jenis = $row['survey_jenis'];
    if ($mSurvey->isAlreadyResponden()){
        if (!$user->isAdmin($_SESSION['user_id'])) {
            header("Location: indexUser.php");
            exit();
        }else{
            header("Location: indexAdmin.php");
            exit();
        }
    }
} else {
    echo "Tidak ada data survei yang ditemukan untuk user_id ini.";
}
$_SESSION['welcome'] = "Selamat datang, " . $_SESSION['name'] . "!";$role_login = $_SESSION['role'];
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
            background: url("../assets/img1.png") no-repeat center center;
            background-size: cover;
            border-radius: 15px;
            padding: 10rem 20%;
            margin: 20px auto;
            max-width: 90%;
            text-align: center;
        }

        .content2-container {
            background-color: white;
            border-radius: 15px;
            padding: 10rem 20%;
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-custom rounded-3 px-5" href="index.php">Beranda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex" style="height: 100vh">
        <div class="d-flex flex-column justify-content-center align-items-center"
            style="flex: 40%; background-color: #f8f9fa; padding: 2rem">
            <form style="width: 80%" action="save_responden.php" method="post">
                <h1>Informasi Diri</h1>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="Responden Tanggal" name="responden_tanggal"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_nama" name="responden_nama"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_jk" name="responden_jk"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_umur" name="responden_umur"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_hp" name="responden_hp"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_pendidikan" name="responden_pendidikan"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_pekerjaan" name="responden_pekerjaan"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="responden_penghasilan" name="responden_penghasilan"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="mahasiswa_nim" name="mahasiswa_nim"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="mahasiswa_nama" name="mahasiswa_nama"/>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="mahasiswa_prodi" name="mahasiswa_prodi"/>
                </div>
                <input hidden type="text" name="survey_id" class="form-control rounded-pill" value="<?php echo $row['survey_id'] ?>" />
                <input hidden type="text" name="survey_jenis" class="form-control rounded-pill" value="Ortu" />
                <button type="submit" class="btn rounded-pill w-100"
                    style="background-color: #4e73df; color: white">Simpan Data Diri</button>
            </form>
        </div>
        <div style="flex: 60%; background-color: #ffffff">
            <div class="text-center d-flex justify-content-center align-items-center"
                style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem;background: url('../assets/img1.png') no-repeat center center; background-size: cover; height: 50rem; position: relative">
                <!-- Overlay to darken the background image -->
                <div
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); border-radius: inherit">
                </div>

                <!-- Centered Text -->
                <div style="position: relative; z-index: 1; color: white; font-weight: bold; font-size: 2rem">Sistem
                    Survey Kepuasan Pelanggan<br />Politeknik Negeri Malang</div>
            </div>
        </div>
    </div>

    <footer class="text-white py-4" style="background-color: #2c4182">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="../assets/img4.png" alt="Footer Logo" style="height: 60%" />
            <div class="text-start">
                <p class="mb-0">BLU POLITEKNIK NEGERI MALANG</p>
                <p class="mb-0">- Soekarno Hatta Street No. 9 Malang 65141 Jatimulyo, Kec. Lokokwaru, Malang, East Java
                    - Indonesia</p>
                <p class="mb-0">- PMDN</p>
                <img src="../assets/img5.png" alt="PMDN Logo" style="height: 40px" />
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></body>

</html>