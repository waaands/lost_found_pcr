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

                <a href="index.php?aksi=admin" class="btn btn-info text-start"">

                    <i class=" bi bi-speedometer2 me-2"></i>

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

                    <h2 class="fw-bold text-info mb-4">
                        Dashboard Admin
                    </h2>

                    <div class="row g-4 mb-4">

                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm rounded-4 bg-info-subtle">

                                <div class="card-body text-center py-4">

                                    <i class="bi bi-file-earmark-text fs-2 text-info"></i>

                                    <h6 class="text-muted mt-3 mb-2">
                                        Total Laporan
                                    </h6>

                                    <h2 class="fw-bold text-info">
                                        <?= $statistik['total_laporan']; ?>
                                    </h2>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm rounded-4 bg-success-subtle">

                                <div class="card-body text-center py-4">

                                    <i class="bi bi-people fs-2 text-success"></i>

                                    <h6 class="text-muted mt-3 mb-2">
                                        Total User
                                    </h6>

                                    <h2 class="fw-bold text-success">
                                        <?= $statistik['total_user']; ?>
                                    </h2>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm rounded-4 bg-warning-subtle">

                                <div class="card-body text-center py-4">

                                    <i class="bi bi-tags fs-2 text-warning"></i>

                                    <h6 class="text-muted mt-3 mb-2">
                                        Total Kategori
                                    </h6>

                                    <h2 class="fw-bold text-warning">
                                        <?= $statistik['total_kategori']; ?>
                                    </h2>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm rounded-4 bg-danger-subtle">

                                <div class="card-body text-center py-4">

                                    <i class="bi bi-box-seam fs-2 text-danger"></i>

                                    <h6 class="text-muted mt-3 mb-2">
                                        Barang di BAAK
                                    </h6>

                                    <h2 class="fw-bold text-danger">
                                        <?= $statistik['barang_baak']; ?>
                                    </h2>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row g-4">

                        <div class="col-lg-6">

                            <div class="card border-0 shadow-sm rounded-4">

                                <div
                                    class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">

                                    <h5 class="fw-bold mb-0">

                                        <i class="bi bi-clock-history text-info me-2"></i>

                                        Laporan Terbaru

                                    </h5>

                                </div>

                                <div class="list-group list-group-flush">

                                    <?php while($row=mysqli_fetch_assoc($laporanTerbaru)){ ?>

                                    <div class="list-group-item border-0">

                                        <div class="d-flex align-items-center">

                                            <?php if($row['foto_barang']!=""){ ?>

                                            <img src="public/uploads/barang/<?= $row['foto_barang']; ?>"
                                                class="rounded me-3" style="width:60px;height:60px;object-fit:cover;">

                                            <?php }else{ ?>

                                            <img src="public/assets/image/no-image.png" class="rounded me-3"
                                                style="width:60px;height:60px;object-fit:cover;">

                                            <?php } ?>

                                            <div class="flex-grow-1">

                                                <div class="fw-semibold">

                                                    <?= $row['nama_barang']; ?>

                                                </div>

                                                <small class="text-muted">

                                                    <?= ucfirst($row['status_laporan']); ?>

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card border-0 shadow-sm rounded-4">

                                <div
                                    class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">

                                    <h5 class="fw-bold mb-0">

                                        <i class="bi bi-person-plus text-success me-2"></i>

                                        User Terbaru

                                    </h5>

                                </div>

                                <div class="list-group list-group-flush">

                                    <?php while($row=mysqli_fetch_assoc($userTerbaru)){ ?>

                                    <div class="list-group-item border-0">

                                        <div class="d-flex align-items-center">

                                            <div class="bg-info rounded-circle d-flex justify-content-center align-items-center me-3"
                                                style="width:55px;height:55px;">

                                                <i class="bi bi-person-fill text-white"></i>

                                            </div>

                                            <div>

                                                <div class="fw-semibold">

                                                    <?= $row['nama_lengkap']; ?>

                                                </div>

                                                <small class="text-muted">

                                                    <?= ucfirst($row['role']); ?>

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                    <?php } ?>

                                </div>

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