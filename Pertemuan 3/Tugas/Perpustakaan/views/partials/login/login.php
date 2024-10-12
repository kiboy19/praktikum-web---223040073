<?php
session_start(); // Mulai session

// Jika session aktif, alihkan ke dashboard masing-masing berdasarkan role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin/index.php');
    } elseif ($_SESSION['role'] === 'user') {
        header('Location: user/index.php');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <section class="container-fluid">
        <div class="container p-5">
            <div class="kartu bg-light mx-auto rounded-3 p-5">
                <h1 class="text-center text-primary">Halaman Login</h1>
                <p class="text-center">Untuk melanjutkan, silahkan login untuk mengakses akun.</p>
                <div class="mx-auto bg-primary w-75 p-3 rounded-3">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label text-white">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                            <div id="username" class="form-text text-white">Kami tidak akan membagikan username anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>

                    <?php
                    include 'koneksi.php'; // Koneksi ke database

                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password']; // Password yang dimasukkan user

                        // Query untuk cek username
                        $query = "SELECT * FROM Akun WHERE username = '$username'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            // Verifikasi password
                            if (password_verify($password, $row['password'])) {
                                // Buat session
                                $_SESSION['id_akun'] = $row['id_akun'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['role'] = $row['role'];

                                // Arahkan ke dashboard berdasarkan role
                                if ($row['role'] === 'admin') {
                                    header('Location: admin/index.php');
                                } elseif ($row['role'] === 'user') {
                                    header('Location: user/index.php');
                                }
                                exit;
                            } else {
                                echo "<div class='text-danger'>Password salah!</div>";
                            }
                        } else {
                            echo "<div class='text-danger'>Username tidak ditemukan!</div>";
                        }
                    }
                    ?>

                </div>
                <p class="text-center mt-3">Jika anda belum memiliki akun, <a href="register.php">Daftar Disini</a></p>
            </div>
        </div>
    </section>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>