<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kategori</title>

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
        background: #f8f9fa;
    }

    .btn-success-custom {
        background: #198754;
        border: 1px solid #198754;
        color: #fff;
        transition: .2s;
    }

    .btn-success-custom:hover {
        background: #fff;
        border-color: #198754;
        color: #198754;
    }

    .btn-outline-info {
        transition: .2s;
    }

    .btn-outline-info:hover {
        color: #fff;
    }
    </style>

</head>

<body>

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

                Tambah Kategori

            </div>

            <div class="card-body p-4">

                <form action="index.php?aksi=kategori_simpan" method="POST">

                    <div class="mb-4">

                        <label class="form-label">

                            Nama Kategori

                        </label>

                        <input type="text" name="nama_kategori" class="form-control"
                            placeholder="Masukkan nama kategori" required>

                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit" name="simpan" class="btn btn-success-custom">

                            <i class="bi bi-check-circle"></i>

                            Simpan

                        </button>

                        <a href="index.php?aksi=kategori" class="btn btn-outline-info">

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