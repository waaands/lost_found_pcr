<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="public/assets/css/admin.css">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .main-content {
        flex: 1;
        min-height: 100vh;
        background: #f8f9fa;
    }

    .content {
        padding: 30px;
    }

    .btn-outline-info {
        transition: .2s;
    }

    .btn-outline-info:hover {
        color: #fff;
    }

    .navbar {
        height: 80px;
    }

    .input-group-text {
        border-right: none;
    }

    .input-group .form-control {
        border-left: none;
        box-shadow: none;
    }

    .input-group .form-control:focus {
        box-shadow: none;
    }

    .btn-info {
        color: #fff;
    }

    .btn-info:hover {
        background: #fff;
        border-color: #0dcaf0;
        color: #0dcaf0;
    }

    .btn-warning {
        color: #fff;
    }

    .btn-warning:hover {
        background: #fff;
        border-color: #FFC107;
        color: #FFC107;
    }

    .btn-success {
        color: #fff;
    }

    .btn-success:hover {
        background: #fff;
        border-color: #198754;
        color: #198754;
    }

    .btn-danger {
        color: #fff;
    }

    .btn-danger:hover {
        background: #fff;
        border-color: #dc3545;
        color: #dc3545;
    }

    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        background: #f8f9fa;
    }

    .btn-baak {
        background: #fd7e14;
        border: 1px solid #fd7e14;
        color: #fff;
        transition: .2s;
    }

    .btn-baak:hover {
        background: #fff;
        border-color: #fd7e14;
        color: #fd7e14;
    }
    </style>

</head>

