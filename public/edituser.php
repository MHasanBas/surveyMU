<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../classes/Auth.php';

if (!Auth::isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (!$user->isAdmin($_SESSION['user_id'])) {
    header("Location: indexLoggedAs.php");
    exit();
}

$user = new User($db);
$users = $user->getAllUsers();

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

        .scrollable-table {
            max-height: 400px;
            overflow-y: auto;
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
                            <a class="nav-link" href="indexAdmin.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editsurvey.php">Edit
                                Survey</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rekapjawaban.php">Rekap Jawaban</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edituser.php" style="border-bottom: solid white">Edit User</a>
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

    <div class="container">
        <p class="fs-3 m-3">Manajemen User</p>
        <button class="btn btn-primary btn-sm m-3" style="background-color: #ced5e8; color: black"
            data-bs-toggle="modal" data-bs-target="#tambahUserModal">+ TAMBAH</button>

        <div class="container p-3 scrollable-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data for demonstration -->
                    <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td>
                                <?= $user['role'] == 1 ? "Admin" : "User"; ?>
                            </td>
                            <td>
                                <a type="button" class="btn btn-danger btn-sm me-1"
                                    href="deleteuser.php?user_id=<?= $user['user_id'] ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    onclick="showmodal('<?= $user['username'] ?>', '<?= $user['nama'] ?>', '<?= $user['role'] ?>', '<?= $user['user_id'] ?>')">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
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
    <!-- Tambah User Modal Structure -->
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white rounded">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="adduser.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tambahUsername">Username</label>
                            <input name="username" type="text" class="form-control" id="tambahUsername" />
                        </div>
                        <div class="form-group">
                            <label for="tambahNamaLengkap">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" id="tambahNamaLengkap" />
                        </div>
                        <div class="form-group">
                            <label for="tambahLevel">Level</label>
                            <select name="role" class="form-control" id="tambahLevel">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tambahPassword">Password</label>
                            <input name="password" type="password" class="form-control" id="tambahPassword" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal Structure -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-white rounded">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="saveuser.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input name="username" type="text" class="form-control" id="editUsername" />
                        </div>
                        <div class="form-group">
                            <label for="editNamaLengkap">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" id="editNamaLengkap" />
                        </div>
                        <div class="form-group">
                            <label for="editLevel">Level</label>
                            <select name="role" class="form-control" id="editLevel">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tambahPassword">Password</label>
                            <input name="password" type="password" class="form-control" id="editPassword" />
                        </div>
                        <input type="hidden" name="user_id" id="editUserId" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        function showmodal(username, nama, level, user_id) {
            $('#editUsername').val(username);
            $('#editNamaLengkap').val(nama);
            $('#editLevel').val(level);
            $('#editUserId').val(user_id);
            $('#editUserModal').modal('show');
        }
    </script>
</body>

</html>