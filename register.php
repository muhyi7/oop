<?php
require ('koneksi.php');
require ('query.php');

$obj = new crud;

if($_SERVER['REQUEST_METHOD']=='POST');
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $name = $_POST['txt_name'];
    if($obj->insertData($email, $pass, $name));
        echo '<div class="alert alert-succes">Data berhasil disimpan</div>';
else:
    echo '<div class="alert alert-danger">Data gagal disimpan</div>';
    endif;
endif;
?>
<html