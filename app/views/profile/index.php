<!DOCTYPE html>
<html>

<head>
    <title>Profil Saya</title>

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

                    <?php if($_SESSION['role']=="admin"){ ?>
                    <i class="bi bi-person-workspace me-2"></i>
                    <?php }else{ ?>
                    <i class="bi bi-person me-2"></i>
                    <?php } ?>

                    <?= $_SESSION['nama']; ?>

                </div>

            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mt-4 mb-5">

            <div class="card-body p-4">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h3 class="fw-bold">
                            <?= $_SESSION['nama']; ?>
                        </h3>

                        <p class="text-muted mb-2">

                            Role :
                            <span class="badge <?= $_SESSION['role']=="admin" ? "bg-warning text-dark" : "bg-info"; ?>">

                                <?= ucfirst($_SESSION['role']); ?>

                            </span>

                        </p>

                        <p class="text-muted mb-0">
                            Kelola seluruh laporan yang pernah Anda buat.
                        </p>

                    </div>

                    <div class="col-md-4 text-center">

                        <i class="bi bi-person-circle text-info" style="font-size:120px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold text-info">

                Laporan Saya

            </h3>

            <a href="index.php?aksi=tambah" class="btn btn-success">

                <i class="bi bi-plus-circle"></i>

                Tambah Laporan

            </a>

        </div>

        <div class="row g-4">

            <?php while($row=mysqli_fetch_assoc($laporan)){ ?>

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

                        <h6 class="fw-bold">
                            <?= $row['nama_barang']; ?>
                        </h6>

                        <p class="text-muted mb-2">
                            <?= $row['nama_kategori']; ?>
                        </p>

                        <span
                            class="badge <?= $row['jenis_laporan']=="kehilangan" ? "bg-danger" : "bg-success"; ?> mb-2">

                            <?= ucfirst($row['jenis_laporan']); ?>

                        </span>

                        <p class="mb-3">

                            <i class="bi bi-geo-alt-fill text-danger"></i>

                            <?= $row['lokasi']; ?>

                        </p>

                        <div class="d-flex gap-2 mt-auto">

                            <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=profile"
                                class="btn btn-info  btn-sm flex-fill">
                                Detail
                            </a>

                            <?php if($row['status_laporan']=="aktif"){ ?>

                            <a href="index.php?aksi=edit&id=<?= $row['id_laporan']; ?>"
                                class="btn btn-warning btn-sm flex-fill">
                                Edit
                            </a>

                            <a href="index.php?aksi=hapus&id=<?= $row['id_laporan']; ?>"
                                class="btn btn-danger btn-sm flex-fill" onclick="return confirm('Hapus laporan?')">
                                Hapus
                            </a>

                            <a href="index.php?aksi=selesai&id=<?= $row['id_laporan']; ?>"
                                class="btn btn-success btn-sm flex-fill"
                                onclick="return confirm('Apakah laporan ini sudah selesai?')">
                                Selesai
                            </a>

                            <?php } ?>

                        </div>

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

</body>

</html>