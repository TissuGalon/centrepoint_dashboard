<?php
require_once '../koneksi.php';

if (isset($_POST['nim']) && isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['kepengurusan_id']) && isset($_POST['role_id']) && isset($_POST['tahun_bergabung'])) {
    $nim = $_POST['nim'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $kepengurusan_id = $_POST['kepengurusan_id'];
    $role_id = $_POST['role_id'];
    $tahun_bergabung = $_POST['tahun_bergabung'];
    $tahun_alumni = $_POST['tahun_alumni'];
    $photo = $_FILES['photo']['name'];

    // Jika ada file foto, proses upload
    if ($photo) {
        $target_dir = "../../media/users/"; // Sesuaikan dengan direktori upload Anda
        $imageFileType = strtolower(pathinfo($photo, PATHINFO_EXTENSION));

        // Generate nama file acak
        $random_name = uniqid('user_') . '.' . $imageFileType;
        $target_file = $target_dir . $random_name;

        // Cek apakah file yang diupload gambar valid
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Foto berhasil diupload
                $photo = $random_name; // Ganti nama file dengan nama yang baru
            } else {
                header('Location: ../../admin-users.php?status=upload_failed');
                exit();
            }
        } else {
            header('Location: ../../admin-users.php?status=invalid_image');
            exit();
        }
    } else {
        $photo = NULL; // Jika tidak ada foto, set sebagai NULL
    }

    // Query untuk memasukkan data anggota
    $query = mysqli_query($conn, "INSERT INTO member (nim, fullname, gender, kepengurusan_id, role_id, photo, tahun_bergabung, tahun_alumni) 
                                  VALUES ('$nim', '$fullname', '$gender', '$kepengurusan_id', '$role_id', '$photo', '$tahun_bergabung', '$tahun_alumni')");

    if ($query) {
        header('Location: ../../admin-users.php?status=success');
    } else {
        header('Location: ../../admin-users.php?status=failed');
    }
} else {
    header('Location: ../../admin-users.php?status=failed');
}
?>
