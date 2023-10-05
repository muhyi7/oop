<?php
$koneksi = mysqli_connect("localhost", "root", "", "user");
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM user_detail WHERE user_email = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_array($result)) {
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
            $level = $row['level'];

            if ($userVal == $email && $passVal == $pass) {
                if ($level == '1') {
                    header('Location: home.php?user_fullname=' . urlencode($userName));
                    exit;
                } elseif ($level == '2') {
                    header('Location: home_user.php?user_fullname=' . urlencode($userName));
                    exit;
                } else {
                    $error = 'User atau password salah!!';
                }
            } else {
                $error = 'User atau password salah!!';
            }
        } else {
            $error = 'User tidak ditemukan!!';
        }
    } else {
        $error = 'Data tidak boleh kosong!!';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Login</div>
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password:</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Log In</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="mb-0">Belum punya akun? <a href="register.php">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script Bootstrap di sini (JQuery, Popper.js, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
