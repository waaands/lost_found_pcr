<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Lost & Found PCR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Dashboard Lost & Found PCR
        </div>

        <div class="card-body">

    <?php if(isset($_SESSION['id_user'])) { ?>

        <h4>
            Selamat Datang,
            <?= $_SESSION['nama']; ?>
        </h4>

        <p>
            Role :
            <?= $_SESSION['role']; ?>
        </p>

        <hr>

        <a
        href="index.php?aksi=profile"
        class="btn btn-success">
            Profil Saya
        </a>

        <a
        href="index.php?aksi=laporan"
        class="btn btn-primary">
            Daftar Laporan
        </a>

        <?php if($_SESSION['role'] == "admin") { ?>

            <a
            href="index.php?aksi=admin"
            class="btn btn-warning">
                Panel Admin
            </a>

        <?php } ?>

        <a
        href="index.php?aksi=logout"
        class="btn btn-danger">
            Logout
        </a>

        <?php } else { ?>

            <h4>
                Selamat Datang di Lost & Found PCR
            </h4>

            <p>
                Sistem informasi pelaporan barang hilang dan ditemukan
                di lingkungan Politeknik Caltex Riau.
            </p>

            <hr>

            <a
            href="index.php?aksi=login"
            class="btn btn-primary">

                Login

            </a>

            <a
            href="index.php?aksi=laporan"
            class="btn btn-success">

                Lihat Laporan

            </a>

        <?php } ?>

        </div>

    </div>

</div>

</body>
</html>