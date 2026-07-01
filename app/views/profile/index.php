<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header">
            Profil Saya
        </div>
        <div class="card-body">
            <h5><?= $_SESSION['nama']; ?></h5>
            <p>Role : <?= $_SESSION['role']; ?></p>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <h4>Laporan Saya</h4>
        <a href="index.php?aksi=tambah" class="btn btn-success">
            Tambah Laporan
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Foto</th>
                <th>Status</th>
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
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['jenis_laporan']; ?></td>
                <td>
                    <?php if($row['foto_barang'] != ""){ ?>
                        <img src="public/uploads/barang/<?= $row['foto_barang']; ?>" width="100">
                    <?php } ?>
                </td>
                <td><?= $row['status_laporan']; ?></td>
                <td>
                    <a href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=profile" class="btn btn-info btn-sm">
                        Detail
                    </a>
                    <a href="index.php?aksi=edit&id=<?= $row['id_laporan']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a href="index.php?aksi=hapus&id=<?= $row['id_laporan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="index.php?aksi=dashboard" class="btn btn-secondary">
        Dashboard
    </a>
</div>
</body>
</html>