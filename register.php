<?php
require('koneksi.php');
require('query.php');

$obj = new crud();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_name'];

    if ($obj->insertData($email, $pass, $name)) {
        $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil disimpan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data gagal disimpan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Register</div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password:</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_name">Nama:</label>
                                <input type="text" class="form-control" id="txt_name" name="txt_name" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
                <?php echo isset($message) ? $message : ''; ?>
            </div>
        </div>
    </div>
    <p class="text-center mt-3"><a href="login.php">Sudah punya akun? Login di sini.</a></p>

    <!-- Tambahkan script Bootstrap di sini (JQuery, Popper.js, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
