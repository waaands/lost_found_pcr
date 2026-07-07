<!DOCTYPE html>
<html>

<head>
    <title>Edit Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="public/assets/css/admin.css">
    
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
                    <a href="index.php?aksi=login" class="btn btn-info text-white">
                        Login
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4 mt-4 mb-5">

            <div class="card-header bg-white border-0 fw-bold text-info">
                Edit Laporan
            </div>

            <div class="card-body p-4">

                <form action="index.php?aksi=admin_update_laporan" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="from" value="<?= $_GET['from'] ?? 'admin_laporan'; ?>">
                    <input type="hidden" name="id_laporan" value="<?= $laporan['id_laporan']; ?>">
                    <input type="hidden" name="foto_lama" value="<?= $laporan['foto_barang']; ?>">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Laporan</label>
                            <select name="jenis_laporan" class="form-select">

                                <option value="kehilangan"
                                    <?= $laporan['jenis_laporan']=="kehilangan" ? "selected" : ""; ?>>

                                    Kehilangan

                                </option>

                                <option value="penemuan"
                                    <?= $laporan['jenis_laporan']=="penemuan" ? "selected" : ""; ?>>

                                    Penemuan

                                </option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>

                            <select name="id_kategori" class="form-select">

                                <?php while($row=mysqli_fetch_assoc($kategori)){ ?>

                                <option value="<?= $row['id_kategori']; ?>"
                                    <?= $laporan['id_kategori']==$row['id_kategori'] ? "selected" : ""; ?>>

                                    <?= $row['nama_kategori']; ?>

                                </option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Nama Barang
                            </label>

                            <input type="text" name="nama_barang" class="form-control"
                                value="<?= $laporan['nama_barang']; ?>" required>

                        </div>

                        <div class="col-12 mb-4">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="5"
                                class="form-control"><?= $laporan['deskripsi']; ?></textarea>

                        </div>

                        <div class="col-md-3">

                            <label class="form-label">
                                Foto Saat Ini
                            </label>

                            <?php if($laporan['foto_barang']!=""){ ?>

                            <img src="public/uploads/barang/<?= $laporan['foto_barang']; ?>"
                                class="img-thumbnail rounded-4 w-100" style="height:170px;object-fit:cover;">

                            <?php }else{ ?>

                            <img src="public/assets/image/no-image.png" class="img-thumbnail rounded-4 w-100"
                                style="height:170px;object-fit:cover;">

                            <?php } ?>

                        </div>

                        <div class="col-md-9">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Lokasi
                                    </label>

                                    <input type="text" name="lokasi" class="form-control"
                                        value="<?= $laporan['lokasi']; ?>">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Tanggal Kejadian
                                    </label>

                                    <input type="date" name="tanggal_kejadian" class="form-control"
                                        value="<?= $laporan['tanggal_kejadian']; ?>">

                                </div>

                                <div class="col-12">

                                    <label class="form-label">
                                        Ganti Foto
                                    </label>

                                    <input type="file" name="foto_barang" class="form-control">

                                </div>

                            </div>

                        </div>

                        <div class="col-12 mt-4 d-flex gap-2">

                            <button type="submit" name="update" class="btn btn-warning-custom">

                                <i class="bi bi-pencil-square"></i>

                                Update

                            </button>

                            <a href="index.php?aksi=admin_laporan" class="btn btn-outline-info">

                                <i class="bi bi-arrow-left"></i>

                                Kembali

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>