<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <!-- Login -->
    <section class="container-fluid">
        <div class="container p-5">
            <div class="kartu bg-light mx-auto rounded-3 p-5">
                <h1 class="text-center text-primary">Halaman Pendaftaran</h1>
                <p class="text-center">Untuk melanjutkan, silahkan melakukan pendaftaran untuk mengakses akun.</p>
                <div class="mx-auto bg-primary w-75 p-3 rounded-3">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label text-white">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailhelp">
                            <div id="emailhelp" class="form-text text-white">Kami tidak akan membagikan Email anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label text-white">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Daftar</button>
                    </form>
                    <?php
                    include 'koneksi.php';

                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $nama = $_POST['nama'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $password = $_POST['password'];

                        // Hashing password untuk keamanan
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Memeriksa apakah username atau email sudah terdaftar
                        $check_user = "SELECT * FROM Akun WHERE username='$username' OR email='$email'";
                        $result = $conn->query($check_user);

                        if ($result->num_rows > 0) {
                            echo "Username atau Email sudah terdaftar!";
                        } else {
                            // Menyimpan data pengguna baru ke database
                            $query = "INSERT INTO Akun (username, email, nama, jenis_kelamin, tanggal_lahir, password, role)
                  VALUES ('$username', '$email', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$hashed_password', 'user')";

                            if ($conn->query($query) === TRUE) {
                                echo "Pendaftaran berhasil! Silakan login.";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }
                    }
                    ?>

                </div>
                <p class="text-center mt-3">Sudah memiliki akun? <a href="login.php">Login Disini</a></p>
            </div>
        </div>
    </section>
    <!-- Akhir Login -->

    <!-- Javascript -->
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>