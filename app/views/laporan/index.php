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
</head>

<body class="bg-light" style="font-family:'Poppins',sans-serif;">
    <div class="container py-5">
        <div class="container py-5">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="fw-bold text-info mb-0">
                            Lost & Found PCR
                        </h4>
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



            <div class="d-flex justify-content-between mb-3">

                <h3>Daftar Laporan</h3>

                <form action="index.php" method="GET" class="mb-3">

                    <input type="hidden" name="aksi" value="laporan">

                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari barang...">
                        <button class="btn btn-primary">Cari</button>
                    </div>

                    <div>
                        <a href="index.php?aksi=laporan" class="btn btn-secondary">Semua</a>
                        <a href="index.php?aksi=laporan&jenis=kehilangan" class="btn btn-danger">Kehilangan</a>
                        <a href="index.php?aksi=laporan&jenis=penemuan" class="btn btn-success">Penemuan</a>
                    </div>

                </form>

            </div>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Nama Barang</th>
                        <th>Foto</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
        $no = 1;
        while($row = mysqli_fetch_assoc($laporan)){
        ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['nama_lengkap']; ?></td>

                        <td><?= $row['nama_kategori']; ?></td>

                        <td><?= $row['jenis_laporan']; ?></td>

                        <td><?= $row['nama_barang']; ?></td>

                        <td>
                            <?php if($row['foto_barang'] != ""){ ?>
                            <img src="public/uploads/barang/<?= $row['foto_barang']; ?>" width="100">
                            <?php } ?>
                        </td>

                        <td><?= $row['lokasi']; ?></td>

                        <td><?= $row['tanggal_kejadian']; ?></td>

                        <td>
                            <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=laporan"
                                class="btn btn-info btn-sm">
                                Detail
                            </a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

            <a href="index.php?aksi=dashboard" class="btn btn-secondary">
                Kembali Dashboard
            </a>

        </div>

</body>

</html>