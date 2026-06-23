<?php

    session_start();

    if (! isset($_SESSION['id_user'])) {
    header("Location: ../app/views/auth/login.php");
    exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Dashboard Lost & Found PCR
        </div>

        <div class="card-body">

            <h4>
                Selamat Datang,
                <?php echo $_SESSION['nama']; ?>
            </h4>

            <p>
                Role :
                <?php echo $_SESSION['role']; ?>
            </p>

            <hr>

            <a
            href="../app/views/profile/index.php"
            class="btn btn-success">

                Profil Saya

            </a>

            <a
            href="../app/views/laporan/index.php"
            class="btn btn-primary">

                Daftar Laporan

            </a>

            <a
            href="logout.php"
            class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

</div>

</body>
</html>