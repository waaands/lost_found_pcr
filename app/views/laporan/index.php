<!DOCTYPE html>
<html>
<head>
    <title>Daftar Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">

        <h3>Daftar Laporan</h3>

    <form action="index.php" method="GET" class="mb-3">
        <input
            type="hidden"
            name="aksi"
            value="laporan">
        <div class="input-group">

            <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Cari barang...">

            <button
            class="btn btn-primary">

                Cari

            </button>

        </div>
        <div class="mb-3">

            <a
            href="index.php?aksi=laporan"
            class="btn btn-secondary">

                Semua

            </a>

            <a
            href="index.php?aksi=laporan&jenis=kehilangan"
            class="btn btn-danger">

                Kehilangan

            </a>

            <a
            href="index.php?aksi=laporan&jenis=penemuan"
            class="btn btn-success">

                Penemuan

            </a>

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

            while(
                $row =
                mysqli_fetch_assoc($laporan)
            )
            {

            ?>

            <tr>

                <td>
                    <?= $no++; ?>
                </td>

                <td>
                    <?= $row['nama_lengkap']; ?>
                </td>

                <td>
                    <?= $row['nama_kategori']; ?>
                </td>

                <td>
                    <?= $row['jenis_laporan']; ?>
                </td>

                <td>
                    <?= $row['nama_barang']; ?>
                </td>

                <td>
                    <?php if($row['foto_barang'] != ""){ ?>
                    <img
                    src="public/uploads/barang/<?= $row['foto_barang']; ?>"
                    width="100">
                    <?php } ?>
                    </td>
                <td>
                    <?= $row['lokasi']; ?>
                </td>

                <td>
                    <?= $row['tanggal_kejadian']; ?>
                </td>

                <td>
                    <a
                    href="index.php?aksi=detail&id=<?= $row['id_laporan']; ?>&from=laporan"
                    class="btn btn-info btn-sm">
                    Detail
                    </a>
                </td>

            </tr>

            <?php } ?>

        </tbody>

    </table>

    <a
    href="index.php?aksi=dashboard"
    class="btn btn-secondary">

        Kembali Dashboard

    </a>

</div>

</body>
</html>