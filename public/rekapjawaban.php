<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/MSurvey.php';
require_once '../classes/Jawaban.php';
require_once '../classes/User.php';
require_once '../classes/Kategori.php';
$database = new Database();
$db = $database->getConnection();

$kategori = new Kategori($db);

$kategori = $kategori->getKategori();

if (!Auth::isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user = new User($db);

if (!$user->isAdmin($_SESSION['user_id'])) {
    header("Location: indexLoggedAs.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                            <a class="nav-link" href="indexAdmin.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editsurvey.php">Edit Survey</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rekapjawaban.php" style="border-bottom: solid white">Rekap
                                Jawaban</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edituser.php">Edit User</a>
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

    <div class="text-center p-3 mx-auto" style="width: 50%; color: #2c4182">
        <p class="mb-1 fs-2">Riwayat Pengisian Survey</p>
        <p class="fs-2 text-black" id="tp1">Kualitas Keseluruhan Politeknik Negeri Malang</p>
        <select class="form-select mt-3" style="background-color: #cecfd5; border-radius: 10px" id="pilih_jenis_survey">
            <option value="" selected>Kualitas Keseluruhan</option>
            <?php foreach ($kategori as $key => $row): ?>
                <option value="<?php echo $row['kategori_id'] ?>"><?php echo $row['kategori_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="container bg-white rounded-2 mt-4">
            <p class="text-black" id="tp3">Kualitas Keseluruhan Politeknik Negeri Malang</p>
            <div>
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>
    <div class="container bg-white rounded-pill pt-3 w-50 mb-3" style="border: solid black 1px">
        <p class="fw-bold" id="tp2">Kualitas Keseluruhan polinema masih perlu ditingkatkan</p>
    </div>

    <div class="container mb-4"><a href="indexAdmin.php" class="btn btn-primary btn-lg rounded-pill me-3 mx-auto"
            style="background-color: #4e73df; color: white">Kembali</a></div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        var myPieChart;

        $("#pilih_jenis_survey").change(function () {
            var kategori_id = $(this).val();
            $("#tp1").text($("#pilih_jenis_survey option:selected").text());
            $("#tp2").text($("#pilih_jenis_survey option:selected").text() + " masih perlu ditingkatkan");
            $("#tp3").text($("#pilih_jenis_survey option:selected").text());
            getJawaban(kategori_id);
        });

        function getJawaban(kategori_id) {
            $.ajax({
                url: "../api/getJawaban.php",
                type: "GET",
                data: {
                    kategori_id: kategori_id,
                },
                success: function (response) {
                    var lenSangat_Tidak_Setuju = response.filter(function (item) {
                        return item.jawaban == "Sangat Tidak Setuju";
                    }).length;
                    var lenTidak = response.filter(function (item) {
                        return item.jawaban == "Tidak Setuju";
                    }).length;
                    var lenCukup = response.filter(function (item) {
                        return item.jawaban == "Setuju";
                    }).length;
                    var lenSangat_Puas = response.filter(function (item) {
                        return item.jawaban == "Sangat Setuju";
                    }).length;
                    // perhitungan disini
                    var presentaseSangat_Tidak_Setuju = (lenSangat_Tidak_Setuju / response.length) * 100;
                    var presentaseTidak = (lenTidak / response.length) * 100;
                    var presentaseCukup = (lenCukup / response.length) * 100;
                    var presentaseSangat_Puas = (lenSangat_Puas / response.length) * 100;

                    generateChart(presentaseSangat_Tidak_Setuju, presentaseCukup, presentaseSangat_Puas, presentaseTidak);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                },
            });
        }

        function generateChart(Sangat_Tidak_Setuju, Cukup, Sangat_Puas, Tidak) {
            console.log(Sangat_Tidak_Setuju, Cukup, Sangat_Puas, Tidak);
            if (myPieChart) {
                myPieChart.destroy();
            }
            if (Sangat_Tidak_Setuju == 0 && Cukup == 0 && Sangat_Puas == 0 && Tidak == 0) {
                return;
            }
            var ctx = document.getElementById("myPieChart").getContext("2d");

            // Create gradient
            var gradientBlue = ctx.createLinearGradient(0, 0, 0, 400);
            gradientBlue.addColorStop(0, "#0000FF");
            gradientBlue.addColorStop(1, "#00FFFF");

            var gradientRed = ctx.createLinearGradient(0, 0, 0, 400);
            gradientRed.addColorStop(0, "#FF0000");
            gradientRed.addColorStop(1, "#FF6347");

            var gradientYellow = ctx.createLinearGradient(0, 0, 0, 400);
            gradientYellow.addColorStop(0, "#FFFF00");
            gradientYellow.addColorStop(1, "#FFD700");

            var gradientGreen = ctx.createLinearGradient(0, 0, 0, 400);
            gradientGreen.addColorStop(0, "#00FF00");
            gradientGreen.addColorStop(1, "#32CD32");

            myPieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Sangat Tidak Setuju", "Tidak Setuju", "Setuju", "Sangat Setuju"],
                    datasets: [{
                        data: [Sangat_Tidak_Setuju, Tidak, Cukup, Sangat_Puas],
                        backgroundColor: [gradientBlue, gradientRed, gradientYellow, gradientGreen],
                        borderColor: "#ffffff",
                        borderWidth: 2,
                        hoverOffset: 20,
                        hoverBorderWidth: 3,
                        hoverBorderColor: "#000000",
                    },],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top",
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.label || "";
                                    if (label) {
                                        label += ": ";
                                    }
                                    label += context.raw + "%";
                                    return label;
                                },
                            },
                        },
                        datalabels: {
                            formatter: (value, context) => {
                                let sum = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = (value * 100 / sum).toFixed(2);
                                return percentage > 0 ? percentage + "%" : "";
                            },
                            color: "#fff",
                            font: {
                                weight: 'bold',
                                size: 14,
                            }
                        },
                    },
                },
                plugins: [ChartDataLabels],
            });
        }
        getJawaban("");
    </script>
</body>

</html>