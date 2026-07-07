<!DOCTYPE html>
<html>

<head>
    <title>Daftar Laporan</title>
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
                    <a href="index.php?aksi=dashboard" class="text-decoration-none">
                        <h4 class="fw-bold text-info mb-0">
                            Lost & Found PCR
                        </h4>
                    </a>
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
                    <a href="index.php?aksi=login" class="btn btn-info">
                        Login
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4 mt-1">
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

        <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body">
                <form action="index.php" method="GET">
                    <input type="hidden" name="aksi" value="laporan">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control"
                                    placeholder="Cari nama barang...">
                                <button class="btn btn-info" type="submit">
                                    Cari
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8 text-lg-end">
                            <a href="index.php?aksi=laporan" class="btn btn-outline-info btn-filter">
                                Semua
                            </a>
                            <a href="index.php?aksi=laporan&jenis=kehilangan" class="btn btn-outline-danger">
                                Kehilangan
                            </a>
                            <a href="index.php?aksi=laporan&jenis=penemuan" class="btn btn-outline-success">
                                Penemuan
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-info">
                Daftar Laporan
            </h3>
        </div>
        <div class="row g-4">
            <?php while($row = mysqli_fetch_assoc($laporan)){ ?>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <?php if($row['foto_barang'] != ""){ ?>
                    <img src="public/uploads/barang/<?= $row['foto_barang']; ?>" class="card-img-top rounded-top-4"
                        style="height:200px; object-fit:cover;">
                    <?php }else{ ?>
                    <img src="public/assets/image/no-image.png" class="card-img-top rounded-top-4"
                        style="height:150px; object-fit:cover;">
                    <?php } ?>
                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <?php
                            if($row['status_laporan']=="aktif"){
                                $badge = "bg-primary";
                                $status = "Aktif";
                            }elseif($row['status_laporan']=="baak"){
                                $badge = "bg-warning text-dark";
                                $status = "Di BAAK";
                            }else{
                                $badge = "bg-success";
                                $status = "Selesai";
                            }
                            ?>

                            <span class="badge <?= $badge; ?>">
                                <?= $status; ?>
                            </span>

                            <small class="text-muted">
                                <?= $row['tanggal_kejadian']; ?>
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

                        <p class="text-muted mb-3">
                            Pelapor : <?= $row['nama_lengkap']; ?>
                        </p>

                        <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=laporan"
                            class="btn btn-info  btn-sm flex-fill">
                            Detail
                        </a>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="mt-5">
            <a href="index.php?aksi=dashboard" class="btn btn-outline-info">
                Kembali Dashboard
            </a>
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
</body>

</html>