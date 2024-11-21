<?php
require_once('controller/koneksi.php');
session_start();

$query_getActivePeriode = mysqli_query($conn, "SELECT * FROM kepengurusan WHERE status = 'active' LIMIT 1");
if ($query_getActivePeriode) {
    $rowActivePeriode = mysqli_fetch_array($query_getActivePeriode);
    $active_periode_id = $rowActivePeriode['kepengurusan_id'];
} else {
    $active_periode_id = null;
}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        
        // Tentukan pesan berdasarkan status
        if ($status == 'success') {
            $title = "Berhasil!";
            $message = "Operasi berhasil dilakukan.";
            $icon = "success";
        } elseif ($status == 'failed') {
            $title = "Gagal!";
            $message = "Operasi gagal dilakukan.";
            $icon = "error";
        } else {
            $title = "Informasi!";
            $message = "Tidak ada status yang dikenali.";
            $icon = "info";
        }
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "<?php echo $title; ?>",
                    text: "<?php echo $message; ?>",
                    icon: "<?php echo $icon; ?>",
                    confirmButtonText: "OK"
                }).then(() => {
                    // Hapus parameter status dari URL
                    const url = new URL(window.location.href);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                });
            });
        </script>
        <?php
    }
    ?>
    
    
    <!-- LAYOUT WRAPPER -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <!-- SIDEBAR -->
            <?php include 'component/sidebar.php'; ?>
            <!-- /SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="layout-page">
                
                <!-- NAVBAR -->
                <?php include 'component/topbar.php'; ?>
                <!-- /NAVBAR -->
                
                <!-- CONTENT WRAPPER -->
                <div class="content-wrapper">
                    
                    <!-- SECTION: MANAGE PERIODE -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- HEADER -->
                        <div class="card my-2">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="fw-bold my-2">MANAGE PERIODE</h4>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h4 class="fw-bold my-2">
                                            <span class="text-muted fw-light">Kepengurusan /</span> Periode
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /HEADER -->
                        
                        <!-- TABLE -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        
                                    </div>
                                    <div class="col-6 text-end">
                                        <button data-bs-toggle="modal" data-bs-target="#ModalTambahPeriode"
                                        class="btn btn-primary">
                                        Tambah Periode <i class='bx bx-plus'></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered display py-4" id="example" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $queryPeriode = mysqli_query($conn, "SELECT * FROM kepengurusan WHERE deleted_at IS NULL;");
                                    while ($rowPeriode = mysqli_fetch_array($queryPeriode)) {
                                        ?>
                                        <tr id="periodeid-">
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <span class="badge bg-label-primary me-1">
                                                    <?php echo $rowPeriode['periode'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if ($rowPeriode['status'] != null || $rowPeriode['status'] != '') { ?>
                                                    <span class="badge bg-label-success me-1">
                                                        <?php echo $rowPeriode['status'] ?>
                                                    </span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $tahunArray = explode('-', $rowPeriode['periode']);
                                                    ?>
                                                    <button data-bs-toggle="modal" data-bs-target="#ModalEditPeriode"
                                                    onclick="editPeriode('<?php echo $rowPeriode['kepengurusan_id'] ?>','<?php echo $tahunArray[0]; ?>','<?php echo $tahunArray[1]; ?>')"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="menu-icon tf-icons bx bx-pencil"></i>
                                                </button>
                                                <button
                                                onclick="deletePeriode('<?php echo $rowPeriode['kepengurusan_id'] ?>','<?php echo $rowPeriode['periode'] ?>')"
                                                class="btn btn-sm btn-danger">
                                                <i class="menu-icon tf-icons bx bx-trash"></i>
                                            </button>
                                            <?php if ($rowPeriode['status'] == null || $rowPeriode['status'] == '') { ?>
                                                <button
                                                onclick="setActivePeriode('<?php echo $rowPeriode['kepengurusan_id'] ?>', '<?php echo $rowPeriode['periode'] ?>')"
                                                class="btn btn-sm btn-primary">
                                                Set Active<i class="menu-icon tf-icons bx bx-play"></i>
                                            </button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /TABLE -->
            </div>
            
            <!-- MODAL TAMBAH PERIODE -->
            <div class="modal fade" id="ModalTambahPeriode" data-bs-backdrop="static" tabindex="-1"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="formPeriode" action="controller/periode/add_periode.php"
                method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Tambah Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="periodeAwal" class="form-label">Periode Awal</label>
                            <input type="number" id="periodeAwal" name="periode_awal"
                            class="form-control" placeholder="Masukkan Periode Awal (2023)"
                            required>
                        </div>
                        <div class="col-6">
                            <label for="periodeAkhir" class="form-label">Periode Akhir</label>
                            <input type="number" id="periodeAkhir" name="periode_akhir"
                            class="form-control" placeholder="Masukkan Periode Akhir (2024)"
                            required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <!-- MODAL TAMBAH PERIODE -->
    
    <!-- MODAL EDIT PERIODE -->
    <div class="modal fade" id="ModalEditPeriode" data-bs-backdrop="static" tabindex="-1"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="formPeriode" action="controller/periode/edit_periode.php"
        method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="backDropModalTitle">Tambah Periode</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <hr>
        <div class="modal-body">
            <input type="hidden" name="id" id="EditperiodeID" value="">
            <div class="row">
                <div class="col-6">
                    <label for="periodeAwal" class="form-label">Periode Awal</label>
                    <input type="number" id="EditperiodeAwal" name="periode_awal"
                    class="form-control" placeholder="Masukkan Periode Awal (2023)"
                    required>
                </div>
                <div class="col-6">
                    <label for="periodeAkhir" class="form-label">Periode Akhir</label>
                    <input type="number" id="EditperiodeAkhir" name="periode_akhir"
                    class="form-control" placeholder="Masukkan Periode Akhir (2024)"
                    required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
</div>
<!-- MODAL EDIT PERIODE -->

<script>
    function editPeriode(id, awal, akhir) {
        var EditperiodeAwal = document.getElementById('EditperiodeAwal');
        var EditperiodeAkhir = document.getElementById('EditperiodeAkhir');
        var EditperiodeID = document.getElementById('EditperiodeID');
        
        EditperiodeID.value = id;
        EditperiodeAwal.value = awal;
        EditperiodeAkhir.value = akhir;
    }
    
    function deletePeriode(id, tahun) {
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: `Hapus periode ${tahun}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `controller/periode/delete_periode.php?id=${id}`;
            }
        });
    }
    
    function setActivePeriode(id, tahun) {
        Swal.fire({
            title: 'Konfirmasi Pengaktifan',
            text: `Aktifkan periode ${tahun}?`,
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Aktifkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `controller/periode/set_active.php?id=${id}`;
            }
        });
    }
</script>
<!-- /SECTION: MANAGE PERIODE -->

<!-- /SECTION: MANAGE PERIODE -->
<!-- /SECTION: MANAGE PERIODE -->


<!-- SECTION: MANAGE KEPENGURUSAN -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- HEADER -->
    <div class="card my-2">
        <div class="card-body py-2">
            <div class="row">
                <div class="col-6">
                    <h4 class="fw-bold my-2">MANAGE KEPENGURUSAN</h4>
                </div>
                <div class="col-6 text-end">
                    <h4 class="fw-bold my-2">
                        <span class="text-muted fw-light">Kepengurusan /</span> All
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    
    <!-- TABLE -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <select id="defaultSelect" class="form-select w-50">
                        <?php $queryPeriode2 = mysqli_query($conn, "SELECT * FROM kepengurusan;");
                        while ($rowPeriode2 = mysqli_fetch_array($queryPeriode2)) { ?>
                            <option>Periode
                                <?php echo $rowPeriode2['periode'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-6 text-end">
                        <button data-bs-toggle="modal" data-bs-target="#ModalTambah"
                        class="btn btn-primary">
                        Tambah Pengurus <i class='bx bx-plus'></i>
                    </button>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered display py-4" id="example" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="1">
                        <td>1</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#ModalFoto"
                            class="btn btn-sm btn-primary">
                            <i class="menu-icon tf-icons bx bx-image"></i>
                        </button>
                    </td>
                    <td id="nim_anggota">2022573010098</td>
                    <td id="nama_anggota">Muhammad Kholis</td>
                    <td>
                        <span class="badge bg-label-warning me-1">Ketua Pemrograman</span>
                    </td>
                    <td>
                        <span class="badge bg-label-primary me-1">2023-2024</span>
                    </td>
                    <td>
                        <button data-bs-toggle="modal" data-bs-target="#ModalEdit"
                        class="btn btn-sm btn-warning">
                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#ModalHapus"
                    onclick="hapus_pengurus('Muhammad Kholis')"
                    class="btn btn-sm btn-danger">
                    <i class="menu-icon tf-icons bx bx-trash"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
<!-- /TABLE -->
</div>
<!-- /SECTION: MANAGE KEPENGURUSAN -->

</div>
<!-- /CONTENT WRAPPER -->
</div>
<!-- /PAGE CONTENT -->
</div>
</div>
<!-- /LAYOUT WRAPPER -->

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable('#example');
</script>

<!-- Core JS -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/vendor/js/menu.js"></script>

<!-- Vendors JS -->
<script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/dashboards-analytics.js"></script>

<!-- GitHub Buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>


</html>