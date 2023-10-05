<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Panggil fungsi hapusData untuk menghapus data berdasarkan ID
    if ($obj->hapusData($id)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Data gagal dihapus.";
    }
    
    // Redirect kembali ke halaman Home setelah menghapus data
    header('Location: home.php');
} else {
    echo "ID tidak valid.";
}
?>
