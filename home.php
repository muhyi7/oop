<?php
require('koneksi.php');
require('query.php');
$email = $_GET['user_fullname'] ?? false;
$obj = new crud;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div id="wrapper">
        <!-- Tambahkan sidebar sesuai dengan template SB Admin -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Tambahkan konten sidebar di sini -->
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Tambahkan konten navbar di sini -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?php echo $email; ?></h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Action</th> <!-- Kolom untuk tombol Edit dan Hapus -->
                            </tr>
                        </thead>
                        <tbody>
                <?php
                $data = $obj->lihatData();
                $no = 1;
                if ($data->rowCount() > 0) {
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['user_fullname']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                <?php
                        $no++;
                    }
                } ?>
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script Bootstrap di sini (JQuery, Popper.js, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
