<!DOCTYPE html>
<html>

<head>
    <title>Kelola Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Kelola Semua Laporan
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Barang</th>
                        <th>Jenis</th>
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

                        <td><?= $row['nama_lengkap']; ?></td>

                        <td><?= $row['nama_barang']; ?></td>

                        <td><?= $row['jenis_laporan']; ?></td>

                        <td><?= $row['status_laporan']; ?></td>

                        <td>
                            Edit |
                            Hapus |
                            Status
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

            <a href="index.php?aksi=admin" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

</body>

</html>