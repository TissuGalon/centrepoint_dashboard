<?php
require_once '../koneksi.php';

if (isset($_POST['periode_awal']) && isset($_POST['periode_akhir'])) {
    $periode_awal = $_POST['periode_awal'];
    $periode_akhir = $_POST['periode_akhir'];
    $periode = $periode_awal . '-' . $periode_akhir;

    $query = mysqli_query($conn, "INSERT INTO kepengurusan (periode) VALUES ('$periode')");
    if ($query) {
        header('location:../../admin-kepengurusan.php?status=success');
    } else {
        header('location:../../admin-kepengurusan.php?status=failed');
    }
} else {
    header('location:../../admin-kepengurusan.php?status=failed');
}
?>