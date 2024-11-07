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

$mSurvey = new MSurvey($db);
$mSurvey->kategori_id = 4;
$soal = $mSurvey->getSoal();

$length_soal_pilihan = 0;
$length_soal_text = 0;

foreach ($soal as $key => $value) {
    if ($value['soal_jenis'] === "Pilihan") {
        $length_soal_pilihan++;
    } else {
        $length_soal_text++;
    }
}

$mSurvey->user_id = $_SESSION['user_id'];
$survey = $mSurvey->getMSurvey();
$survey = $survey->fetch(PDO::FETCH_ASSOC);

$survey_jenis = $survey['survey_jenis'];
$mSurvey->survey_jenis = $survey_jenis;
$mSurvey->survey_id = $survey['survey_id'];
$responden_id = $mSurvey->getTResponden();

$jawaban = new Jawaban($db);
$jawaban->kategori_id = 4;
$jawaban->responden_id = $responden_id;
$jawaban->responden = $survey_jenis;

$getJawaban = $jawaban->getJawaban();
$jawaban = $getJawaban->fetchAll(PDO::FETCH_ASSOC);

$answers = [];
foreach ($jawaban as $answer) {
    $answers[$answer['soal_id']] = $answer['jawaban'];
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
                <div class="collapse navbar-collapse justify-content-between ps-4" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="indexUser.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="isisurvey.php" style="border-bottom: solid white">Isi Survey</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="riwayatsurvey.php">Riwayat Survey</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="color: #58b1fb">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                <?php echo $user_name; ?> | <?php echo $role_login; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container text-center p-3">
        <p style="color: #2c4182" class="fs-3">Isi Kuisioner</p>
        <p class="fs-3 fw-medium">K.1.4 - KUALITAS LULUSAN POLITEKNIK NEGERI MALANG</p>
        <div class="container w-75 mx-auto bg-white rounded-3 text-left"
            style="border-left: solid 0.7rem #2c4182; text-align: left !important">
            <p class="fs-5 fw-medium text-left">Petunjuk Pengisian</p>
            <p>Halaman berikut berisi pernyataan-pernyataan mengenai yang kamu rasakan dan pikirkan sebagai mahasiswa
                aktif Politeknik Negeri Malang mengenai LULUSAN yang disediakan oleh Politeknik Negeri Malang.</p>
            <p>Pada bagian jawaban terdapat empat pilihan dengan keterangan berikut:</p>
            <p>
                1 :Sangat Tidak Setuju<br />

                2 :Tidak Setuju<br />

                3 :Setuju<br />

                4 :Sangat Setuju<br />
            </p>
        </div>
        <div class="container w-75 mx-auto bg-white rounded-4 text-left p-0 pb-3">
            <div class="m-0" style="background-color: #ced5e8">K.1.4 - KUALITAS LULUSAN POLITEKNIK NEGERI MALANG
            </div>
            <div>
                <form id="submitSurvey1" action="submitsurvey1.php" method="post">
                    <?php if ($length_soal_pilihan > 0): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kriteria Kepuasan</th>
                                    <th scope="col" colspan="4" class="text-center">Tingkat Kepuasan</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($soal as $key => $value) {
                                    if ($value['soal_jenis'] === "Pilihan") {
                                        echo '<tr>';
                                        echo '<th scope="row">' . $value['no_urut'] . '</th>';
                                        echo '<td>' . $value['soal_nama'] . '</td>';

                                        $options = [
                                            "Sangat Tidak Setuju",
                                            "Tidak Setuju",
                                            "Setuju",
                                            "Sangat Setuju"
                                        ];

                                        foreach ($options as $index => $option) {
                                            $checked = isset($answers[$value['soal_id']]) && $answers[$value['soal_id']] == $option ? 'checked' : '';
                                            echo '<td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q' . $key . '" id="q' . $key . '_' . ($index + 1) . '" value="' . $option . '" ' . $checked . ' disabled>
                                                    <label class="form-check-label" for="q' . $key . '_' . ($index + 1) . '">' . $option . '</label>
                                                </div>
                                            </td>';
                                        }
                                        echo '</tr>';
                                        echo '<input type="hidden" name="qid' . $value['no_urut'] . '" value="' . $value['soal_id'] . '">';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <?php if ($length_soal_text > 0): ?>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($soal as $key => $value) {
                                    if ($value['soal_jenis'] === "Text") {
                                        echo '<tr>';
                                        echo '<th scope="row">' . $value['no_urut'] . '</th>';
                                        echo '<td>' . $value['soal_nama'] . '</td>';
                                        echo '<td>
                    <input readonly name="isian' . $value['no_urut'] . '" type="text" class="form-control" style="height: 4rem" value="' . ($answers[$value['soal_id']] ?? '') . '"/>
                    <input type="hidden" name="isianid' . $value['no_urut'] . '" value="' . $value['soal_id'] . '">
                    </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>