<!DOCTYPE html>
<html>

<head>
    <title>Detail Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Detail Laporan
        </div>

        <div class="card-body">

            <?php if($data['foto_barang']){ ?>
                <img src="public/uploads/barang/<?= $data['foto_barang']; ?>" width="300" class="mb-3">
            <?php } ?>

            <h4><?= $data['nama_barang']; ?></h4>

            <p><b>Kategori :</b> <?= $data['nama_kategori']; ?></p>
            <p><b>Pelapor :</b> <?= $data['nama_lengkap']; ?></p>
            <p><b>Jenis :</b> <?= $data['jenis_laporan']; ?></p>
            <p><b>Status :</b> <?= $data['status_laporan']; ?></p>
            <p><b>Lokasi :</b> <?= $data['lokasi']; ?></p>
            <p><b>Tanggal :</b> <?= $data['tanggal_kejadian']; ?></p>
            <p><b>Deskripsi :</b><br><?= $data['deskripsi']; ?></p>

            <hr>

            <h4>Komentar</h4>

            <?php if(isset($_SESSION['id_user'])){ ?>

            <form action="index.php?aksi=komentar" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="from" value="<?= $_GET['from'] ?? 'laporan'; ?>">
                <input type="hidden" name="id_laporan" value="<?= $data['id_laporan']; ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                <div class="mb-3">
                    <textarea name="isi_komentar" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Bukti (Opsional)</label>
                    <input type="file" name="foto_bukti" class="form-control">
                </div>

                <button type="submit" name="kirim" class="btn btn-primary">
                    Kirim Komentar
                </button>

            </form>

            <?php } else { ?>

            <div class="alert alert-warning">
                Silakan login terlebih dahulu untuk memberikan komentar.
            </div>

            <a href="index.php?aksi=login" class="btn btn-primary">
                Login
            </a>

            <?php } ?>

            <?php while($row = mysqli_fetch_assoc($komentar)){ ?>

            <div class="card mt-3">

                <div class="card-body">

                    <b><?= $row['nama_lengkap']; ?></b>

                    <br><br>

                    <?= $row['isi_komentar']; ?>

                    <?php if($row['foto_bukti'] != ""){ ?>

                        <br><br>

                        <img src="public/uploads/bukti/<?= $row['foto_bukti']; ?>" width="200" class="img-thumbnail">

                    <?php } ?>

                </div>

            </div>

            <?php } ?>

            <hr>

            <?php

            $from = isset($_GET['from']) ? $_GET['from'] : 'laporan';

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

            <a href="index.php?aksi=<?= $link; ?>" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>