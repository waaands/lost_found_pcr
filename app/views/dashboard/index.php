<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Lost & Found PCR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/user.css">
</head>

<body class="bg-light" style="font-family:'Poppins',sans-serif;">
    <div class="container py-5">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="fw-bold text-info mb-0">
                        Lost & Found PCR
                    </h4>
                </div>
                <div class="col-auto">
                    <?php if(isset($_SESSION['id_user'])) { ?>
                    <?php if($_SESSION['role']=="admin"){ ?>
                    <i class="bi bi-person-workspace me-2"></i>
                    <?php } else { ?>
                    <i class="bi bi-person me-2"></i>
                    <?php } ?>
                    <?= $_SESSION['nama']; ?>
                    <?php } else { ?>
                    <a href="index.php?aksi=login" class="btn btn-info ">
                        Login
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4 mt-4">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <?php if(!isset($_SESSION['id_user'])) { ?>
                        <h2 class="text-muted">
                            Selamat Datang
                        </h2>
                        <p class="text-muted mb-3">
                            Sistem Informasi Barang Hilang dan Ditemukan
                            Politeknik Caltex Riau.
                        </p>
                        <?php } else { ?>
                        <h2 class="text-muted">
                            Selamat Datang,
                            <?= $_SESSION['nama']; ?>
                        </h2>
                        <p class="text-muted mb-3">
                            Sistem Informasi Barang Hilang dan Ditemukan
                            Politeknik Caltex Riau.
                        </p>
                        <?php if($_SESSION['role'] == "admin") { ?>
                        <span class="badge bg-warning">
                            Admin
                        </span>
                        <?php } else { ?>
                        <span class="badge bg-info">
                            Mahasiswa
                        </span>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="public/assets/images/hero.png" class="img-fluid" style="max-height:260px;">
                    </div>
                </div>
            </div>
        </div>

        <h4 class="fw-bold text-info mt-5">
            Quick Action
        </h4>
        <div class="row g-4">

            <?php if(!isset($_SESSION['id_user'])) { ?>

            <!-- Guest -->

            <div class="col-md-6">
                <a href="index.php?aksi=laporan" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-card-list display-4 text-info"></i>
                            <h5 class="mt-3 text-muted">Lihat Laporan</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="index.php?aksi=login" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-box-arrow-in-right display-4 text-info"></i>
                            <h5 class="mt-3 text-muted">Login</h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php } elseif($_SESSION['role'] == "admin") { ?>

            <!-- Admin -->

            <div class="col-md-6">
                <a href="index.php?aksi=admin" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-person-workspace display-4 text-info"></i>
                            <h5 class="mt-3 text-muted">Panel Admin</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="index.php?aksi=logout" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-box-arrow-right display-4 text-info"></i>
                            <h5 class="mt-3 text-muted">Logout</h5>
                        </div>
                    </div>
                </a>
            </div>

            <?php } else { ?>

            <!-- Mahasiswa -->

            <div class="col-md-3">
                <a href="index.php?aksi=profile" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-person-circle display-4 text-info"></i>
                            <h5 class="text-muted mt-3">Profil Saya</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?aksi=laporan" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-card-list display-4 text-info"></i>
                            <h5 class="text-muted mt-3">Daftar Laporan</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?aksi=tambah" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-plus-circle display-4 text-info"></i>
                            <h5 class="text-muted mt-3">Buat Laporan</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?aksi=logout" class="text-decoration-none text-dark">
                    <div class="card action-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-box-arrow-right display-4 text-info"></i>
                            <h5 class="text-muted mt-3">Logout</h5>
                        </div>
                    </div>
                </a>
            </div>

            <?php } ?>

        </div>

        <?php if(isset($_SESSION['id_user'])) { ?>
        <h4 class="fw-bold text-info mt-5 mb-4">
            Statistik
        </h4>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card bg-primary-subtle border-0 shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">
                            Laporan Aktif
                        </h6>
                        <h1 class="fw-bold text-info">
                            <?= $statistik['aktif']; ?>
                        </h1>
                        <small class="text-muted">
                            Status Aktif
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger-subtle border-0 shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">
                            Laporan Kehilangan
                        </h6>
                        <h1 class="fw-bold text-info">
                            <?= $statistik['kehilangan']; ?>
                        </h1>
                        <small class="text-muted">
                            Barang Hilang
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success-subtle border-0 shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">
                            Laporan Penemuan
                        </h6>
                        <h1 class="fw-bold text-info">
                            <?= $statistik['penemuan']; ?>
                        </h1>
                        <small class="text-muted">
                            Barang Ditemukan
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning-subtle border-0 shadow-sm rounded-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">
                            Barang di BAAK
                        </h6>
                        <h1 class="fw-bold text-info">
                            <?= $statistik['baak']; ?>
                        </h1>
                        <small class="text-muted">
                            Barang di BAAK
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <h4 class="fw-bold text-info mt-5 mb-4">
            Laporan Terbaru
        </h4>
        <div class="row g-4">

            <?php while($row=mysqli_fetch_assoc($laporanTerbaru)){ ?>
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <?php if($row['foto_barang']!=""){ ?>

                    <img src="public/uploads/barang/<?= $row['foto_barang']; ?>" class="card-img-top rounded-top-4"
                        style="height:200px;object-fit:cover;">

                    <?php }else{ ?>

                    <img src="public/assets/image/no-image.png" class="card-img-top rounded-top-4"
                        style="height:200px;object-fit:cover;">

                    <?php } ?>

                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <?php
                if($row['status_laporan']=="aktif"){
                    $badge="bg-primary";
                    $status="Aktif";
                }elseif($row['status_laporan']=="baak"){
                    $badge="bg-warning text-dark";
                    $status="Di BAAK";
                }else{
                    $badge="bg-success";
                    $status="Selesai";
                }
                ?>

                            <span class="badge <?= $badge; ?>">
                                <?= $status; ?>
                            </span>

                            <small class="text-muted">
                                <?= date('d M Y',strtotime($row['tanggal_kejadian'])); ?>
                            </small>

                        </div>

                        <h6 class="fw-bold mb-2">
                            <?= $row['nama_barang']; ?>
                        </h6>

                        <p class="text-muted mb-2">
                            <?= $row['nama_kategori']; ?>
                        </p>

                        <p class="mb-2">

                            <span
                                class="badge <?= $row['jenis_laporan']=="kehilangan" ? "bg-danger" : "bg-success"; ?>">

                                <?= ucfirst($row['jenis_laporan']); ?>

                            </span>

                        </p>

                        <p class="mb-1">

                            <i class="bi bi-geo-alt-fill text-danger"></i>

                            <?= $row['lokasi']; ?>

                        </p>

                        <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=dashboard"
                            class="btn btn-info  btn-sm flex-fill">

                            Detail

                        </a>

                    </div>

                </div>

            </div>
            <?php } ?>

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
    </div>
</body>

</html>