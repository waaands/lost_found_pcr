<!DOCTYPE html>
<html>

<head>

    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .btn-outline-info:hover{
            color:#fff !important;
            background:#0dcaf0;
            border-color:#0dcaf0;
        }
    </style>

</head>

<body class="bg-light" style="font-family:'Poppins',sans-serif;">

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold text-info">Lost & Found PCR</h2>
        <p class="text-muted">Sistem Informasi Barang Hilang dan Ditemukan</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mx-auto" style="max-width:500px;">

        <div class="card-body p-5">

            <h3 class="fw-bold text-info text-center mb-4">Register</h3>

            <form action="index.php?aksi=prosesRegister" method="POST">

                <div class="mb-3">
                    <label class="form-label text-muted">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" name="register" class="btn btn-info text-white w-100">
                    Register
                </button>

            </form>

            <div class="text-center text-muted mt-4">
                Sudah punya akun?
                <a href="index.php?aksi=login" class="text-decoration-none">Login</a>
            </div>

            <div class="text-center mt-3">
                <a href="index.php?aksi=dashboard" class="btn btn-outline-info btn-sm">
                    Kembali ke Dashboard
                </a>
            </div>

        </div>

    </div>

</div>

</body>

</html>