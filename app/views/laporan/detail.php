<!DOCTYPE html>
<html>

<head>
    <title>Detail Laporan</title>

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

            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-5">

                        <?php if($data['foto_barang']){ ?>

                        <img src="public/uploads/barang/<?= $data['foto_barang']; ?>"
                            class="img-fluid rounded-4 shadow-sm w-100">

                        <?php }else{ ?>

                        <img src="public/assets/image/no-image.png" class="img-fluid rounded-4 shadow-sm w-100">

                        <?php } ?>

                    </div>

                    <div class="col-md-7">

                        <h2 class="fw-bold mb-3">

                            <?= $data['nama_barang']; ?>

                        </h2>

                        <?php

                        if($data['status_laporan']=="aktif"){
                            $badge="bg-primary";
                            $status="Aktif";
                        }elseif($data['status_laporan']=="baak"){
                            $badge="bg-warning text-dark";
                            $status="Di BAAK";
                        }else{
                            $badge="bg-success";
                            $status="Selesai";
                        }

                        ?>

                        <span class="badge <?= $badge ?> mb-3">

                            <?= $status ?>

                        </span>

                        <p>

                            <b>Kategori</b>

                            <br>

                            <?= $data['nama_kategori']; ?>

                        </p>

                        <p>

                            <b>Pelapor</b>

                            <br>

                            <?= $data['nama_lengkap']; ?>

                        </p>

                        <p>

                            <b>Jenis Laporan</b>

                            <br>

                            <?= ucfirst($data['jenis_laporan']); ?>

                        </p>

                        <p>

                            <b>Lokasi</b>

                            <br>

                            <i class="bi bi-geo-alt-fill text-danger"></i>

                            <?= $data['lokasi']; ?>

                        </p>

                        <p>

                            <b>Tanggal Kejadian</b>

                            <br>

                            <?= date('d M Y',strtotime($data['tanggal_kejadian'])); ?>

                        </p>

                        <p>

                            <b>Deskripsi</b>

                            <br>

                            <?= nl2br($data['deskripsi']); ?>

                        </p>

                        <?php if($data['status_laporan']=="baak"){ ?>

                        <div class="alert alert-warning rounded-4">

                            <b>Barang berada di BAAK.</b>

                            <br>

                            Silakan datang ke BAAK Politeknik Caltex Riau untuk mengambil barang.

                        </div>

                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

        <div class="card border-0 shadow-sm rounded-4 mt-4">

            <div class="card-body p-4">

                <h4 class="fw-bold text-info mb-4">

                    Komentar

                </h4>

                <?php if(isset($_SESSION['id_user'])){ ?>

                <form action="index.php?aksi=komentar" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="from" value="<?= $_GET['from'] ?? 'laporan'; ?>">
                    <input type="hidden" name="id_laporan" value="<?= $data['id_laporan']; ?>">
                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                    <div class="mb-3">

                        <textarea name="isi_komentar" class="form-control rounded-3" rows="4"
                            placeholder="Tulis komentar..." required></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Foto Bukti (Opsional)

                        </label>

                        <input type="file" name="foto_bukti" class="form-control rounded-3">

                    </div>

                    <button type="submit" name="kirim" class="btn btn-info">

                        Kirim Komentar

                    </button>

                </form>

                <?php }else{ ?>

                <div class="alert alert-warning rounded-4">

                    Silakan login terlebih dahulu untuk memberikan komentar.

                </div>

                <a href="index.php?aksi=login" class="btn btn-info text-white">

                    Login

                </a>

                <?php } ?>

                <hr class="my-4">

                <?php while($row=mysqli_fetch_assoc($komentar)){ ?>

                <div class="card border-0 bg-light rounded-4 shadow-sm mb-3">

                    <div class="card-body">

                        <h6 class="fw-bold mb-2">

                            <i class="bi bi-person-circle text-info me-2"></i>

                            <?= $row['nama_lengkap']; ?>

                        </h6>

                        <p class="mb-3">

                            <?= nl2br($row['isi_komentar']); ?>

                        </p>

                        <?php if($row['foto_bukti']!=""){ ?>

                        <img src="public/uploads/bukti/<?= $row['foto_bukti']; ?>" class="img-fluid rounded-3"
                            style="max-width:250px;">

                        <?php } ?>

                    </div>

                </div>

                <?php } ?>
                <?php

                $from = $_GET['from'] ?? 'laporan';

                switch($from){

                    case 'profile':
                        $link = 'profile';
                        break;

                    case 'dashboard':
                        $link = 'dashboard';
                        break;

                    case 'admin_laporan':
                        $link = 'admin_laporan';
                        break;

                    default:
                        $link = 'laporan';
                        break;
                }

                ?>

                <div class="d-flex justify-content-between align-items-center mt-4">

                    <a href="index.php?aksi=<?= $link; ?>" class="btn btn-outline-info">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>
            </div>

        </div>


    </div>

</body>

</html>