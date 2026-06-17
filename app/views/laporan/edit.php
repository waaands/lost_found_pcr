<?php

session_start();

require_once "../../../config/koneksi.php";
require_once "../../models/LaporanModel.php";
require_once "../../models/KategoriModel.php";

$laporanModel = new LaporanModel($conn);
$kategoriModel = new KategoriModel($conn);

$id = $_GET['id'];

$laporan = $laporanModel->getById($id);

$kategori = $kategoriModel->getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Edit Laporan
        </div>

        <div class="card-body">

            <form
            action="../../controllers/LaporanController.php"
            method="POST">

                <input
                type="hidden"
                name="id_laporan"
                value="<?= $laporan['id_laporan']; ?>">

                <div class="mb-3">

                    <label>Jenis Laporan</label>

                    <select
                    name="jenis_laporan"
                    class="form-control">

                        <option
                        value="kehilangan"
                        <?= $laporan['jenis_laporan']=='kehilangan' ? 'selected' : ''; ?>>

                            Kehilangan

                        </option>

                        <option
                        value="penemuan"
                        <?= $laporan['jenis_laporan']=='penemuan' ? 'selected' : ''; ?>>

                            Penemuan

                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Kategori</label>

                    <select
                    name="id_kategori"
                    class="form-control">

                        <?php
                        while($row=mysqli_fetch_assoc($kategori))
                        {
                        ?>

                        <option
                        value="<?= $row['id_kategori']; ?>"

                        <?= $laporan['id_kategori']==$row['id_kategori']
                        ? 'selected'
                        : ''; ?>>

                        <?= $row['nama_kategori']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Nama Barang</label>

                    <input
                    type="text"
                    name="nama_barang"
                    class="form-control"
                    value="<?= $laporan['nama_barang']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                    name="deskripsi"
                    class="form-control"><?= $laporan['deskripsi']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label>Lokasi</label>

                    <input
                    type="text"
                    name="lokasi"
                    class="form-control"
                    value="<?= $laporan['lokasi']; ?>">

                </div>

                <div class="mb-3">

                    <label>Tanggal Kejadian</label>

                    <input
                    type="date"
                    name="tanggal_kejadian"
                    class="form-control"
                    value="<?= $laporan['tanggal_kejadian']; ?>">

                </div>

                <button
                type="submit"
                name="update"
                class="btn btn-warning">

                    Update

                </button>

                <a
                href="index.php"
                class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>