    <!DOCTYPE html>
    <html>

    <head>
        <title>Tambah Laporan</title>
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
                        <a href="index.php?aksi=login" class="btn btn-info text-white">
                            Login
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4 mt-4 mb-5">

                <div class="card-header bg-white border-0 fw-bold text-info">
                    Tambah Laporan
                </div>

                <div class="card-body p-4">

                    <form action="index.php?aksi=simpan" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Laporan</label>
                                <select name="jenis_laporan" class="form-select">
                                    <option value="kehilangan">Kehilangan</option>
                                    <option value="penemuan">Penemuan</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="id_kategori" class="form-select">
                                    <?php while($row=mysqli_fetch_assoc($kategori)){ ?>
                                    <option value="<?= $row['id_kategori']; ?>">
                                        <?= $row['nama_kategori']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Kejadian</label>
                                <input type="date" name="tanggal_kejadian" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Foto Barang</label>
                                <input type="file" name="foto_barang" class="form-control">
                            </div>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" name="simpan" class="btn btn-success-custom">

                                <i class="bi bi-check-circle"></i>

                                Simpan

                            </button>

                            <a href="index.php?aksi=profile" class="btn btn-outline-info">

                                <i class="bi bi-arrow-left"></i>

                                Kembali

                            </a>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </body>

    </html>