<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../classes/Auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if ($user->login()) {
        Auth::login($user->id, $user->role, $user->nama);
        //echo "Login successful!";
        header("Location: indexLoggedAs.php");
    } else {
        $_SESSION['error'] = "Login failed!";
    }
}
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

        @media (min-width: 768px) {
            .content-container {
                padding: 10rem 20%;
            }

            .content2-container {
                padding: 10rem 20%;
            }
        }

        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
            }

            .content2-container {
                padding: 2rem;
            }

            .form-control,
            .btn {
                font-size: 1rem;
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

    <div class="d-flex flex-column flex-md-row" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-center align-items-center"
            style="flex: 1; background-color: #f8f9fa; padding: 2rem">
            <form style="width: 80%" action="login.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" id="username" placeholder="Username"
                        name="username" />
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control rounded-pill" id="password" placeholder="Password"
                        name="password" />
                </div>
                <button type="submit" class="btn rounded-pill w-100"
                    style="background-color: #4e73df; color: white">Login</button>
                <div class="mt-3 text-center">
                    <span>Belum punya akun? <a href="register.php" style="color: blue">Register</a></span>
                </div>
            </form>
        </div>
        <div style="flex: 1; background-color: #ffffff">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '$_SESSION[success]',
            });
        </script>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '$_SESSION[error]',
            });
        </script>";
        unset($_SESSION['error']);
    }
    ?>
</body>

</html>