<body class="bg-light">

    <div class="d-flex">

        <div class="bg-white border-end shadow-sm d-flex flex-column position-fixed" style="width:260px;height:100vh;">

            <!-- Logo -->
            <div class="p-4">

                <h4 class="fw-bold text-info mb-1">
                    Lost & Found PCR
                </h4>

            </div>

            <hr class="m-0">

            <!-- Menu -->
            <div class="list-group list-group-flush p-3 gap-2 flex-grow-1">

                <a href="index.php?aksi=admin" class="btn btn-outline-info text-start">

                    <i class="bi bi-speedometer2 me-2"></i>

                    Dashboard

                </a>

                <a href="index.php?aksi=admin_laporan" class="btn btn-info text-start">

                    <i class="bi bi-file-earmark-text me-2"></i>

                    Laporan

                </a>

                <a href="index.php?aksi=admin_user" class="btn btn-outline-info text-start">

                    <i class="bi bi-people me-2"></i>

                    User

                </a>

                <a href="index.php?aksi=kategori" class="btn btn-outline-info text-start">

                    <i class="bi bi-tags me-2"></i>

                    Kategori

                </a>

            </div>

            <!-- Bottom -->
            <div class="p-3 mt-auto">

                <a href="index.php?aksi=dashboard" class="btn btn-outline-info w-100 mb-2">

                    <i class="bi bi-arrow-left-circle me-2"></i>

                    Dashboard User

                </a>

                <a href="index.php?aksi=logout" class="btn btn-danger w-100">

                    <i class="bi bi-box-arrow-right me-2"></i>

                    Logout

                </a>

            </div>

        </div>

        <main class="main-content">

            <div class="flex-grow-1">

                <nav class="navbar navbar-expand-lg bg-white shadow-sm px-4 py-3">

                    <div class="ms-auto d-flex align-items-center">

                        <span class="fw-semibold text-info me-3">

                            <?= $_SESSION['nama']; ?>

                        </span>

                        <div class="bg-info rounded-circle d-flex justify-content-center align-items-center"
                            style="width:45px;height:45px;">

                            <i class="bi bi-person-fill text-white  fs-5"></i>

                        </div>

                    </div>

            </div>

            </nav>

            <!-- Content -->

            <div class="content">
                <div class="container-fluid">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h2 class="fw-bold text-info mb-0">
                            Kelola Laporan
                        </h2>

                        <a href="index.php?aksi=admin_tambah_laporan" class="btn btn-success">

                            <i class="bi bi-plus-circle"></i>

                            Tambah Laporan

                        </a>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-body">

                            <form method="GET">

                                <input type="hidden" name="aksi" value="admin_laporan">

                                <div class="input-group">

                                    <span class="input-group-text bg-white">

                                        <i class="bi bi-search"></i>

                                    </span>

                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Cari nama barang atau pelapor..."
                                        value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">

                                    <button class="btn btn-info">

                                        Cari

                                    </button>

                                    <?php if(isset($_GET['keyword']) && $_GET['keyword']!=""){ ?>

                                    <a href="index.php?aksi=admin_laporan" class="btn btn-outline-danger">

                                        <i class="bi bi-x-lg"></i>

                                    </a>

                                    <?php } ?>

                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-hover align-middle mb-0">

                                    <thead class="table-light">

                                        <tr>

                                            <th>No</th>

                                            <th>Foto</th>

                                            <th>Barang</th>

                                            <th>Pelapor</th>

                                            <th>Jenis</th>

                                            <th>Status</th>

                                            <th width="320">
                                                Aksi
                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php
                        $no = 1;
                        while($row=mysqli_fetch_assoc($laporan)){
                        ?>

                                        <tr>

                                            <td>
                                                <?= $no++; ?>
                                            </td>

                                            <td>

                                                <?php if($row['foto_barang']!=""){ ?>

                                                <img src="public/uploads/barang/<?= $row['foto_barang']; ?>"
                                                    class="rounded" style="width:55px;height:55px;object-fit:cover;">

                                                <?php }else{ ?>

                                                <img src="public/assets/image/no-image.png" class="rounded"
                                                    style="width:55px;height:55px;object-fit:cover;">

                                                <?php } ?>

                                            </td>

                                            <td>

                                                <div class="fw-semibold">

                                                    <?= $row['nama_barang']; ?>

                                                </div>

                                            </td>

                                            <td>

                                                <?= $row['nama_lengkap']; ?>

                                            </td>

                                            <td>

                                                <?php if($row['jenis_laporan']=="kehilangan"){ ?>

                                                <span class="badge bg-danger">

                                                    Kehilangan

                                                </span>

                                                <?php }else{ ?>

                                                <span class="badge bg-success">

                                                    Penemuan

                                                </span>

                                                <?php } ?>

                                            </td>

                                            <td>

                                                <?php
                                            if($row['status_laporan']=="aktif"){
                                                echo '<span class="badge bg-primary">Aktif</span>';
                                            }elseif($row['status_laporan']=="baak"){
                                                echo '<span class="badge bg-warning text-dark">BAAK</span>';
                                            }else{
                                                echo '<span class="badge bg-success">Selesai</span>';
                                            }
                                            ?>

                                            </td>

                                            <td>

                                                <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=admin_laporan"
                                                    class="btn btn-info btn-sm">

                                                    <i class="bi bi-eye"></i>

                                                </a>

                                                <a href="index.php?aksi=admin_edit_laporan&id=<?= $row['id_laporan']; ?>"
                                                    class="btn btn-warning btn-sm">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <a href="index.php?aksi=admin_hapus_laporan&id=<?= $row['id_laporan']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus laporan ini?')">

                                                    <i class="bi bi-trash"></i>

                                                </a>

                                                <?php if($row['jenis_laporan']=="penemuan"){ ?>

                                                <?php if($row['status_laporan']=="aktif"){ ?>

                                                <a href="index.php?aksi=ubah_status&id=<?= $row['id_laporan']; ?>&status=baak"
                                                    class="btn btn-baak btn-sm">

                                                    BAAK

                                                </a>

                                                <?php }elseif($row['status_laporan']=="baak"){ ?>

                                                <a href="index.php?aksi=ubah_status&id=<?= $row['id_laporan']; ?>&status=selesai"
                                                    class="btn btn-success btn-sm">

                                                    Selesai

                                                </a>

                                                <?php } ?>

                                                <?php } ?>

                                            </td>

                                        </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <footer class="mt-5 py-4 border-top">
                <div class="container">

                    <div class="row align-items-center">

                        <div class="col-md-6">
                            <h5 class="fw-bold text-info mb-1">
                                Lost & Found PCR
                            </h5> <small class="text-muted">
                                Sistem Informasi Barang Hilang dan Ditemukan<br>
                                Politeknik Caltex Riau
                            </small>
                        </div>

                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <small class="text-muted">
                                © 2026 Lost & Found PCR
                            </small>
                            <br>
                            <small class="text-muted">
                                Developed by <a href="https://github.com/waaands" target="_blank"
                                    class="text-decoration-none">Waaands</a>
                            </small>
                        </div>

                    </div>

                </div>
            </footer>
        </main>

    </div>

</body>

</html>