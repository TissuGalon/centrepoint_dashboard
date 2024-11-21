<?php
require_once('controller/koneksi.php');
session_start();
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
    <title>Users</title>
    <meta name="description" content="" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
    
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    
    <!-- CUSTOM SAYA -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <!-- CUSTOM SAYA -->
</head>

<body>
    
    
    
    <!-- ISI HALAMAN -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <!-- SIDEBAR -->
            <?php include 'component/sidebar.php'; ?>
            <!-- / SIDEBAR -->
            
            <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
            
            <!-- ISI -->
            <div class="layout-page">
                
                <!-- NAVBAR -->
                <?php include 'component/topbar.php'; ?>
                <!-- NAVBAR -->
                
                <!-- CONTENT -->
                <div class="content-wrapper">
                    
                    
                    <!-- ISI CONTENT -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        
                        
                        <!-- DIVIDER -->
                        <div class="card my-2">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="fw-bold my-2">MANAGE MEMBERS</h4>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h4 class="fw-bold my-2">
                                            <span class="text-muted fw-light">Members /</span>
                                            All
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- DIVIDER -->
                        
                        <!-- TABLE -->
                        <div class="card">
                            <div class="card-body">
                                <button data-bs-toggle="modal" data-bs-target="#ModalTambahMember"
                                class="btn btn-primary mb-1"><i class="menu-icon tf-icons bx bx-plus"></i>
                                Tambah Member</button>
                                
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered display py-4" id="example" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>User ID</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Gender</th>
                                            <th>Periode</th>
                                            <th>Role</th>
                                            <th>Tahun Bergabung</th>
                                            <th>Alumni</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>User ID</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Gender</th>
                                            <th>Periode</th>
                                            <th>Role</th>
                                            <th>Tahun Bergabung</th>
                                            <th>Alumni</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, "SELECT * FROM member");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no++; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="media/users/<?php echo $row['photo']; ?>"
                                                        class="rounded" alt="User Image"
                                                        style="width: 80px; height: 80px; cursor:Pointer;"
                                                        onclick=""
                                                        onerror="this.onerror=null; this.src='media/blank_image.jpg';">
                                                    </td>
                                                    <td>
                                                        <?php echo $row['user_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fullname']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['nim']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['gender']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['kepengurusan_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['role_id']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-label-primary me-1">
                                                            <?php echo $row['tahun_bergabung'] ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($row['tahun_alumni'] == null || $row['tahun_alumni'] == '') {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button data-bs-toggle="modal" data-bs-target="#ModalEdit"
                                                        class="btn btn-sm btn-warning"><i
                                                        class="menu-icon tf-icons bx bx-pencil"></i></button>
                                                        <button data-bs-toggle="modal" data-bs-target="#ModalHapus"
                                                        onclick="hapus_anggota(document.getElementById('nama_anggota').innerText)"
                                                        class="btn btn-sm btn-danger"><i
                                                        class="menu-icon tf-icons bx bx-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- TABLE -->
                        
                        <!-- MODAL TAMBAH -->
                        <div class="modal fade" id="ModalTambahMember" data-bs-backdrop="static" tabindex="-1"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content" action="controller/member/proses_tambah_anggota.php"
                            method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Anggota</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nim" class="form-label">NIM</label>
                                                <input type="text" id="nim" name="nim" class="form-control"
                                                placeholder="Masukkan NIM" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="fullname" class="form-label">Nama</label>
                                                <input type="text" id="fullname" name="fullname"
                                                class="form-control" placeholder="Masukkan Nama" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select id="gender" name="gender" class="form-select" required>
                                                    <option value="male" selected>Laki-laki</option>
                                                    <option value="female">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="kepengurusan_id" class="form-label">Pengurus
                                                    Periode</label>
                                                    <select id="kepengurusan_id" name="kepengurusan_id"
                                                    class="form-select">
                                                    <option value="">Pilih Jika Pengurus</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM kepengurusan");
                                                    while ($row = mysqli_fetch_array($query)) { ?>
                                                            <option value="<?php echo $row['kepengurusan_id'] ?>">
                                                                <?php echo $row['periode'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="role_id" class="form-label">Role (Sekarang)</label>
                                                    <select id="role_id" name="role_id" class="form-select"
                                                    required>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM roles WHERE role_id != 1");
                                                    while ($row = mysqli_fetch_array($query)) { ?>
                                                            <option value="<?php echo $row['role_id'] ?>" <?php if
                                                               ($row['role_id'] == 7) {
                                                                   echo 'selected';
                                                               } ?>>
                                                                <?php echo $row['role_name'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="tahun_bergabung" class="form-label">Tahun
                                                        Bergabung</label>
                                                        <input type="number" value="2022" id="tahun_bergabung"
                                                        name="tahun_bergabung" class="form-control"
                                                        placeholder="Tahun bergabung ke UKM-POLICY" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="tahun_alumni" class="form-label">Tahun Menjadi
                                                            Alumni</label>
                                                            <input type="number" value="" id="tahun_alumni"
                                                            name="tahun_alumni" class="form-control"
                                                            placeholder="Tahun menjadi Alumni (Isi jika Alumni)">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="photo" class="form-label">Photo</label>
                                                            <input type="file" id="photo" name="photo" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- MODAL TAMBAH -->
                            
                            
                            
                            
                            <!-- ---------------------- -->
                            <br>
                            
                            
                            <!-- DIVIDER -->
                            <div class="card my-2">
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="fw-bold my-2">MANAGE USERS</h4>
                                        </div>
                                        <div class="col-6 text-end">
                                            <h4 class="fw-bold my-2"><span class="text-muted fw-light">Users /</span>
                                                All</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DIVIDER -->
                                
                                <!-- TABLE -->
                                <div class="card">
                                    <div class="card-body">
                                        <button data-bs-toggle="modal" data-bs-target="#ModalTambah"
                                        class="btn btn-primary mb-1"><i class="menu-icon tf-icons bx bx-plus"></i>
                                        Tambah Data</button>
                                        <button class="btn btn-success mb-1"><i class='bx bxs-file-import'></i>
                                            Import</button>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered display py-4" id="example" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Foto</th>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>EMail</th>
                                                        <th>Role</th>
                                                        <th>Gender</th>
                                                        <th>Point</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Foto</th>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>EMail</th>
                                                        <th>Role</th>
                                                        <th>Gender</th>
                                                        <th>Point</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query = mysqli_query($conn, "SELECT * FROM users");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr id="1">
                                                                <td>
                                                                    <?= $no++; ?>
                                                                </td>
                                                                <td>
                                                                    <button data-bs-toggle="modal" data-bs-target="#ModalFoto"
                                                                    class="btn btn-sm btn-primary"><i
                                                                    class="menu-icon tf-icons bx bx-image"></i></button>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['username']; ?>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['fullname']; ?>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['email']; ?>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['role_id']; ?>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['gender']; ?>
                                                                </td>
                                                                <td id="">
                                                                    <?= $row['points']; ?>
                                                                </td>
                                                                <td>
                                                                    <button data-bs-toggle="modal" data-bs-target="#ModalEdit"
                                                                    class="btn btn-sm btn-warning"><i
                                                                    class="menu-icon tf-icons bx bx-pencil"></i></button>
                                                                    <button data-bs-toggle="modal" data-bs-target="#ModalHapus"
                                                                    onclick="hapus_anggota(document.getElementById('nama_anggota').innerText)"
                                                                    class="btn btn-sm btn-danger"><i
                                                                    class="menu-icon tf-icons bx bx-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TABLE -->
                                    
                                    
                                </div>
                                <!-- ISI CONTENT -->
                                
                                <!-- FOOTER -->
                                <?php include 'component/footer.php'; ?>
                                <!-- FOOTER -->
                                
                                <div class="content-backdrop fade"></div>
                                
                                
                            </div>
                            <!-- CONTENT -->
                            
                        </div>
                        <!-- ISI -->
                        
                        <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                        
                        
                        <!-- MODAL -->
                        <!-- MODAL FOTO -->
                        <div class="modal fade" id="ModalFoto" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title" id="modalCenterTitle">Foto user</h5> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="images/muhammad_khollis.jpeg" alt="Card image cap"
                                            style="aspect-ratio:1/1; object-fit:cover;">
                                            <div class="card-body">
                                                <h5 class="card-title"><span class="badge bg-label-primary me-1">Anggota</span>
                                                    Muhammad Kholis</h5>
                                                    <!--  <p class="card-text">
                                                        Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.
                                                    </p> -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL FOTO -->
                            <!-- MODAL EDIT -->
                            <div class="modal fade" id="ModalEdit" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <form class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="backDropModalTitle">Edit Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                </div>
                                                <img class="card-img" src="images/muhammad_khollis.jpeg"
                                                style="width:100%; height:auto; aspect-ratio:1/1; object-fit:cover;"
                                                alt="Card image cap">
                                                <button class="btn btn-primary w-100 m-2 mb-4">Upload Gambar</button>
                                                <ul>
                                                    <li class="text-dark">Status: <b>Anggota Tidak Tetap</b></li>
                                                </ul>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                placeholder="Other Detail" rows="3"></textarea>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">NIM</label>
                                                        <input type="number" id="nameBackdrop" class="form-control"
                                                        placeholder="Masukkan NIM">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Nama</label>
                                                        <input type="text" id="nameBackdrop" class="form-control"
                                                        placeholder="Masukkan Nama">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Alamat</label>
                                                        <input type="text" id="nameBackdrop" class="form-control"
                                                        placeholder="Masukkan Alamat">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" id="nameBackdrop" class="form-control"
                                                        placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Tempat Lahir</label>
                                                        <input type="text" id="nameBackdrop" class="form-control"
                                                        placeholder="Masukkan Tempat Lahir">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Nomor Handphone</label>
                                                        <input type="date" id="nameBackdrop" class="form-control"
                                                        placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Email</label>
                                                        <input type="date" id="nameBackdrop" class="form-control"
                                                        placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Jurusan</label>
                                                        <select id="defaultSelect" class="form-select">
                                                            <option>Default select</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Program Studi</label>
                                                        <select id="defaultSelect" class="form-select">
                                                            <option>Default select</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Tahun Bergabung</label>
                                                        <input type="number" id="nameBackdrop" class="form-control"
                                                        placeholder="Tahun Bergabung">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBackdrop" class="form-label">Tahun Lulus</label>
                                                        <input type="number" id="nameBackdrop" class="form-control"
                                                        placeholder="Tahun Lulus">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- MODAL EDIT -->
                        <!-- MODAL TAMBAH -->
                        <div class="modal fade" id="ModalTambah" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="backDropModalTitle">Tambah Anggota</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">NIM</label>
                                                    <input type="text" id="nameBackdrop" class="form-control"
                                                    placeholder="Masukkan Nim">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBackdrop" class="form-label">Nama</label>
                                                    <input type="text" id="nameBackdrop" class="form-control"
                                                    placeholder="Masukkan Nama">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- MODAL TAMBAH -->
                    
                    <!-- SCRIPT HAPUS -->
                    <script>
                        function hapus_anggota(nama) {
                            let text_hapus = `Hapus anggota <b>${nama}</b> ?`;
                            document.getElementById("text_hapus").innerHTML = text_hapus;
                            
                        }
                    </script>
                    <!-- SCRIPT HAPUS -->
                    <!-- MODAL HAPUS -->
                    <div class="modal fade" id="ModalHapus" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Alert</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <p id="text_hapus">gg</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL HAPUS -->
                    <!-- MODAL -->
                    
                    
                </div>
            </div>
            <!-- ISI HALAMAN -->
            
            
            
            
            
            
            
            
            <!--  <div class="buy-now">
                <a href="#" target="_blank" class="btn btn-danger btn-buy-now">Walkthrough</a>
            </div> -->
            
            
            
            <!-- DataTables -->
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script>
                new DataTable('#example');
            </script>
            <!-- DataTables -->
            
            
            
            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="assets/vendor/libs/jquery/jquery.js"></script>
            <script src="assets/vendor/libs/popper/popper.js"></script>
            <script src="assets/vendor/js/bootstrap.js"></script>
            <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            
            <script src="assets/vendor/js/menu.js"></script>
            <!-- endbuild -->
            
            <!-- Vendors JS -->
            <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
            
            <!-- Main JS -->
            <script src="assets/js/main.js"></script>
            
            <!-- Page JS -->
            <script src="assets/js/dashboards-analytics.js"></script>
            
            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
        </body>
        
        </html>