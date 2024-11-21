<?php
require_once '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $time = date('Y-m-d H:i:s');

    $query = mysqli_query($conn, "UPDATE kepengurusan SET deleted_at = '$time' WHERE kepengurusan_id = $id");
    if ($query) {
        header('location:../../admin-kepengurusan.php?status=success');
    } else {
        header('location:../../admin-kepengurusan.php?status=failed');
    }   
} else {
    header('location:../../admin-kepengurusan.php?status=failed');
}
?>