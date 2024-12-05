<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../classes/Auth.php';
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../config/config.php';
require_once '../classes/MSurvey.php';

if (!Auth::isLoggedIn()) {
    header("Location: login.php");
    exit();
}
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->user_id = $_SESSION['user_id'];

if ($user->isAlreadyAssigned()) {

    $mSurvey = new MSurvey($db);
    $mSurvey->user_id = $_SESSION['user_id'];

    $result = $mSurvey->getMSurvey();

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $mSurvey->survey_jenis = $row['survey_jenis'];
        if ($row['survey_jenis'] == 'Mahasiswa') {
            header("Location: informasidiri_mahasiswa.php");
        } else if ($row['survey_jenis'] == 'Alumni') {
            header("Location: informasidiri_alumni.php");f
        } else if ($row['survey_jenis'] == 'Ortu') {
            header("Location: informasidiri_ortu.php");
        } else if ($row['survey_jenis'] == 'Dosen') {
            header("Location: informasidiri_dosen.php");
        } else if ($row['survey_jenis'] == 'Tendik') {
            header("Location: informasidiri_tendik.php");
        } else if ($row['survey_jenis'] == 'Industri') {
            header("Location: informasidiri_industri.php");
        }
    } else {
        echo "Tidak ada data survei yang ditemukan untuk user_id ini.";
    }
    exit();
}

$role_login = $_SESSION['role'];
$user_name = $_SESSION['name'];

$_SESSION['welcome'] = "Selamat datang, " . $_SESSION['name'] . "!";
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
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        .navbar-custom {
            background-color: #2c4182;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }

        .btn-custom {
            background-color: #4e73df;
            color: white;
        }

        .content-container {
            background: url("../assets/bg.png") no-repeat center center;
            background-size: cover;
            border-radius: 15px;
            padding: 5rem 10%;
            margin: 20px auto;
            max-width: 90%;
            text-align: center;
            color: white;
        }

        .content-container h1,
        .content-container p {
            margin-bottom: 1.5rem;
        }

        .btn-explore {
            background-color: #4e73df;
            color: white;
            font-weight: bold;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card img {
            border-radius: 15px 15px 0 0;
            height: 250px;
            object-fit: cover;
            transition: transform 0.2s;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        footer {
            background-color: #2c4182;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }

        footer img {
            height: 40px;
            margin-right: 1rem;
        }

        footer p {
            margin: 0;
        }

        /* Additional Styles */
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            color: white;
        }

        .overlay h2 {
            color: #4e73df;
        }

        .overlay button {
            background-color: #4e73df;
            border: none;
            color: white;
            padding: 0.5rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .overlay button:hover {
            background-color: #3d5ab0;
        }

        .card-body {
            background: linear-gradient(135deg, #4e73df, #2c4182);
            border-radius: 0 0 15px 15px;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>

<body>
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
    <div class="content-container fade-in">
        <h1>Selamat Datang di Survey Kepuasan Pelanggan Polinema</h1>
        <p>Pilih salah satu kategori di bawah ini untuk memulai survey</p>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/Mahasiswa.png" class="card-img-top" alt="Mahasiswa" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Mahasiswa')" class="btn btn-primary rounded-pill">Mahasiswa</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/Dosen.jpg" class="card-img-top" alt="Dosen" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Dosen')" class="btn btn-primary rounded-pill">Dosen</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/Alumni.jpg" class="card-img-top" alt="Alumni" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Alumni')" class="btn btn-primary rounded-pill">Alumni</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/Tendik.png" class="card-img-top" alt="Tendik" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Tendik')" class="btn btn-primary rounded-pill">Tenaga Didik</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/Mitra.png" class="card-img-top" alt="Mitra" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Industri')" class="btn btn-primary rounded-pill">Mitra</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center fade-in">
                    <img src="../assets/OrangTua.png" class="card-img-top" alt="Orang Tua" />
                    <div class="card-body">
                        <button onclick="save_m_survey('Ortu')" class="btn btn-primary rounded-pill">Orang Tua</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="save_m_survey.php" method="post" id="save_m_survey">
        <input type="hidden" name="survey_jenis" id="survey_jenis" />
    </form>
    <footer>
        <div class="container d-flex justify-content-between align-items-center">
            <img src="../assets/img4.png" alt="Footer Logo" />
            <div>
                <p>BLU POLITEKNIK NEGERI MALANG</p>
                <p>Soekarno Hatta Street No. 9 Malang 65141 Jatimulyo, Kec. Lokokwaru, Malang, East Java, Indonesia</p>
                <img src="../assets/img5.png" alt="PMDN Logo" />
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function save_m_survey(survey_jenis) {
            document.getElementById('survey_jenis').value = survey_jenis;
            document.getElementById('save_m_survey').submit();
        }

        <?php
        if (isset($_SESSION['welcome'])) {
            echo "Swal.fire({
                title: '$_SESSION[welcome]',
                width: 600,
                padding: '3em',
                color: '#716add',
                background: '#fff url(/images/trees.png)',
                backdrop: `rgba(0,0,123,0.4) url('https://sweetalert2.github.io/images/nyan-cat.gif') left top no-repeat`
            });";
            unset($_SESSION['welcome']);
        }
        ?>
    </script>
</body>

</html>
