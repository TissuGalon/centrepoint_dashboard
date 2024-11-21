<?php
require_once '../koneksi.php';

if (isset($_POST['periode_awal']) && isset($_POST['periode_akhir']) && isset($_POST['id'])) {
    $periode_awal = $_POST['periode_awal'];
    $periode_akhir = $_POST['periode_akhir'];
    $periode = $periode_awal . '-' . $periode_akhir;
    $id = $_POST['id'];
    $time = date('Y-m-d H:i:s');

    $query = mysqli_query($conn, "UPDATE kepengurusan SET periode = '$periode', updated_at = '$time' WHERE kepengurusan_id = $id");
    if ($query) {
        header('location:../../admin-kepengurusan.php?status=success');
    } else {
        header('location:../../admin-kepengurusan.php?status=failed');
    }
} else {
    header('location:../../admin-kepengurusan.php?status=failed');
}
?>