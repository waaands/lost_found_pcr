<?php

session_start();

require_once "../../../config/koneksi.php";
require_once "../../models/LaporanModel.php";

$model = new LaporanModel($conn);

    if(isset($_GET['keyword']))
    {
        $laporan =
        $model->search(
            $_GET['keyword']
        );
    }
    elseif(isset($_GET['jenis']))
    {
        $laporan =
        $model->filter(
            $_GET['jenis']
        );
    }
    else
    {
        $laporan =
        $model->getAll();
    }
?>

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

    <form method="GET" class="mb-3">

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
            href="index.php"
            class="btn btn-secondary">

                Semua

            </a>

            <a
            href="?jenis=kehilangan"
            class="btn btn-danger">

                Kehilangan

            </a>

            <a
            href="?jenis=penemuan"
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
                    src="../../../public/uploads/barang/<?= $row['foto_barang']; ?>"
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
                    href="detail.php?id=<?= $row['id_laporan']; ?>"
                    class="btn btn-info btn-sm">
                    Detail
                    </a>
                </td>

            </tr>

            <?php } ?>

        </tbody>

    </table>

    <a
    href="../../../public/index.php"
    class="btn btn-secondary">

        Kembali Dashboard

    </a>

</div>

</body>
</html>