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
        background: #f8f9fa;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        min-height: 100vh;
        background: #f8f9fa;
    }

    .content {
        padding: 30px;
    }

    /* Navbar */
    .navbar {
        height: 80px;
    }

    /* Search */
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

    /* Button Hover */
    .btn-outline-info {
        transition: .2s;
    }

    .btn-outline-info:hover {
        color: #fff;
    }

    .btn-info,
    .btn-warning,
    .btn-success,
    .btn-danger {
        transition: .2s;
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
        border-color: #ffc107;
        color: #ffc107;
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

    /* Card */
    .card {
        border-radius: 18px;
    }

    /* Table */
    .table th {
        white-space: nowrap;
        vertical-align: middle;
    }

    .table td {
        vertical-align: middle;
    }

    /* Image Thumbnail */
    .table img {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 8px;
    }

    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        background: #f8f9fa;
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

                <a href="index.php?aksi=admin_laporan" class="btn btn-outline-info text-start">

                    <i class="bi bi-file-earmark-text me-2"></i>

                    Laporan

                </a>

                <a href="index.php?aksi=admin_user" class="btn btn-outline-info text-start">

                    <i class="bi bi-people me-2"></i>

                    User

                </a>

                <a href="index.php?aksi=kategori" class="btn btn-info text-start">

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
                            Kelola Kategori
                        </h2>

                        <a href="index.php?aksi=kategori_tambah" class="btn btn-success">

                            <i class="bi bi-plus-circle"></i>

                            Tambah Kategori

                        </a>

                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-body">

                            <form method="GET">

                                <input type="hidden" name="aksi" value="kategori">

                                <div class="input-group">

                                    <span class="input-group-text bg-white">

                                        <i class="bi bi-search"></i>

                                    </span>

                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Cari kategori...">

                                    <button class="btn btn-info">

                                        Cari

                                    </button>

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

                                            <th width="80">
                                                No
                                            </th>

                                            <th>
                                                Nama Kategori
                                            </th>

                                            <th width="150">
                                                Aksi
                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php
                            $no = 1;
                            while($row=mysqli_fetch_assoc($kategori)){
                            ?>

                                        <tr>

                                            <td>

                                                <?= $no++; ?>

                                            </td>

                                            <td class="fw-semibold">

                                                <i class="bi bi-tag-fill text-info me-2"></i>

                                                <?= $row['nama_kategori']; ?>

                                            </td>

                                            <td>

                                                <a href="index.php?aksi=kategori_edit&id=<?= $row['id_kategori']; ?>"
                                                    class="btn btn-warning btn-sm">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <a href="index.php?aksi=kategori_hapus&id=<?= $row['id_kategori']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus kategori ini?')">

                                                    <i class="bi bi-trash"></i>

                                                </a>

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