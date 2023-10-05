<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Edit User</div>
                    <div class="card-body">
                        <?php
                        require('koneksi.php');
                        require('query.php');

                        $obj = new crud();

                        if (isset($_POST['update'])) {
                            $userId = $_POST['txt_id'];
                            $userMail = $_POST['txt_email'];
                            $userPass = $_POST['txt_pass'];
                            $userName = $_POST['txt_nama'];
                            $userLevel = $_POST['txt_level'];

                            if ($obj->editData($userId, $userMail, $userPass, $userName, $userLevel)) {
                                header('Location: home.php');
                            } else {
                                echo "Gagal melakukan pembaruan.";
                            }
                        }

                        $id = $_GET['id'];
                        $result = $obj->lihatData();
                        $userData = null;

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['id'] == $id) {
                                $userData = $row;
                            }
                        }

                        if ($userData) {
                        ?>
                            <form action="edit.php" method="POST">
                                <input type="hidden" name="txt_id" value="<?php echo $userData['id']; ?>">
                                <div class="form-group">
                                    <label for="txt_email">Email:</label>
                                    <input type="text" class="form-control" id="txt_email" name="txt_email" value="<?php echo $userData['user_email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt_pass">Password:</label>
                                    <input type="password" class="form-control" id="txt_pass" name="txt_pass" value="<?php echo $userData['user_password']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txt_nama">Nama:</label>
                                    <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?php echo $userData['user_fullname']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txt_level">Level:</label>
                                    <select class="form-control" id="txt_level" name="txt_level">
                                        <option value="1" <?php if ($userData['level'] == 1) echo 'selected'; ?>>Admin</option>
                                        <option value="2" <?php if ($userData['level'] == 2) echo 'selected'; ?>>User</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </form>
                        <?php } else {
                            echo "Data tidak ditemukan.";
                        } ?>
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
